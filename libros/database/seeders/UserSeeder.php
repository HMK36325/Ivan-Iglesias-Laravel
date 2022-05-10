<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name'=>'Nacho',
            'email'=> 'vyd15559@educastur.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password')
        ]);
        $usuario->assignRole('admin');
        $roles=Role::all();
        for($i=0;$i<9;){
            $rol=$roles->random()->name;
            if($rol!='admin'){
                User::factory()->create()->assignRole($rol);
                $i++;
            }
        }
        
    }
}
