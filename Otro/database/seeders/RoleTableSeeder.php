<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                                                 
        Role::create(['name'=>"administrador"]);
        Role::create(['name'=>"moderador"]);                                                
        Role::create(['name'=>"usuario"]);
        Role::create(['name'=>"usuario_premium"]);   
        
    }
}