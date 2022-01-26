<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(['administrador','moderador','invitado']),
            'display_name' => $this->faker->company(),
            'description' => $this->faker->company()
        ];
    }
}
