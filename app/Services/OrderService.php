<?php

namespace App\Services;

use App\Order;
use App\Product;
use Illuminate\Support\Arr;

class OrderService
{
    /**
     * Создает новый заказ
     *
     * @param array $attributes
     * @return Order
     * @throws \Exception
     */
    public function create(array $attributes)
    {
        $product = Product::findOrFail(Arr::get($attributes, 'product_id', 0));

        $this->checkQuantity($product, Arr::get($attributes, 'quantity', 0));

        $order = new Order($attributes);

        $order->price = $product->price;
        $order->retail_price = $product->retail_price;
        $order->unit = $product->unit;

        $order->save();

        return $order;
    }

    /**
     * Проверяем остаток товаров на складе
     *
     * @param Product $product
     * @param $quantity
     * @return bool
     * @throws \Exception
     */
    public function checkQuantity(Product $product, $quantity)
    {
        if ($product->quantity < $quantity) {
            $quantityCount = $product->quantity . ' ' . config('sklad.units.' . $product->unit);

            throw new \Exception('На складе слишком мало товаров (' . $quantityCount . ')!');
        }

        return true;
    }

}