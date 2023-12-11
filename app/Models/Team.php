<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Task;
use App\Models\Member;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'started',
        'description',
        'Size',
    ];

    public function owner(){
        return $this->belongsTo(Member::class, 'owner_id');

    }

    public function members(){
        return $this->belongsToMany(Member::class,'member_team','team_id','member_id')
        ->withTimestamps();
        ;
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function Tasks(){
        return $this->hasMany(Task::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
