<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','owner_id'];


    public function member(){
        return $this->belongsTo(Member::class,'owner_id');

    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function Tasks(){
        return $this->hasMany(Task::class);
    }
    public function Courses(){
        return $this->hasMany(Course::class);
    }
    public function Lessons(){
        return $this->hasMany(Lesson::class);
    }
}
