<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GODFATHER') }}</title><!--Nombre del proyecto(cambiar tambien en .env)-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-black h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gradient-to-r from-gray-400 via-gray-500 to-gray-700 py-10">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-white hover:text-red-500 no-underline">
                        {{ config('app.name', 'GODFATHER') }}
                    </a>
                </div>
                 <!-- ADD THIS NAVIGATION OPTION-->
                @auth
                @if(!Auth::user()->roles()->find(1))
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto ml-20">
                <div class="text-sm lg:flex-grow ml-20">
                <a href="{{url('mispeliculas')}}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-500 mr-20">
                {{ __("MIS PELICULAS") }}<!-- Me crea el boton Proyectos al al lado de Laravel una vez estoy autenticado en /projects(la carpeta que hemos creado en views,y llama a su index.) -->
                </a>
                @endif
                @endauth
                <!-- END THIS NAVIGATION OPTION-->
                  <!-- ADD THIS NAVIGATION OPTION-->
                  @auth
                  @if(!Auth::user()->roles()->find(1))
                  <a href="{{url('contacta')}}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-500 mr-20">
                  {{ __("SOPORTE") }}<!-- Me crea el boton Proyectos al al lado de Laravel una vez estoy autenticado en /projects(la carpeta que hemos creado en views,y llama a su index.) -->
                  </a>
                  @endif
                  @endauth
                   <!-- END THIS NAVIGATION OPTION-->
                     <!-- ADD THIS NAVIGATION OPTION-->
                  @auth
                  @if(!Auth::user()->roles()->find(1))
                  <a href="{{url('peliculasrecom')}}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-500 mr-20">
                  {{ __("PELICULAS RECOMENDADAS") }}<!-- Me crea el boton Proyectos al al lado de Laravel una vez estoy autenticado en /projects(la carpeta que hemos creado en views,y llama a su index.) -->
                  </a>
                  @endif
                  @endauth
                   <!-- END THIS NAVIGATION OPTION-->
                  <!-- ADD THIS NAVIGATION OPTION-->
                  @auth
                  @if(!Auth::user()->roles()->find(1))
                  <a href="{{url('favoritos')}}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-500 mr-20">
                  {{ __("FAVORITOS") }}<!-- Me crea el boton Proyectos al al lado de Laravel una vez estoy autenticado en /projects(la carpeta que hemos creado en views,y llama a su index.) -->
                  </a>
                  </div>
                  </div>
                  @endif
                  @endauth
              
                  
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline  hover:text-red-500" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        @if (Route::has('register'))                                                                        <!--Se cambiara en las rutas que se ven, login y register -->
                            <a class="no-underline hover:text-red-500" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span> <!--Nombre que saldra al lado de desconectarse, el nombre del usuario autentificado -->

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:text-red-500"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Desconectarse') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @if(session("success"))
        <div class="container mx-auto mt-5">
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">{{ __("Nuevo mensaje") }}</p>
                        <p class="text-sm">{{ session("success") }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
    </div>
</body>
</html>