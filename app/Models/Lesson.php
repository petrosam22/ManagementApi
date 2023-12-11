<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'date',
        'status',
        'time',
        'course_id',
        'status_id'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
