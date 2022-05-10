@extends('adminlte::page')

@section('title', 'Form Movie')

@section('content')
<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    @isset($update)
    @method("PUT")
    @endisset
    <h1 class="text-center">{{$title}}</h1>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        @if($errors->any())
                        <h4 class="text-red">{{$errors->first()}}</h4>
                        @endif
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_name">Nombre</label> <input value="{{$movie->name}}" id="form_name" type="text" name="name" class="form-control" required="required" data-error="Name is required."> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_director">Director</label> <input value="{{$movie->director}}" id="form_Director" type="text" name="director" class="form-control" required="required" data-error="Director is required."> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_año">Año</label> <input value="{{$movie->año}}" id="form_name" type="text" name="año" class="form-control" required="required" data-error="Año is required."> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_genero">Género</label> <input value="{{$movie->genero}}" id="form_Director" type="text" name="genero" class="form-control" required="required" data-error="Genero is required."> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_distribuidora">Distribuidora</label> <input value="{{$movie->distribuidora}}" id="form_name" type="text" name="distribuidora" class="form-control" required="required" data-error="Dist is required."> </div>
                                </div>
                            </div>
                            <div class="row ml-2 mb-3 d-flex flex-column">
                                <label for="form_imagen" class="mr-3">Imagen</label> <input id="form_File" type="file" name="image" value="{{$movie->imagen}}" data-error="Director is required.">
                                @if ($movie->imagen!=null)
                                <span>Imagen actual: '{{$movie->imagen}}' </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Guardar"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.8 -->
    </div> <!-- /.row-->
</form>
@stop