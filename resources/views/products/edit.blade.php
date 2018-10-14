@extends('layouts.app')

@section('content')
    <div class="card  justify-content-center">
        <div class="card-header">Редактирование товара</div>

        <div class="card-body">
            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}

            @include('products._form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
