<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'photo'=>fake()->image(),
            'email'=> fake()->email(),
            'password'=>bcrypt('1233456789'),
            'position'=>'Web Developer',
            'Status'=>'active',
            'company'=>'Microsoft',
            'phone'=>fake()->phoneNumber(),
            'contract'=>fake()->date(),
            'role'=>'member',
            'city'=>fake()->country(),
        ];
    }
}
