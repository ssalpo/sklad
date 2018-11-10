@extends('layouts.app')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Список проданных товаров</h5>
        </div>

        <div class="panel-body">

            <div class="row">

                <div class="col-md-3 text-center">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i
                                    class="icon-calendar5 position-left text-slate"></i> {{$orders->total()}}</h5>
                        <span class="text-muted text-size-small">За все время продано</span>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i
                                    class="icon-calendar5 position-left text-slate"></i> {{array_get($counts, 'todayCount')}}
                        </h5>
                        <span class="text-muted text-size-small">За сегодня продано</span>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i
                                    class="icon-cash3 position-left text-slate"></i> {{array_get($counts, 'todayEarns')}}
                            с.</h5>
                        <span class="text-muted text-size-small">За сегодня заработок</span>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="content-group text-danger">
                        <h5 class="text-semibold no-margin"><i
                                    class="icon-cash3 position-left text-slate"></i> {{array_get($counts, 'lossToday')}}
                            с.</h5>
                        <span class="text-muted text-size-small">За сегодня убыток</span>
                    </div>
                </div>
            </div>
            <a href="{{route('orders.create')}}" class="btn btn-success mb-15">
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
                    <th>Цена прод.</th>
                    <th class="text-center">Кол-во</th>
                    <th class="text-center">Ваш заработок</th>
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
                        <td>{{$order->amount}} сом.</td>
                        <td class="text-center">
                            {{$order->quantity}} {{config('sklad.units.' . $order->unit)}}
                        </td>
                        <td class="text-center">
                            {{($order->amount - $order->price) * $order->quantity}} с.
                        </td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{route('orders.edit', $order->id)}}"><i class="icon-pencil7"></i></a>
                                </li>
                                <li class="text-danger-600">
                                    <a href="#" class="itemDestroyEl"
                                       data-url="{{route('orders.destroy', $order->id)}}"><i
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


