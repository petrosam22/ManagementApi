<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invite>
 */
class InviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $workspace = Workspace::first();
        return [
            'email'=>fake()->email(),
            'workspace_id'=>$workspace->id ,
            'role'=>'member' ,
            'status'=>'pending' ,
        ];
    }
}
