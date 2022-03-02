@extends('layouts.footer')
@extends('layouts.app')
@section('content')
<div class="container mx-auto h-screen">
    <div class="text-center px-3 lg:px-0">
        <h1 class="my-4 text-2xl md:text-3xl lg:text-5xl font-black leading-tight">
            Main Hero Message to sell yourself!
        </h1>
        <p class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
            Sub-hero message, not too long and not too short. Make it just right!
        </p>

    </div>

    <div class="flex items-center w-full mx-auto content-end">
        <div class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded shadow-xl"></div>
    </div>
</div>
@endsection