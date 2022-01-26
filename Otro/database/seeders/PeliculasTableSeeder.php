<?php

namespace Database\Seeders;

use App\Models\Peliculas;
use Illuminate\Database\Seeder;

class PeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peliculas::create([
            'name'=>"Alguien voló sobre el nido del cuco",
            'director'=>"Miloš Forman",
            'año'=>"1975",
            'genero'=>"Drama",
            'distribuidora'=>"United Artists",
            'sinopsis'=>"Un grupo de pacientes mentales sigue a Randle P. McMurphy, el personaje inadaptado social de la novela de Ken Kesey.",
            'tipo'=>"Premium",
            'imagen'=>"alguienvolo.jpg"

        ]);
        Peliculas::create([
            'name'=>"American History X",
            'director'=>"Tony Kaye",
            'año'=>"1998",
            'genero'=>"Drama",
            'distribuidora'=>"New Line Cinema",
            'sinopsis'=>"Tras ser liberado de la cárcel, un antiguo neonazi trata de evitar que su hermano menor siga sus pasos en la senda del odio.",
            'tipo'=>"Estandar",
            'imagen'=>"americanhistory.jpg"

        ]);
        Peliculas::create([
            'name'=>"Blade Runner",
            'director'=>"Ridley Scott",
            'año'=>"1982",
            'genero'=>"Ciencia Ficción",
            'distribuidora'=>"Warner Bros",
            'sinopsis'=>"En un futuro sombrío y lluvioso, un expolicía vuelve al servicio para buscar y destruir a un grupo de androides que fingen ser humanos para, integrados en la sociedad, encontrar a su creador y matarlo.",
            'tipo'=>"Premium",
            'imagen'=>"bladerunner.jpg"

        ]);
        Peliculas::create([
            'name'=>"Cadena Perpetua",
            'director'=>"Frank Darabont",
            'año'=>"1994",
            'genero'=>"Drama",
            'distribuidora'=>"Columbia Pictures",
            'sinopsis'=>"Un hombre inocente es enviado a una corrupta penitenciaria de Maine en 1947 y sentenciado a dos cadenas perpetuas por un doble asesinato.",
            'tipo'=>"Estandar",
            'imagen'=>"cadenaperpetua.jpg"

        ]);
        Peliculas::create([
            'name'=>"La chaqueta Metálica",
            'director'=>"Stanley Kubrick",
            'año'=>"1988",
            'genero'=>"Acción",
            'distribuidora'=>"Columbia Pictures",
            'sinopsis'=>"Un infante de marina y sus compañeros se enfrentan al entrenamiento básico bajo la guía de un sargento sádico y pelean en la ofensiva Tet de 1968.",
            'tipo'=>"Estandar",
            'imagen'=>"chaquetametalica.jpg"

        ]);
        Peliculas::create([
            'name'=>"El Club de la lucha",
            'director'=>"David Fincher",
            'año'=>"1999",
            'genero'=>"Thriller",
            'distribuidora'=>"20th Century Studios",
            'sinopsis'=>"Un empleado de oficina insomne, harto de su vida, se cruza con un vendedor peculiar. Ambos crean un club de lucha clandestino como forma de terapia y, poco a poco, la organización crece y sus objetivos toman otro rumbo.",
            'tipo'=>"Premium",
            'imagen'=>"clubdelalucha.jpg"

        ]);
        Peliculas::create([
            'name'=>"El Golpe",
            'director'=>"George Roy Hill",
            'año'=>"1974",
            'genero'=>"Crimen",
            'distribuidora'=>"20th Century Studios",
            'sinopsis'=>"Durante la Depresión, dos hombres buscan una manera de estafar al mafioso culpable de la muerte de un compañero.",
            'tipo'=>"Estandar",
            'imagen'=>"elgolpe.jpg"

        ]);
        Peliculas::create([
            'name'=>"El Padrino",
            'director'=>"Francis Ford Coppola",
            'año'=>"1972",
            'genero'=>"Crimen",
            'distribuidora'=>"Paramount Pictures",
            'sinopsis'=>"El padrino es el nombre que reciben las películas dirigidas por Francis Ford Coppola​ y escritas por él mismo junto con el novelista Mario Puzo.​ La trilogía consta de las tres películas: El padrino, ​ El padrino II y El padrino III.",
            'tipo'=>"Premium",
            'imagen'=>"elpadrino.jpg"

        ]);
        Peliculas::create([
            'name'=>"El Padrino 2",
            'director'=>"Francis Ford Coppola",
            'año'=>"1974",
            'genero'=>"Crimen",
            'distribuidora'=>"Paramount Pictures",
            'sinopsis'=>"El padrino es el nombre que reciben las películas dirigidas por Francis Ford Coppola​ y escritas por él mismo junto con el novelista Mario Puzo.​ La trilogía consta de las tres películas: El padrino, ​ El padrino II y El padrino III.",
            'tipo'=>"Estandar",
            'imagen'=>"elpadrinoII.jpg"

        ]);
        Peliculas::create([
            'name'=>"El Pianista",
            'director'=>"Roman Poalnski",
            'año'=>"2002",
            'genero'=>"Bélica",
            'distribuidora'=>"Focus Features",
            'sinopsis'=>"Un judío polaco, pianista profesional, lucha por la supervivencia en Varsovia frente a la invasión nazi. Después de, gracias a unos amigos, haber evitado la deportación, el pianista debe vivir oculto y constantemente expuesto al peligro.",
            'tipo'=>"Estandar",
            'imagen'=>"elpianista.jpg"

        ]);
        Peliculas::create([
            'name'=>"El Precio del poder",
            'director'=>"Brian de Palma",
            'año'=>"1984",
            'genero'=>"Crimen",
            'distribuidora'=>"Universal Pictures",
            'sinopsis'=>"Scarface es una película estadounidense de 1983, dirigida por Brian De Palma y protagonizada por Al Pacino, Steven Bauer, Michelle Pfeiffer, Mary Elizabeth Mastrantonio, Robert Loggia, Harris Yulin, Paul Shenar y F. Murray Abraham.",
            'tipo'=>"Estandar",
            'imagen'=>"elpreciodelpoder.jpg"

        ]);
        Peliculas::create([
            'name'=>"La vida es bella",
            'director'=>"Roberto Benigni",
            'año'=>"1997",
            'genero'=>"Bélico",
            'distribuidora'=>"Miramax",
            'sinopsis'=>"Un hombre construye una elaborada fantasía para proteger a su hijo en un campo de concentración nazi.",
            'tipo'=>"Estandar",
            'imagen'=>"lavidaesbella.jpg"

        ]);
        Peliculas::create([
            'name'=>"La naranja mecánica",
            'director'=>"Stanley Kubrick",
            'año'=>"1971",
            'genero'=>"Drama",
            'distribuidora'=>"Warner Bros",
            'sinopsis'=>"Un criminal en la Inglaterra del futuro pasa una serie de procesos experimentales para corregir sus impulsos violentos.",
            'tipo'=>"Estandar",
            'imagen'=>"naranjamecanica.jpg"

        ]);/*
        Peliculas::create([
            'name'=>"Pulp Fiction",
            'director'=>"Quentin Tarantino",
            'año'=>"1995",
            'genero'=>"Drama",
            'distribuidora'=>"Miramax",
            'sinopsis'=>"Pulp Fiction es una película estadounidense de 1994​ escrita y dirigida por Quentin Tarantino.",
            'tipo'=>"Premium",
            'imagen'=>"pulpfiction.jpg"

        ]);
        Peliculas::create([
            'name'=>"La lista de Schindler",
            'director'=>"Steven Spielberg",
            'año'=>"1993",
            'genero'=>"Bélico",
            'distribuidora'=>"Universal Pictures",
            'sinopsis'=>"El empresario alemán Oskar Schindler, miembro del Partido Nazi, pone en marcha un elaborado, costoso y arriesgado plan para salvar a más de mil judíos del Holocausto.",
            'tipo'=>"Estandar",
            'imagen'=>"schindler.jpg"

        ]);
        Peliculas::create([
            'name'=>"Seven",
            'director'=>"David Fincher",
            'año'=>"1996",
            'genero'=>"Thriller",
            'distribuidora'=>"Warner Bros",
            'sinopsis'=>"Somerset es un solitario y veterano detective a punto de retirarse que se encuentra con Mills, un joven impulsivo.",
            'tipo'=>"Premium",
            'imagen'=>"seven.jpg"

        ]);
        Peliculas::create([
            'name'=>"El silencio de los coredero",
            'director'=>"Jonatahn Demme",
            'año'=>"1991",
            'genero'=>"Suspense",
            'distribuidora'=>"Orion Pictures",
            'sinopsis'=>"Una agente en entrenamiento del FBI busca la ayuda y consejo de un brillante asesino para poder capturar a otro asesino, el doctor Hannibal Lecter.",
            'tipo'=>"Premium",
            'imagen'=>"silenciocorderos.jpg"

        ]);
        Peliculas::create([
            'name'=>"Taxi Driver",
            'director'=>"Martin Scorsese",
            'año'=>"1977",
            'genero'=>"Thriller",
            'distribuidora'=>"Columbia Pictures",
            'sinopsis'=>"Taxi Driver es una película estadounidense dramática de 1976, dirigida por Martin Scorsese, escrita por Paul Schrader y protagonizada por Robert De Niro.​ ",
            'tipo'=>"Estandar",
            'imagen'=>"taxidriver.jpg"

        ]);*/
    }
}
