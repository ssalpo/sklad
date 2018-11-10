@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Список товаров <span
                        class="badge badge-flat border-danger text-danger-600 position-right">{{$products->total()}}</span>
            </h5>
        </div>

        <div class="panel-body">
            <a href="{{route('products.create')}}" class="btn btn-success">
                <i class="icon-cart-add position-left"></i> Добавить товар
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Цена розн.</th>
                    <th>Кол-во</th>
                    <th class="text-center" width="80">Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} сом.</td>
                        <td>{{$product->purchase_price}} сом.</td>
                        <td>
                            @if($product->quantity)
                                {{$product->quantity}} {{config('sklad.units.' . $product->unit)}}
                            @endif
                        </td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{route('products.edit', $product->id)}}"><i class="icon-pencil7"></i></a>
                                </li>
                                <li class="text-danger-600">
                                    <a href="#" class="itemDestroyEl" data-url="{{route('products.destroy', $product->id)}}"><i
                                                class="icon-trash"></i></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="panel-body text-center">
                {{$products->links()}}
            </div>
        @endif
    </div>

    @include('_partials.item_delete_form')
@endsection
