<?php

namespace App\Repositories;

use App\Criteria\TodayOrdersCriteria;
use App\Order;
use Carbon\Carbon;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderRepository extends BaseRepository
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(Application $app, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

        parent::__construct($app);
    }

    public function model()
    {
        return Order::class;
    }

    public function create(array $attributes)
    {
        $product = $this->productRepository->find(array_get($attributes, 'product_id'));

        $attributes = $this->fillAdditionalAttributes($product, $attributes);

        unset($attributes['_token']);

        $this->model->forceFill($attributes);
        $this->model->save();
        
        $this->resetModel();

        return $this->parserResult($this->model);
    }

    /**
     * Заполняет дополнительные атрибуты товара
     *
     * @param $product
     * @param array $attributes
     * @return array
     */
    private function fillAdditionalAttributes($product, array $attributes)
    {
        if ($product && $product->price && $product->retail_price) {
            $attributes = array_merge($attributes, $product->only('unit', 'price', 'retail_price'));
        }

        return $attributes;
    }

    /**
     * Проверяет правильное ли количетсов товаров продается
     *
     * @param $product
     * @param $quantity
     * @return null|string
     */
    public function checkOrderQuantity($product, $quantity)
    {
        $product = $this->productRepository->find($product);

        if ($product->quantity < $quantity) {
            $count = $product->quantity . ' ' . config('sklad.units.' . $product->unit);

            return 'На складе слишком мало товаров осталось, всего ' . $count;
        }

        return null;
    }

    public function todayCount()
    {
        return $this->model
            ->whereDate('created_at', Carbon::today())
            ->count();
    }

    public function earnedToday()
    {
        $model = $this->model->whereDate('created_at', Carbon::today())
            ->whereRaw('amount > retail_price');

        return $model->sum(DB::raw('amount - retail_price'));
    }

    public function lossToday()
    {
        $model = $this->model->whereDate('created_at', Carbon::today())
            ->whereRaw('amount < retail_price');

        return $model->sum(DB::raw('retail_price - amount'));
    }
}
