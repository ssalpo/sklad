@extends('layouts.app')

@section('content')
    <div class="card  justify-content-center">
        <div class="card-header">Список проданных товаров
            <div class="float-right">Продано: <b>{{$orders->total()}} шт.</b></div>
        </div>

        <div class="card-body">

            <a href="{{route('orders.create')}}" class="btn btn-success mb-3">Новый заказ</a>

            <div class="table-responsive-md">
                <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Товар</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Цена розн.</th>
                    <th scope="col">Цена прод.</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">З-ка</th>
                    <th scope="col" width="80" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->price}} сом.</td>
                        <td>{{$order->retail_price}} сом.</td>
                        <td>{{$order->amount}} сом.</td>
                        <td>
                            @if($order->quantity)
                                {{$order->quantity}} {{config('sklad.units.' . $order->unit)}}
                            @endif
                        </td>
                        <td>
                            @if($order->note) ! @else - @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('orders.edit', $order->id)}}">Ред.</a> |
                            <a class="text-danger itemDestroyEl" data-url="{{route('orders.destroy', $order->id)}}" href="#">Уд.</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>

            {{$orders->links()}}
        </div>
    </div>

    @include('_partials.item_delete_form')
@endsection
