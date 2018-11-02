@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Редактирование данных проданного товара</h5>
        </div>

        <div class="panel-body">
            {{ Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'put', 'class' => 'form-horizontal']) }}

            @include('orders._form', ['isEdit' => true])

            {{ Form::close() }}
        </div>
    </div>
@endsection
