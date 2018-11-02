@extends('layouts.app')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Список проданных товаров
                <span class="badge badge-flat border-danger text-danger-600 position-right">
                    {{$orders->total()}}
                </span>
            </h5>
        </div>

        <div class="panel-body">
            <a href="{{route('orders.create')}}" class="btn btn-success">
                <i class="icon-cart-add position-left"></i> Новая продажа
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Цена розн.</th>
                    <th>Цена прод.</th>
                    <th>Кол-во</th>
                    <th>З-ка</th>
                    <th class="text-center" width="80">Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>
                            @if($order->product)
                                {{$order->product->name}}
                            @else
                                -
                            @endif
                        </td>
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
                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{route('orders.edit', $order->id)}}"><i class="icon-pencil7"></i></a>
                                </li>
                                <li class="text-danger-600 itemDestroyEl">
                                    <a href="#" data-url="{{route('orders.destroy', $order->id)}}"><i
                                                class="icon-trash"></i></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="panel-body text-center">
                {{$orders->links()}}
            </div>
        @endif
    </div>

    @include('_partials.item_delete_form')
@endsection


