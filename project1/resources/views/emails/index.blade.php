@extends("layouts.app2")
@section("content")
<div class="flex justify-center flex-wrap p-4 mt-5">
  <form class="w-full max-w-lg border-8 p-2" method="POST" action="{{url('contactaProcess')}}">
    @csrf
    <h1 class="font-semibold py-5 text-blue mb-10 bg-red-900 text-white px-5">{{ __("Contactanos") }} </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
          {{ __("Nombre") }}
        </label>
        <input name="name" value="{{ $user->name }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
        <!-- <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre del proyecto") }}</p> //DESCRIPCION DEL INPUT-->
        @error("name")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
          {{ __("Email") }}
        </label>
        <input name="email" value="{{ $user->email }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="text">
        @error("email")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="description">
          {{ __("Mensaje") }}
        </label>
        <textarea name="mensaje" class="no-resize appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="mensaje"></textarea>
        <!-- <p class="text-gray-600 text-xs italic -my-3">{{ __("¿De qué trata tu proyecto?") }}</p>   //DESCRIPCION DEL INPUT -->
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
@endsection