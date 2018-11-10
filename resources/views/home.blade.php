@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">
                Продажи за сегодня
            </h6>
        </div>

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> {{$ordersCount['today']['todayCount']}}</h5>
                        <span class="text-muted text-size-small">За сегодня</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> {{$ordersCount['today']['todayEarns']}} с.</h5>
                        <span class="text-muted text-size-small">Заработано за сегодня</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> {{$ordersCount['today']['lossToday']}} с.</h5>
                        <span class="text-muted text-size-small">Убытки за сегодня</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Цена продажи</th>
                    <th>Кол-во</th>
                    <th class="text-center">Ваш заработок</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            @if($order->product)
                                {{$order->product->name}}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{$order->price}} сом.</td>
                        <td>{{$order->amount}} сом.</td>
                        <td>
                            @if($order->quantity)
                                {{$order->quantity}} {{config('sklad.units.' . $order->unit)}}
                            @endif
                        </td>
                        <td class="text-center">
                            {{($order->amount - $order->price) * $order->quantity}} с.
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
