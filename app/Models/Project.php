<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Team;
use App\Models\Member;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'started',
        'ended',
        'time',
        'team_id',
        'workspace_id',
        'owner_id',
        'progress',
        'status_id',
        'budget',
        'description',
        'close',

    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function Workspace(){
        return $this->belongsTo(Workspace::class);
    }
    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'tagable');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }


    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function Posts(){
        return $this->hasMany(Post::class);
    }
}
