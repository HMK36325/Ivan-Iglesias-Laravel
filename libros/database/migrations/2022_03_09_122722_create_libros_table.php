<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('tematica');
            $table->text('sinopsis'); // OJO, si es tipo string no deja meter más de una extension
            $table->string('autor');
            $table->timestamps();
        });

        DB::table("libros")
        ->insert([
        "titulo" => "El codigo da Vinci",
        "tematica"=>"misterio/conspiración",
        "sinopsis"=>"La mayor conspiración de los últimos 2000 años está a punto de ser desvelada. Robert Langdon recibe una llamada en mitad de la noche",
        "autor"=>"Dan Brown"
        
    ]);
        DB::table("libros")
        ->insert([
        "titulo" => "La sangre de los inocentes",
        "tematica"=>"narrativa histórica",
        "sinopsis"=>"Una vertiginosa aventura que nos transporta a lugares como Jerusalén, Granada, Roma o Estambul, y que indaga en las causas del fanatismo religioso y la intolerancia a lo largo de los siglos.",
        "autor"=>"Julia Navarro"
        
    ]);
         DB::table("libros")
        ->insert([
         "titulo" => "Los pilares de la tierra",
         "tematica"=>"novela histórica",
         "sinopsis"=>" El amor y la muerte se entrecruzan vibrantemente en este magistral tapiz cuyo centro es la construcción de una catedral gótica. La historia se inicia con el ahorcamiento público de un inocente y finaliza con la humillación de un rey.",
         "autor"=>"Ken Follet"
         
    ]);


         DB::table("libros")
        ->insert([
         "titulo" => "La fortaleza digital",
         "tematica"=>"Tecno-thriller",
         "sinopsis"=>" Un misterioso e indescifrable código hará tambalear las más altas esferas de poder. 
         Cuando el sofisticado superordenador de la NSA —la agencia de Inteligencia más poderosa del mundo
         intercepta un código que es incapaz de descifrar, ésta debe recurrir a su mejor criptógrafa, Susan Fletcher.",
         "autor"=>"Dan Brown"
         
    ]);
         DB::table("libros")
        ->insert([
        "titulo" => "Canción de hielo y fuego ",
        "tematica"=>"Literatura fantástica",
        "sinopsis"=>"El invierno se acerca a los Siete Reinos. Lord Eddard Stark, señor de Invernalia, deja sus dominios para unirse a la corte del rey Robert Baratheon el Usurpador.",
        "autor"=>"George R.R. Martin"
        
]);
        DB::table("libros")
        ->insert([
        "titulo" => "Choque de reyes",
        "tematica"=>"Literatura fantástica",
        "sinopsis"=>"La guerra civil se ha extendido por los reinos de Poniente y pasará a conocerse como la Guerra de los Cinco Reyes. Mientras, la Guardia de la Noche envía un grupo de reconocimiento al norte, más allá del muro. En el lejano este, Daenerys Targaryen continua con su misión: volver a los Siete Reinos para reconquistarlos.",
        "autor"=>"George R.R. Martin"
        
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
