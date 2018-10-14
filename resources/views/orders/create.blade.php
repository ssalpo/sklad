@extends('layouts.app')

@section('content')
    <div class="card  justify-content-center">
        <div class="card-header">Новый заказ</div>

        <div class="card-body">
            {!! Form::open(['route' => 'orders.store']) !!}

            @include('orders._form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
