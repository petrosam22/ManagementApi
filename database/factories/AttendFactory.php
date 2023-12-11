<?php

namespace Database\Factories;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attend>
 */
class AttendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $member = Member::first();
        return [

            'attendable_id'=>$member->id,
            'attendable_type'=>get_class($member),
            'day'=>fake()->dayOfWeek(),
            'time'=>fake()->time(),
            'end'=>fake()->time(),

        ];
    }
}
