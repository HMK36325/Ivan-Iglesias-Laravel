<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peliculas</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--AJAX-->
    <script>
console.log(sessionStorage.getItem('favoritos'))
console.log(sessionStorage.getItem('actualizar'))


$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "{{url('favoritos')}}",
        data: {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "var":  sessionStorage.getItem('favoritos'),
    },
        success: function (response) {
          console.log(response)
          var fav=sessionStorage.getItem('actualizar')
console.log(typeof fav);
if(fav=="1"){
  sessionStorage.setItem('actualizar',0)
  location.reload()
}
        }
    });
});

</script>
<?php
if(isset($_GET["var"])){
$_SESSION["favoritos"]=$_GET["var"];

}
if(!isset($_SESSION["favoritos"])){
  ?>
<style>
        
        .gradient {
          background: linear-gradient(90deg, #0E0362  0%, #21DDE6 100%);
       
        }
        .gradient2 {
          background: linear-gradient(90deg, #0E0362  0%, #21DDE6 100%);
       
        }
          .work-sans {
              font-family: 'Work Sans', sans-serif;
          }
                  
          #menu-toggle:checked + #menu {
              display: block;
          }
          
          .hover\:grow {
              transition: all 0.3s;
              transform: scale(1);
          }
          
          .hover\:grow:hover {
              transform: scale(1.02);
          }
          
          .carousel-open:checked + .carousel-item {
              position: static;
              opacity: 100;
          }
          
          .carousel-item {
              -webkit-transition: opacity 0.6s ease-out;
              transition: opacity 0.6s ease-out;
          }
          
          #carousel-1:checked ~ .control-1,
          #carousel-2:checked ~ .control-2,
          #carousel-3:checked ~ .control-3 {
              display: block;
          }
          
          .carousel-indicators {
              list-style: none;
              margin: 0;
              padding: 0;
              position: absolute;
              bottom: 2%;
              left: 0;
              right: 0;
              text-align: center;
              z-index: 10;
          }
          
          #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
          #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
          #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
              color: #000;
              /*Set to match the Tailwind colour you want the active one to be */
          }
      </style>
  <script>
  
  </script>
  </head>
  
  
  <body class="gradient text-white work-sans leading-normal tracking-normal text-base tracking-normal">
  
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
  
  
  <section class="gradient py-8">
  
  <div id="el" class="container mt-20 mx-auto flex items-center flex-wrap  pb-12">
  
      <nav id="store" class="w-full z-30 top-0 px-6 py-1">
  
          <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
  
          <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
         Mis Películas Favoritas
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto bg-white w-2/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
  
              <div class="flex items-center" id="store-nav-content">
              </div>
        </div>
      </nav>




<?php 
}
else{
  ?>

    <style>
        
      .gradient {
        background: linear-gradient(90deg, #0E0362  0%, #21DDE6 100%);
     
      }
      .gradient2 {
        background: linear-gradient(90deg, #0E0362  0%, #21DDE6 100%);
     
      }
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }
        
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>
<script>

</script>
</head>


<body class="gradient text-white work-sans leading-normal tracking-normal text-base tracking-normal">

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


<section class="gradient py-8">

<div id="el" class="container mt-20 mx-auto flex items-center flex-wrap  pb-12">

    <nav id="store" class="w-full z-30 top-0 px-6 py-1">

        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Mis Películas Favoritas
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-2/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>

            <div class="flex items-center" id="store-nav-content">
            </div>
      </div>
    </nav>
    <?php

 $favs=explode(",",$_SESSION["favoritos"]);
 $cont=0;
$len=count($favs);
?>
    @foreach($peliculas as $pelicula)
    @if($cont<$len)
    @if($pelicula->id==$favs[$cont])
    <!--{{$cont=$cont+1}}-->
    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
        <a href="{{url('visualizar',$pelicula->id)}}">
            <img class="hover:grow hover:shadow-lg" src="{{asset($pelicula->imagen) }}">
            <div class="pt-3 flex flex-col items-start justify-between">
                <div class="font-black">Película: {{$pelicula->name}}</div><div class="font-black">Director: {{$pelicula->director}}</div><div class="font-black">Año: {{$pelicula->año}}</div><div class="font-black">Género: {{$pelicula->genero}}</div>
               
   
              
            </div>
        </a>
    </div>

     @endif

     @endif
    @endforeach
    </div>

</section>
    <section class="container mx-auto text-center py-6 mb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        !HAZTE PREMIUM!
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <h3 class="my-4 text-3xl leading-tight">
       ¡Dispon de las mejores películas con GodFather Premium!
      </h3>
      <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"onclick='window.location.replace("{{ url('prime') }}");'>
        Premium!
      </button>
    </section>
     <!--Footer-->
     <footer class="bg-white">
      <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
          <div class="flex-1 mb-6 text-black">
            <a class="text-blue-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
              <!--Icon from: http://www.potlabicons.com/ -->
              GODFATHER
            </a>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Links</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Legal</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Social</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Company</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
</body>


</html>

<?php
}
?>



  