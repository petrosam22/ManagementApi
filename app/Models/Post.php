<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Team;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'date',
        'photo',
        'project_id',
        'team_id',
        'member_id',
        'tag_id',
    ];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'tagable');

    }

    public function Projects()
    {
        return $this->belongsTo(Project::class);
    }

    public function comment()
    {
        return $this->morphToMany(Comment::class,'commantable');
    }



}
