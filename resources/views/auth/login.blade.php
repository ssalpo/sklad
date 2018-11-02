@extends('layouts.app')

@section('body_class', 'login-container')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Авторизация</h5>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input type="text" class="form-control" name="email" value="{{ old('email', 'sanjar@tpu.ru') }}"  placeholder="Введите логин" required autofocus>
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>

                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{ $errors->first('email') }}
                    </span>
                @endif

            </div>

            <div class="form-group has-feedback has-feedback-left">

                <input type="password" name="password" class="form-control" placeholder="Пароль" value="secret">

                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{ $errors->first('password') }}
                    </span>
                @endif

            </div>

            <div class="form-group login-options">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="checkbox-inline">
                            <div class="checker">
                                <span class="checked"><input type="checkbox" name="remember" class="styled" {{ old('remember', true) ? 'checked' : '' }}></span>
                            </div> Запомнить ?
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Войти <i class="icon-circle-right2 position-right"></i></button>
            </div>
        </div>
    </form>
    <!-- /simple login form -->

@endsection
