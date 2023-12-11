<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\Project;
use App\Models\Workspace;
use App\Models\Tag;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $tag = Tag::first();
        $member = Member::first();
        $workspace = Workspace::first();
        $project = Project::where('workspace_id',$workspace->id)->first();
        return [
            'title'=>fake()->text(),
            'description'=>fake()->text(),
            'date'=>fake()->date(),
            'photo'=>fake()->image(),
            'project_id'=> $project->id,
            'team_id'=>$project->team->id,
            'tag_id'=>  $tag->id,
            'member_id'=>$member->id,

        ];
    }
}
