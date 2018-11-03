<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">

    {{Form::label('name', 'Имя', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Введите имя пользователя'])}}

        @if($errors->has('name'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('email')) has-error has-feedback @endif">

    {{Form::label('email', 'E-mail', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Введите email к примеру: sanjar@tpu.ru'])}}

        @if($errors->has('email'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-lg-7 col-lg-offset-2">
        <hr>
    </div>
</div>

<div class="form-group @if($errors->has('password')) has-error has-feedback @endif">

    {{Form::label('password', 'Пароль', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Введите пароль пользователя'])}}

        @if($errors->has('password'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('password_confirmation')) has-error has-feedback @endif">

    {{Form::label('password_confirmation', 'Повторите пароль', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Повторите пароль еще раз'])}}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-5 col-lg-offset-4">
        <button type="submit" class="btn btn-primary">
            @isset($isEdit) Изменить @else Добавить @endisset
            <i class="icon-arrow-right14 position-right"></i></button>

        <a href="{{route('users.index')}}" class="btn btn-default">
            Отменить
        </a>
    </div>
</div>