<div class="form-group row">
    {{Form::label('product_id', 'Товар', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-6">
        {{Form::select('product_id', $products->pluck('name', 'id'), null, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : '')])}}

        @if ($errors->has('product_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('product_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{Form::label('amount', 'Цена продажи', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-2">
        {{Form::text('amount', null, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : '')])}}
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
    {{Form::label('note', 'Заметка', ['class' => 'col-md-4 col-form-label text-md-right'])}}

    <div class="col-md-6">
        {{Form::textarea('note', null, ['class' => 'form-control'])}}
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            @isset($order) Изменить @else Добавить @endif
        </button>

        <a href="{{route('orders.index')}}" class="btn btn-secondary">
            Отменить
        </a>
    </div>
</div>
