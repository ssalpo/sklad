@extends('layouts.app')

@section('content')
    <div class="card  justify-content-center">
        <div class="card-header">Добавление нового товара</div>

        <div class="card-body">
            {!! Form::open(['route' => 'products.store']) !!}

            @include('products._form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
