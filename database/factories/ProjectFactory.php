<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Date;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use App\Models\Workspace;
use App\Models\Member;
use App\Models\Status;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $team = Team::first();
        $workspace = Workspace::first();
        $member = Member::first();
        $status = Status::first();
        $tag = Tag::first();
        return [
            'name'=>fake()->name(),
            'started'=>fake()->date(),
            'ended'=>fake()->date(),
            'time'=>Date::now(),
            'team_id'=>$team->id,
            'workspace_id'=>$workspace->id,
            'owner_id'=>$member->id,
            'progress'=>0,
            'status_id'=>$status->id,
            'tag_id'=>$tag->id,
            'budget'=>'122.5',
            'description'=>fake()->text(),
            'close'=>false,

        ];
    }
}
