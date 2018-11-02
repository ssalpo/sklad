@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Редактирование товара</h5>
        </div>

        <div class="panel-body">
            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

            @include('products._form', ['isEdit' => true])

            {!! Form::close() !!}
        </div>
    </div>
@endsection
