<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>'peter',
            'photo'=>fake()->image(),
            'email'=>'petrosam26@gmail.com',
            'password'=>bcrypt('password'),
            'Status'=>'active',
            'phone'=>fake()->numberBetween(1,5),
            'role'=>'admin',
            'city'=>fake()->city(),

        ];
    }
}
