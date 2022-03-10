@extends('adminlte::page')

@section('title', 'Users')

@section('content')
<table class="table table-bordered table-striped">
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

            <td>@foreach($user->roles as $role)
                {{ $role->name  }}
                @endforeach
            </td>
            
            @if ($user->id!=1)
            @if ($user->banned_at==null)
            <td><a href="{{url('admin/ban', $user->id) }}" class="btn btn-danger">{{ __("Ban") }}</a></td>
            @else
            <td><a href="{{url('admin/unban', $user->id) }}" class="btn btn-success">{{ __("Unban") }}</a></td>
            @endif
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@stop