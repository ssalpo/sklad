@extends('layouts.app')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Добавление нового пользователя</h5>
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}

            @include('users._form')

            {!! Form::close() !!}
        </div>
    </div>

@endsection
