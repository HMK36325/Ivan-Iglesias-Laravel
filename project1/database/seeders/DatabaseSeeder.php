<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Genero un usuario siempre igual que va ser nuestro admin
/*          \App\Models\User::create([
            'name' => 'Raul Nuñez',
            'email' => 'raul@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'Ka18aprTpW7QFVtyuufd9n8aUvdbldx9XR7V8jM4SI2uEEyxLjetB02uRzDV'
        ]);   */

            //\App\Models\User::factory(9)->create();
            //\App\Models\Project::factory(10)->create();
                  
/*          \App\Models\Role::create([
            'name' => 'Admin',
            'display_name' => 'Administrador',
            'description' => null
        ]);
        \App\Models\Role::create([
            'name' => 'Mod',
            'display_name' => 'Moderador',
            'description' => null
        ]);
        \App\Models\Role::create([
            'name' => 'Ge',
            'display_name' => 'Guest',
            'description' => null
        ]);   

        $this->seedRelationRolesUser();  */
    }

    public function seedRelationRolesUser()
    {
        //Asigno al primer usuario q es nuestro admin el rol de admin
        \App\Models\User::find(1)->role()->sync(1);
        $users = \App\Models\User::all();

        //luego les meto al resto de usuarios el rol de invitado
        foreach ($users as $user) {
            if ($user!=\App\Models\User::find(1)) {
                $user->role()->sync(3);
            }
        }
    }
}
