@extends('layouts.app')

@section('content')
    <div class="card  justify-content-center">
        <div class="card-header">Просмотр товара: {{$product->name}}</div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">#ID</th>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Название</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Цена</th>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <th scope="row">Цена покупки</th>
                    <td>{{$product->purchase_price}}</td>
                </tr>
                <tr>
                    <th scope="row">Количество</th>
                    <td>
                        @if($product->quantity)
                            {{$product->quantity}} {{config('sklad.units.' . $product->unit)}}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
