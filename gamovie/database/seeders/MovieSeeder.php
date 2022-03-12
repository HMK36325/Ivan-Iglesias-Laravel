<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create([
            'name'=>"Alguien voló sobre el nido del cuco",
            'director'=>"Miloš Forman",
            'año'=>"1975",
            'genero'=>"Drama",
            'distribuidora'=>"United Artists",
            'imagen'=>"alguienvolo.jpg"

        ]);
        Movie::create([
            'name'=>"American History X",
            'director'=>"Tony Kaye",
            'año'=>"1998",
            'genero'=>"Drama",
            'distribuidora'=>"New Line Cinema",
            'imagen'=>"americanhistory.jpg"

        ]);
        Movie::create([
            'name'=>"Blade Runner",
            'director'=>"Ridley Scott",
            'año'=>"1982",
            'genero'=>"Ciencia Ficción",
            'distribuidora'=>"Warner Bros",
            'imagen'=>"bladerunner.jpg"

        ]);
        Movie::create([
            'name'=>"Cadena Perpetua",
            'director'=>"Frank Darabont",
            'año'=>"1994",
            'genero'=>"Drama",
            'distribuidora'=>"Columbia Pictures",
            'imagen'=>"cadenaperpetua.jpg"

        ]);
        Movie::create([
            'name'=>"La chaqueta Metálica",
            'director'=>"Stanley Kubrick",
            'año'=>"1988",
            'genero'=>"Acción",
            'distribuidora'=>"Columbia Pictures",
            'imagen'=>"chaquetametalica.jpg"

        ]);
        Movie::create([
            'name'=>"El Club de la lucha",
            'director'=>"David Fincher",
            'año'=>"1999",
            'genero'=>"Thriller",
            'distribuidora'=>"20th Century Studios",
            'imagen'=>"clubdelalucha.jpg"

        ]);
        Movie::create([
            'name'=>"El Golpe",
            'director'=>"George Roy Hill",
            'año'=>"1974",
            'genero'=>"Crimen",
            'distribuidora'=>"20th Century Studios",
            'imagen'=>"elgolpe.jpg"

        ]);
        Movie::create([
            'name'=>"Piratas del Caribe: La maldición de la Perla Negra",
            'director'=>"Gore Verbinski",
            'año'=>"2003",
            'genero'=>"Aventura",
            'distribuidora'=>"Walt Disney Pictures",
            'imagen'=>"piratasDelCaribe.jpg"

        ]);
        Movie::create([
            'name'=>"El Padrino 2",
            'director'=>"Francis Ford Coppola",
            'año'=>"1974",
            'genero'=>"Crimen",
            'distribuidora'=>"Paramount Pictures",
            'imagen'=>"elpadrinoII.jpg"

        ]);
        Movie::create([
            'name'=>"Uncharted",
            'director'=>"Ruben Fleischer",
            'año'=>"2022",
            'genero'=>"Aventura",
            'distribuidora'=>"Sony Pictures Entertainment",
            'imagen'=>"uncharted.jpg"

        ]);
        Movie::create([
            'name'=>"El Pianista",
            'director'=>"Roman Poalnski",
            'año'=>"2002",
            'genero'=>"Bélica",
            'distribuidora'=>"Focus Features",
            'imagen'=>"elpianista.jpg"

        ]);
        Movie::create([
            'name'=>"El Precio del poder",
            'director'=>"Brian de Palma",
            'año'=>"1984",
            'genero'=>"Crimen",
            'distribuidora'=>"Universal Pictures",
            'imagen'=>"elpreciodelpoder.jpg"

        ]);
        Movie::create([
            'name'=>"El Padrino",
            'director'=>"Francis Ford Coppola",
            'año'=>"1972",
            'genero'=>"Crimen",
            'distribuidora'=>"Paramount Pictures",
            'imagen'=>"elpadrino.jpg"

        ]);
        Movie::create([
            'name'=>"La vida es bella",
            'director'=>"Roberto Benigni",
            'año'=>"1997",
            'genero'=>"Bélico",
            'distribuidora'=>"Miramax",
            'imagen'=>"lavidaesbella.jpg"

        ]);
        Movie::create([
            'name'=>"La naranja mecánica",
            'director'=>"Stanley Kubrick",
            'año'=>"1971",
            'genero'=>"Drama",
            'distribuidora'=>"Warner Bros",
            'imagen'=>"naranjamecanica.jpg"

        ]);
        Movie::create([
            'name'=>"El Caballero Oscuro",
            'director'=>"Christopher Nolan",
            'año'=>"2008",
            'genero'=>"Acción",
            'distribuidora'=>"Warner Bros",
            'imagen'=>"batman.jpg"

        ]);
        Movie::create([
            'name'=>"The Batman",
            'director'=>"Matt Reeves",
            'año'=>"2022",
            'genero'=>"Acción",
            'distribuidora'=>"Warner Bros",
            'imagen'=>"thebatman.jpg"

        ]);
        Movie::create([
            'name'=>"El Señor de los anillos: La Comunidad del Anillo",
            'director'=>"Peter Jackson",
            'año'=>"2001",
            'genero'=>"Fantasía",
            'distribuidora'=>"New Line Cinema",
            'imagen'=>"comunidad.jpg"

        ]);
        Movie::create([
            'name'=>"El señor de los anillos: Las dos torres",
            'director'=>"Peter Jackson",
            'año'=>"2002",
            'genero'=>"Fantasía",
            'distribuidora'=>"New Line Cinema",
            'imagen'=>"dosTorres.jpg"

        ]);
        Movie::create([
            'name'=>"El señor de los anillos: El retorno del rey",
            'director'=>"Peter Jackson",
            'año'=>"2003",
            'genero'=>"Fantasía",
            'distribuidora'=>"New Line Cinema",
            'imagen'=>"retornoRey.jpg"

        ]);
    }
}
