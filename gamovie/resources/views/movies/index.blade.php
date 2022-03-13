@extends('layouts.footer')
@extends('layouts.app')
@section('content')
<div class=" container self-center flex flex-wrap">
    @foreach($movies as $movie)

    <div class="w-96 flex">
        <a href="{{url('movies', $movie->id) }}" class="card card-compact mx-auto my-8" style="width: 214px;">
            <img class="self-center border-solid border-2 border-black" src="{{$movie->imagen}}" alt="">
            <h2 class=" self-center card-title w-52 text-center font-bold italic text-xl mt-3 ">{{$movie->name}}</h2>
        </a>
    </div>

    @endforeach
</div>
@endsection