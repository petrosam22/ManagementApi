<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\Status;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $member = Member::first();
        $status = Status::first();
        return [
            'name'=>fake()->name(),
            'started'=>fake()->date(),
            'ended'=>fake()->date(),
            'duration'=>fake()->time(),
            'lessons'=>fake()->numberBetween(1,5),
            'photo'=>fake()->image(),
            'remainder'=>false,
            'finish'=>false,
            'member_id'=>$member->id,
            'status_id'=>$status->id,

        ];
    }
}
