<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Выводит список всех товаров
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->paginate(config('sklad.pagination.limit'));

        return view('products.index', compact('products'));
    }

    /**
     * Показывает форму добавления нового товара
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Добавляет новый товар в базу
     *
     * @param  ProductRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductRequest $request)
    {
        $product = $this->repository->create($request->all());

        $message = "Новый товар <b>" . $product->name . "</b> успешно добавлен!";

        return redirect()
            ->route('products.index')
            ->with('success', $message);
    }

    /**
     * Просмотрых всех данных товара
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Показывает форму редактирования товара
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Обновление данных товара в базе
     *
     * @param  ProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->repository->update($request->all(), $id);

        $message = 'Продукт <b>' . $product->name . '</b> успешно обновлен!';

        return redirect()
            ->route('products.index')
            ->with('success', $message);
    }

    /**
     * Удаляет товар из базы
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()
            ->route('products.index')
            ->with('success', 'Товар успешно удален!');
    }
}
