@extends('layouts.app')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Добавление нового товара</h5>
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'products.store', 'class' => 'form-horizontal']) !!}

            @include('products._form')

            {!! Form::close() !!}
        </div>
    </div>

@endsection
