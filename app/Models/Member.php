<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Task;
use App\Models\Team;
use App\Models\Event;
use App\Models\Attend;
use App\Models\Course;
use App\Models\Project;
use App\Models\Feedback;
use App\Models\Workspace;
use App\Models\Scopes\AdminScope;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Member extends Authenticatable
{
    use HasFactory,SoftDeletes,HasApiTokens;
    protected $guard = "member";

    protected $fillable =[
        'name',
        'photo',
        'email',
        'password',
        'position',
        'status',
        'company',
        'phone',
        'contract',
        'role',
        'city',
        'is_verify'
    ];
    protected $hidden = [
        'password',

    ];



    public function workspaces(){
        return $this->belongsToMany(Workspace::class);
    }
    public function teams(){
        return $this->belongsToMany(Team::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class,'owner_id');
    }
    public function statuses(){
        return $this->hasMany(Status::class);
    }
    public function Projects(){
        return $this->hasMany(Project::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function Feedback(){
        return $this->hasMany(Feedback::class);
    }
    public function events(){
        return $this->belongsToMany(Event::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function attend(){
        return $this->morphMany(Attend::class,'attendable');
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }



}
