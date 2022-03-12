@extends('layouts.footer')
@extends("layouts.app")
@section("content")
@if(Auth::check())
<div class="flex justify-center flex-wrap p-4 mt-5 mb-36">
  <form class="w-full max-w-lg" method="POST" action="{{url('contactaProcess')}}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Name
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="grid-first-name" type="text" value="{{ $user->name}}"> <!-- <p class="text-gray-600 text-xs italic -my-3"> __("Nombre del proyecto")  }}</p> //DESCRIPCION DEL INPUT-->
        @error("name")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          E-mail
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="email" id="email" type="email" value="{{ $user->email}}">
        @error("email")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Message
        </label>
        <textarea class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" name="mensaje" id="mensaje"></textarea>
        @error("message")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="md:flex md:items-center">
      <div class="md:w-1/3">
        <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
          {{ __("Enviar") }}
        </button>
      </div>
    </div>
  </form>
</div>
@else
<div class="flex justify-center flex-wrap p-4 mt-5 mb-96">
  <div>
    <h1 class="font-semibold py-5 text-blue mb-5 text-xl text-white px-5">{{ __("Logueate por favor.") }} </h1>
  </div>
</div>
@endif
@endsection