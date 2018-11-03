@extends('layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Список пользователей системы
                <span class="badge badge-flat border-danger text-danger-600 position-right">{{$users->total()}}</span>
            </h5>
        </div>

        <div class="panel-body">
            <a href="{{route('users.create')}}" class="btn btn-success">
                <i class="icon-cart-add position-left"></i> Добавить пользователя
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Добавлен</th>
                    <th>Дата редактирования</th>
                    <th class="text-center" width="80">Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->format('d.m.Y')}} в {{$user->created_at->format('H:i')}}</td>
                        <td>{{$user->updated_at->format('d.m.Y')}} в {{$user->created_at->format('H:i')}}</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{route('users.edit', $user->id)}}">
                                        <i class="icon-pencil7"></i>
                                    </a>
                                </li>
                                <li class="text-danger-600">
                                    <a href="#" class="itemDestroyEl" data-url="{{route('users.destroy', $user->id)}}">
                                        <i class="icon-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="panel-body text-center">
                {{$users->links()}}
            </div>
        @endif
    </div>

    @include('_partials.item_delete_form')
@endsection
