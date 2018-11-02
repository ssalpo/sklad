@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">
                Продажи за сегодня
            </h6>
        </div>

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 10</h5>
                        <span class="text-muted text-size-small">За сегодня</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> 2000 с.</h5>
                        <span class="text-muted text-size-small">Заработано</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="content-group">
                        <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> 2000 с.</h5>
                        <span class="text-muted text-size-small">Всего продано</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Время</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="#" class="text-default text-semibold">Bing campaign</a>
                    </td>
                    <td>
                        <span class="text-muted text-size-small">06:28 pm</span>
                    </td>
                    <td>
                        <h6 class="text-semibold no-margin">$49.90</h6>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
