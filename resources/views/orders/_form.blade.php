<div class="form-group @if($errors->has('product_id')) has-error has-feedback @endif">
    {{Form::label('product_id', 'Товар', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::select('product_id', $products->pluck('name', 'id'), null, ['class' => 'form-control'])}}

        @if($errors->has('product_id'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('product_id') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('amount')) has-error has-feedback @endif">

    {{Form::label('amount', 'Цена продажи', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-3">
        {{Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Формат ввода: 5.5 или 556'])}}

        @if($errors->has('amount'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('amount') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('quantity')) has-error has-feedback @endif">

    {{Form::label('quantity', 'Количество', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-3">
        {{Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Сколько продано?'])}}

        @if($errors->has('quantity'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('quantity') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('note')) has-error has-feedback @endif">

    {{Form::label('note', 'Заметка', ['class' => 'control-label col-lg-2 col-lg-offset-2'])}}

    <div class="col-lg-5">
        {{Form::textarea('name', null, ['class' => 'form-control', 'placeholder' => 'Введите название товара', 'rows' => 3])}}

        @if($errors->has('note'))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">{{ $errors->first('note') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-lg-5 col-lg-offset-4">
        <button type="submit" class="btn btn-primary">
            @isset($isEdit) Изменить @else Добавить @endisset
            <i class="icon-arrow-right14 position-right"></i></button>

        <a href="{{route('orders.index')}}" class="btn btn-default">
            Отменить
        </a>
    </div>
</div>

