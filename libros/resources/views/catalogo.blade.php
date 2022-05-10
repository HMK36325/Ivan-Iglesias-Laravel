@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <body>
            <div class="container">
                <h1 class="text-yellow-100  text-center mt-2">Catálogo de libros </h1>
                <div class="row mt-4 " >
                    <div class="col-md-6 col-lg-3 mt-2">
                        <h3 class="text-info">El código </h3>
                        <h3 class="text-info">da vinci</h3>
                        <img src="{{ asset('ECDV.jpg') }}" alt="" >

                    </div>
                    <div class="col-md-6  col-lg-3 mt-2">
                        <h3 class="text-info">La sangre </h3>
                        <h3 class="text-info">de los inocentes </h3>
                        <img src="{{ asset('laSangre.jpg') }}" alt="" >

                    </div>
                    <div class=" col-md-6 col-lg-3 mt-2">
                        <h3 class="text-info">Los pilares </h3>
                        <h3 class="text-info">de la tierra </h3>
                        <img src="{{ asset('losPilares.jpg') }}" alt="" >

                    </div>
                    <div class=" col-md-6  col-lg-3 mt-2">
                        <h3 class="text-info">La fortaleza </h3>
                        <h3 class="text-info">digital </h3>
                        <img src="{{ asset('fortalezaDigital.jpg') }}" alt="" >

                    </div>
                    
                </div>
                <div class="row mt-5" >
                    <div class="col-md-6  col-lg-3 mt-2">
                        <h3 class="text-info">Cancion de  </h3>
                        <h3 class="text-info">hielo y fuego</h3>
                        <img src="{{ asset('cancionHielo.jpg') }}" alt="" >

                    </div>
                    <div class="col-md-6  col-lg-3 mt-2">
                        <h3 class="text-info">Choque de  </h3>
                        <h3 class="text-info">reyes </h3>
                        <img src="{{ asset('choqueReyes.jpg') }}" alt="" >

                    </div>
                    <div class=" col-md-6  col-lg-3 mt-2">
                        <h3 class="text-info">La piedra </h3>
                        <h3 class="text-info">filosofal </h3>
                        <img src="{{ asset('harryPotter.jpg') }}" alt="" >

                    </div>
                    <div class=" col-md-6  col-lg-3 mt-2">
                        <h3 class="text-info">La cámara </h3>
                        <h3 class="text-info">secreta </h3>
                        <img class="img-fluid" src="{{ asset('laCamaraSecreta.jpg') }}" alt="" >

                    </div>
                    
                </div>
            </div>

        </body>

      
    </div>
</main>
@endsection