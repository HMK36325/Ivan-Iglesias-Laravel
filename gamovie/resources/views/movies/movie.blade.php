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
                <input type="hidden" value="{{$movie->name}}" id="name">
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
            <div class="grid grid-cols-12">
                <span class="col-span-1 justify-self-end">Sinopsis:</span>
                <h2 id="sinopsis" class="col-span-11 font-bold text-md ml-4"></h2>
            </div>
        </div>
    </div>
</div>
<div class="self-center w-full mt-24">
    @if (!Auth::check())
    <a href="{{url('premiun')}}">
        <h2 class="w-full my-8 text-5xl font-black leading-tight text-center text-black hover:underline">
            Hazte Premium!
        </h2>
    </a>
    @elseif(!Auth::user()->can('hacerse.premiun'))
    <a href="{{url('premiun')}}">
        <h4 class="w-full my-8 text-5xl font-black leading-tight text-center text-black hover:underline">
            Hazte Premium!
        </h4>
    </a>
    @endif

</div>
<script>
    var name = document.getElementById('name').value;
    fetch('https://api.themoviedb.org/4/account/622f49beafe224001c27b410/movie/favorites?api_key=a4c531f7bbb5934a92b6a4b446b6bcc0&language=es', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ2ZXJzaW9uIjoxLCJzdWIiOiI2MjJmNDliZWFmZTIyNDAwMWMyN2I0MTAiLCJuYmYiOjE2NDcyNzc2NjEsImF1ZCI6ImE0YzUzMWY3YmJiNTkzNGE5MmI2YTRiNDQ2YjZiY2MwIiwianRpIjoiNDE2MzI3MCIsInNjb3BlcyI6WyJhcGlfcmVhZCIsImFwaV93cml0ZSJdfQ.glT5hdXm0_zuUL22yDwH_vkUoNbsHEeJMumKet9dC-Y',
            }
        }).then(res => res.json())
        .then(function(jsonData) {
            console.log('JSON ya parseado:', jsonData)
            innerHTML(jsonData);
        })
        .catch(error => console.error('Error:', error));

    function innerHTML(data) {
        console.log(data)
        let results = data.results
        results.forEach(item => {
            if (item.title.toLowerCase().trim() == name.toLowerCase().trim()) {
                document.getElementById('sinopsis').innerHTML = item.overview;
            }

        });

    }
</script>
@endsection