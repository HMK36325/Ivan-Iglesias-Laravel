<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulario</title>
</head>
<body>	
    <div class="container">
        <div class="row mt-3">
			<div class="col-6">
				<form enctype="multipart/form-data" method="POST" action="{{ $route }}">
					@csrf
					@isset($update)
					@method("PUT")
					@endisset
					<div class="mb-3">
						<label for="libro" class="form-label">Título del libro</label>
						<input name="titulo" value="{{ $libros->titulo}} {{old('titulo') }}" type="text" class="form-control" id="libro" >

						<!-- Verificación-->
						@error('titulo')
						<br>
						<small class="text-danger">* Tiene que escribir un nombre</small>
						<br>
							
						@enderror
					</div>
				
                    <div class="mb-3">
						<label for="libro" class="form-label">Temática</label>
						<input name="tematica" value="{{ $libros->tematica}} {{old('tematica') }}" type="text" class="form-control" id="libro" >

							<!-- Verificación-->
						@error('tematica')
						<br>
						<small class="text-danger">* Tiene que tener alguna temática</small> 
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="libro" class="form-label">Sinopsis</label>
						<input name="sinopsis" value="{{ $libros->sinopsis}} {{old('sinopsis') }}" type="text" class="form-control" id="libro" > <!-- en el value el old es por si falta algo y saltan verificaciones el campo que esté completo se mantiene-->

							<!-- Verificación-->
						@error('sinopsis')
						<br>
						<small class="text-danger">* No puede quedar la sinopsis vacía</small>
						<br>
							
						@enderror
					</div>
                    <div class="mb-3">
						<label for="libro" class="form-label">Autor del libro</label>
						<input name="autor" value="{{ $libros->autor}} {{old('autor')}}" type="text" class="form-control" id="libro" >

							<!-- Verificación-->
						@error('autor')
						<br>
						<small class="text-danger" >* Tiene que registrar el autor del libro</small>
						<br>
							
						@enderror
					</div>
					
					

				

					<button type="submit" class="btn btn-primary">Crear libro</button>
				</form>
			</div>
    </div>
    
    
</body>
</html>