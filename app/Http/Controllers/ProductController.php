<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(config('sklad.pagination.limit'));

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        if (!$product) {
            return redirect()->back()
                ->with('error', 'Ошибка при добавлении нового продукта');
        }

        return redirect()->route('products.index')
            ->with('success', 'Новый продукт <b>' . $product->name . '</b> успешно создан!');
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
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if (!$product->update($request->all())) {
            return redirect()->back()
                ->with('error', 'Ошибка при обновлении продукта');
        }

        return redirect()->route('products.index')
            ->with('success', 'Продукт <b>' . $product->name . '</b> успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->delete()) {
            return redirect()->back()
                ->with('error', 'Ошибка при удалении продукта');
        }

        return redirect()->route('products.index')
            ->with('success', 'Продукт <b>' . $product->name . '</b> успешно удален!');
    }
}
