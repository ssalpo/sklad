@extends('layouts.app')

@section('content')
    <div class="card  justify-content-center">
        <div class="card-header">Список товаров
            <div class="float-right">Товаров: <b>{{$products->total()}} шт.</b></div>
        </div>

        <div class="card-body">

            <a href="{{route('products.create')}}" class="btn btn-success mb-3">Добавить товар</a>

            <div class="table-responsive-md">
                <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Цена розн.</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col" width="80" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} сом.</td>
                        <td>{{$product->retail_price}} сом.</td>
                        <td>
                            @if($product->quantity)
                                {{$product->quantity}} {{config('sklad.units.' . $product->unit)}}
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('products.edit', $product->id)}}">Ред.</a> |
                            <a class="text-danger itemDestroyEl" data-url="{{route('products.destroy', $product->id)}}" href="#">Уд.</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>

            {{$products->links()}}
        </div>
    </div>

    @include('_partials.item_delete_form')
@endsection
