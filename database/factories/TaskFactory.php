<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Status;
use App\Models\Member;
use App\Models\Tag;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $project = Project::first();
        $status = Status::first();
        $tag = Tag::first();
        $member = Member::first();
        return [
            'name'=>fake()->name(),
            'started'=>fake()->date(),
            'ended'=>fake()->date(),
            'duration'=>fake()->text(),
            'Priority'=>'high',
            'photo'=>fake()->image(),
            'project_id'=>$project->id,
            'team_id'=>$project->team->id,
            'status_id'=>$status->id,
            'tag_id'=>$tag->id,
            'owner_id'=>$project->member->id,
            'assignTo'=>$member->id,

        ];
    }
}
