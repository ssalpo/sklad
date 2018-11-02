<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">

    {{Form::label('name', 'Название', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Введите название товара'])}}

        @if($errors->has('name'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('price')) has-error has-feedback @endif">

    {{Form::label('price', 'Цена закупочная', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-3">
        {{Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Формат ввода: 5.5 или 556'])}}

        @if($errors->has('price'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('price') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('retail_price')) has-error has-feedback @endif">

    {{Form::label('retail_price', 'Цена розничная', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-3">
        {{Form::text('retail_price', null, ['class' => 'form-control', 'placeholder' => 'Формат ввода: 5.5 или 556'])}}

        @if($errors->has('retail_price'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('retail_price') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('quantity')) has-error has-feedback @endif">

    {{Form::label('quantity', 'Количество', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-3">
        {{Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Товаров на складе'])}}

        @if($errors->has('quantity'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('quantity') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('unit')) has-error has-feedback @endif">
    {{Form::label('unit', 'Единица измерения', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-2">
        {{Form::select('unit', config('sklad.units'), null, ['class' => 'form-control'])}}

        @if($errors->has('unit'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('unit') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-lg-5 col-lg-offset-4">
        <button type="submit" class="btn btn-primary">
            @isset($isEdit) Изменить @else Добавить @endisset
            <i class="icon-arrow-right14 position-right"></i></button>

        <a href="{{route('products.index')}}" class="btn btn-default">
            Отменить
        </a>
    </div>
</div>