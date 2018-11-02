@extends('layouts.app')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Новый заказ</h5>
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'orders.store', 'class' => 'form-horizontal']) !!}

            @include('orders._form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
