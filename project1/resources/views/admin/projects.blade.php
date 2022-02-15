@extends('adminlte::page')

@section('title', 'Projects')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Usuario</th>
            <th scope="col">Alta</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>

            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->name }}</td>
            <td>{{ $project->user->name }}</td>
            <td>{{ date_format($project->created_at, "d/m/Y") }}</td>
            <td>
                <a href="{{ route('projects.edit', ['project' => $project]) }}" class="text-primary">{{ __("Editar") }}</a> |
                <a href="#" class="text-danger" onclick="event.preventDefault();
                    document.getElementById('delete-project-{{ $project->id }}-form').submit();">{{ __("Eliminar") }}
                </a>
                <form id="delete-project-{{ $project->id }}-form" action="{{ route('projects.destroy', ['project' => $project]) }}" method="POST" class="hidden">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop