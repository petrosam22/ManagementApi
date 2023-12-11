<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $owner = Member::first();
        return [
            'name'=>fake()->name(),
            'started'=>fake()->date(),
            'description'=>fake()->text(),
            'Size'=>5,
            'owner_id'=>$owner->id,
        ];
    }
}
