<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Team;
use App\Models\Member;
use App\Models\Status;
use App\Models\Project;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory,SoftDeletes;
protected $fillable = [
    'name',
    'started',
    'ended',
    'duration',
    'Priority',
    'photo',
    'project_id',
    'team_id',
    'status_id',
    'owner_id',
    'assignTo',
];

public function owner(){
    return $this->belongsTo(Member::class,'owner_id');
}
public function assignTo(){
    return $this->belongsTo(Member::class,'assignTo');
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

public function project(){
    return $this->belongsTo(Project::class);
}
public function Feedback(){
    return $this->hasMany(Feedback::class);
}
}
