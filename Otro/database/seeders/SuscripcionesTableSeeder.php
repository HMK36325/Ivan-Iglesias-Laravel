<?php

namespace Database\Seeders;

use App\Models\Suscripciones;
use Illuminate\Database\Seeder;

class SuscripcionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscripciones::create(['name'=>"Gratuita","precio"=>0]);
        Suscripciones::create(['name'=>"Mensual","precio"=>3]);
        Suscripciones::create(['name'=>"Anual","precio"=>30]);

    }
}
