@extends('adminlte::page')

@section('title', 'Movies')

@section('content')
<div class="py-3">
    <a href="{{ url('admin/movies/create') }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg> Añadir pelicula</a>
</div>
@if (\Session::has('success'))
<div class="alert alert-success w-25">
    {!! \Session::get('success') !!}
</div>
@endif
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Director</th>
            <th scope="col">Año</th>
            <th scope="col">Género</th>
            <th scope="col">Distribuidora</th>
            <th scope="col">Imagen</th>
            <th scope="col">-</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <th scope="row">{{ $movie->id }}</th>
            <td>{{ $movie->name }}</td>
            <td>{{ $movie->director }}</td>
            <td>{{ $movie->año }}</td>
            <td>{{ $movie->genero }}</td>
            <td>{{ $movie->distribuidora }}</td>
            <td>{{ $movie->imagen }}</td>
            <td>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); 
                 document.getElementById('delete-movie-{{$movie->id }}-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </a>
                <a href="{{route('movies.edit',['movie'=>$movie->id])}}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg>
                </a>
            </td>
            <form id="delete-movie-{{$movie->id }}-form" action="{{ route('movies.destroy', ['movie' => $movie]) }}" method="POST" class="hidden">
                @method("DELETE")
                @csrf
            </form>

        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex">
    {!! $movies->links() !!}
</div>
@stop