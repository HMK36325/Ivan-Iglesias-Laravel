@extends('adminlte::page')

@section('title', 'Form Movie')

@section('content')
<form  method="POST" action="{{ $route }}">
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
                        <form id="contact-form" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Nombre</label> <input value="{{$movie->name}}" id="form_name" type="text" name="name" class="form-control" required="required" data-error="Name is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_director">Director</label> <input value="{{$movie->director}}" id="form_Director" type="text" name="surname" class="form-control" required="required" data-error="Director is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_año">Año</label> <input value="{{$movie->año}}" id="form_name" type="text" name="name" class="form-control" required="required" data-error="Año is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_genero">Género</label> <input value="{{$movie->genero}}" id="form_Director" type="text" name="surname" class="form-control" required="required" data-error="Genero is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_distribuidora">Distribuidora</label> <input value="{{$movie->distribuidora}}" id="form_name" type="text" name="name" class="form-control" required="required" data-error="Dist is required."> </div>
                                    </div>
                                </div>
                                <div class="row ml-2 mb-3">
                                    <label for="form_imagen" class="mr-3">Imagen</label> <input id="form_File" type="file" name="surname" required="required" data-error="Director is required.">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Guardar"> </div>
                            </div>
                    </div>
</form>
</div>
</div>
</div> <!-- /.8 -->
</div> <!-- /.row-->
</div>
</form>
@stop