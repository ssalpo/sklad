<div class="form-group row">
    {{Form::label('name', 'Название', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-6">
        {{Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')])}}

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{Form::label('price', 'Цена закупочная', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-2">
        {{Form::text('price', null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : '')])}}
    </div>
</div>

<div class="form-group row">
    {{Form::label('retail_price', 'Цена розничная', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-2">
        {{Form::text('retail_price', null, ['class' => 'form-control' . ($errors->has('retail_price') ? ' is-invalid' : '')])}}

        @if ($errors->has('retail_price'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('retail_price') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{Form::label('quantity', 'Количество', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-2 col-lg-2">
        {{Form::text('quantity', null, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')])}}

        @if ($errors->has('quantity'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{Form::label('unit', 'Единица', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-sm-2 col-md-2">
        {{Form::select('unit', config('sklad.units'), null, ['class' => 'form-control' . ($errors->has('unit') ? ' is-invalid' : '')])}}

        @if ($errors->has('unit'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('unit') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            @isset($product) Изменить @else Добавить @endif
        </button>

        <a href="{{route('products.index')}}" class="btn btn-secondary">
            Отменить
        </a>
    </div>
</div>
