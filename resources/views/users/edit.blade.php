@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Редактирование данных пользователя</h5>
        </div>

        <div class="panel-body">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

            @include('users._form', ['isEdit' => true])

            {!! Form::close() !!}
        </div>
    </div>
@endsection
