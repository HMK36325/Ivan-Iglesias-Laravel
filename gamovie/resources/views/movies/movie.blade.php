@extends('layouts.footer')
@extends('layouts.app')
@section('content')
<div class=" container self-center flex flex-wrap mt-20 p-8">
    <div class="grid grid-cols-4 gap-4 w-full">
        <div class="flex justify-center flex-col">
            <img class="self-center border-solid border-2 border-black" src="../{{$movie->imagen}}" alt="">
            <div class="flex justify-center">
                @if (Auth::check())
                @if(!Auth::user()->hasMovie($movie->id) && Auth::user()->can('guardar.movie'))
                <a href="{{url('addMovie', $movie->id) }}"><button class="mt-4 rounded-lg opacity-75 p-4 font-medium">Añadir a mi lista!</button></a>
                @endif
                @endif
            </div>
        </div>
        <div class="col-span-3 grid gap-y-9">
            <div class="grid grid-cols-12 mb-3">
                <span class="col-span-1 justify-self-end">Nombre:</span>
                <h2 class="col-span-11 font-bold italic text-xl ml-4">{{$movie->name}}</h2>
            </div>
            <div class="grid grid-cols-12">
                <span class="col-span-1 justify-self-end">Director:</span>
                <h2 class="col-span-11 font-bold text-lg ml-4">{{$movie->director}}</h2>
            </div>
            <div class="grid grid-cols-12">
                <span class="col-span-1 justify-self-end">Año:</span>
                <h2 class="col-span-11 font-bold text-lg ml-4">{{$movie->año}}</h2>
            </div>
            <div class="grid grid-cols-12">
                <span class="col-span-1 justify-self-end">Género:</span>
                <h2 class="col-span-11 font-bold text-lg ml-4">{{$movie->genero}}</h2>
            </div>
            <div class="grid grid-cols-12">
                <span class="col-span-1 justify-self-end">Distribuidora:</span>
                <h2 class="col-span-11 font-bold text-lg ml-4">{{$movie->distribuidora}}</h2>
            </div>
        </div>
    </div>
</div>
<div class="self-center w-full mt-60">
    @if (!Auth::check())
    <a href="{{url('premiun')}}">
        <h2 class="w-full my-8 text-5xl font-black leading-tight text-center text-black hover:underline">
            Hazte Premium!
        </h2>
    </a>
    @elseif(!Auth::user()->can('hacerse.premiun'))
    <a href="{{url('premiun')}}">
        <h2 class="w-full my-8 text-5xl font-black leading-tight text-center text-black hover:underline">
            Hazte Premium!
        </h2>
    </a>
    @endif

</div>
@endsection