<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('product')->paginate(config('sklad.pagination.limit'));

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(OrderRequest $request)
    {
        $order = $this->orderService->create(
            $request->all()
        );

        return redirect()->route('orders.index')
            ->with('success', 'Заказ оформлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::with('product')->whereId($id)->first();
        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OrderRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);

        if (!$order->update($request->all())) {
            return redirect()->back()
                ->with('error', 'Ошибка при обновлении продукта');
        }

        return redirect()->route('orders.index')
            ->with('success', 'Продукт <b>' . $order->name . '</b> успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if (!$order->delete()) {
            return redirect()->back()
                ->with('error', 'Ошибка при удалении продукта');
        }

        return redirect()->route('orders.index')
            ->with('success', 'Продукт <b>' . $order->name . '</b> успешно удален!');
    }
}
