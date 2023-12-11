<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'day'=>fake()->dayOfWeek(),
            'date'=>fake()->date(),
            'owner_id'=>$owner->id,
            'time'=>fake()->dateTime(),
            'location'=>fake()->country(),
            'guest'=>fake()->email(),
            'duration'=>fake()->time(),
            'note'=>fake()->text(),

        ];
    }
}
