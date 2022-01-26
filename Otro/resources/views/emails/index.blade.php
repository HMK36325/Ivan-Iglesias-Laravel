<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.7.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
           .gradient {
        background: linear-gradient(90deg, #0E0362  0%, #21DDE6 100%);
     
      }
      </style>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center gradient" >
<!--Nav-->
<nav id="header" class="fixed gradient w-full z-30 top-0 text-white ">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class=" text-white no-underline hover:text-black font-bold text-2xl lg:text-4xl" href="{{ url('/') }}">
           GODFATHER
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-white  hover:text-black hover:text-underline font-black " href="{{ route('interface.index') }}">Peliculas</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white font-black hover:text-black hover:text-underline py-2 px-4" href="{{ route('interface.create') }}">Categorías</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white font-black hover:text-black hover:text-underline py-2 px-4" href="{{ url('tienda') }}">Tienda Premium</a>
            </li>
            @guest
            <li class="mr-3">
              <a class="inline-block text-white font-black hover:text-black hover:text-underline py-2 px-4" href="{{ route('login') }}">Iniciar Sesión</a>
            </li>
            @if (Route::has('register'))
            <li class="mr-3">
              <a class="inline-block text-white font-black hover:text-black hover:text-underline py-2 px-4" href="{{ route('register') }}">Registrarse</a>
            </li>
            @endif
            @else
            <li class="mr-3">
              <a class="inline-block text-white font-black hover:text-black hover:text-underline py-2 px-4" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Desconectarse</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
            </li>
            <li class="mr-3">
            <a href="{{ route('home') }}"class="inline-block no-underline hover:text-black">
    <svg class="fill-current hover:text-black font-black text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <circle fill="none" cx="12" cy="7" r="3" />
        <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
    </svg>
            </a>
    </li>
            @endguest
          </ul>


<a href="{{ url('prime') }}" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-black font-black rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Prime!
    </a>
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    <div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                        <h1 class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                           Contáctanos
                        </h1>
                        <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                            Rellena el siguiente formulario para ponerte en contacto
                        </p>

                        <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                               Calle Naranco, Oviedo
                                33820
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                1234567890
                            </div>
                        </div>

                        <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                oscar@gmail.com
                            </div>
                        </div>
                    </div>

                    <form action="{{url('contactaProcess')}}" class="p-6 flex flex-col justify-center" method="POST">
                    @csrf
                        <div class="flex flex-col">
                            <label for="name" class="hidden">Nombre</label>
                            <input type="name" name="name" id="name" placeholder="Nombre" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="email" class="hidden">Correo</label>
                            <input type="email" name="correo" id="email" placeholder="Correo" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="tel" class="hidden">Breve información</label>
                            <input type="tel" name="message" id="tel" placeholder="Información" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <button type="submit" class="md:w-32 bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-500 transition ease-in-out duration-300">
                          Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
  @if(session("success"))
<div class="h-screen flex justify-center items-center m-1 font-medium py-1 px-2  text-black bg-teal-500  ">
            <div slot="avatar">

            </div>
            <div class="text-xl font-normal  max-w-full flex-initial">
                <div class="py-2 font-bold">¡Mensaje Enviado con Éxito!
                </div>
                <div class="py-2"><a href="#">Ir al Menú Principal</a>
                </div>
                <div class="py-2"><a href="#">Ir a mi cuenta</a>
                </div>
                <div class="py-2"><a href="#">Volver a enviar</a>
                </div>
            </div>
            <div class="flex flex-auto flex-row-reverse">
                <div>
                    <svg  onclick='window.location.replace("{{url('contacta')}}");' xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
        </div>
    @endif
  </footer>
</html>
