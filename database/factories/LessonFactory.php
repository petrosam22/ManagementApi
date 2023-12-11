<?php

namespace Database\Factories;
use App\Models\Course;
use App\Models\Status;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = Course::first();
        $status = Status::first();

        return [
            'name'=>fake()->name(),
            'date'=>fake()->date(),
            'time'=>fake()->time(),
            'course_id'=>$course->id,
            'status_id'=>$status->id,

        ];
    }
}
