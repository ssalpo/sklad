<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(OrderRepository $repository, ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
    }

    /**
     * Показывает страницу всех проданных товаров
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->repository->with('product')
            ->paginate(config('sklad.pagination.limit'));

        $counts = [
            'todayCount' => $this->repository->todayCount(),
            'todayEarns' => $this->repository->earnedToday(),
            'lossToday' => $this->repository->lossToday()
        ];

        return view('orders.index', compact('orders', 'counts'));
    }

    /**
     * Показывает форма учета проданного товара
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->productRepository->all();

        return view('orders.create', compact('products'));
    }

    /**
     * Добавляет информацию о новой покупке в базу
     *
     * @param  OrderRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(OrderRequest $request)
    {
        $isRightQuantity = $this->repository->checkOrderQuantity(
            $request->get('product_id'), $request->get('quantity')
        );

        if (!is_null($isRightQuantity)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $isRightQuantity);
        }

        $this->repository->create($request->all());

        return redirect()
            ->route('orders.index')
            ->with('success', 'Заказ оформлен!');
    }

    /**
     * Показывает информацию о конкретном заказе
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->repository
            ->with('product')
            ->find($id);

        return view('products.show', compact('order'));
    }

    /**
     * Редактирование информации о заказе
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->repository
            ->with('product')
            ->find($id);

        $products = $this->productRepository->all();

        return view('orders.edit', compact('order', 'products'));
    }

    /**
     * Обновление данных заказа в базе
     *
     * @param  OrderRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OrderRequest $request, $id)
    {
        $order = $this->repository->update($request->all(), $id);

        $message = 'Данные заказа успешно обновлен!';

        return redirect()
            ->route('orders.index')
            ->with('success', $message);
    }

    /**
     * Удаление данных о заказе
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        $message = 'Заказ успешно удален!';

        return redirect()
            ->route('orders.index')
            ->with('success', $message);
    }
}
