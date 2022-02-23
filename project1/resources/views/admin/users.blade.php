@extends('adminlte::page')

@section('title', 'Users')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Alta</th>
            <th scope="col">Rol</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ date_format($user->created_at, "d/m/Y") }}</td>
            <td>@foreach($user->role as $role)
                {{ $role->display_name  }}
                @endforeach
            </td>
            <td><a href="#" class="text-success">{{ __("Editar") }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop