@extends('layouts.footer')
@extends('layouts.app')
@section('content')
<div class=" container w-full mb-40 ml-60 grid grid-cols-3 gap-4 content-center">
    @forelse($user->movies as $movie)
    <div class="w-full col-span-1 flex">
        <img class="border-solid border-2 border-black" src="{{$movie->imagen}}" alt="">
        <div class="ml-3 p-3">
            <p class="text-lg font-bold italic">{{$movie->name}}</p>
            <p class="font-bold text-sm">{{$movie->director}}</p>
            <p class="font-light text-sm">{{$movie->año}}</p>
        </div>
    </div>

    @empty

    <div class="bg-indigo-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <p><strong class="font-bold">{{ __("No hay peliculas") }}</strong></p>
    </div>
    @endforelse
</div>

@endsection