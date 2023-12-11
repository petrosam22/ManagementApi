<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Member;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'started',
        'ended',
        'duration',
        'lessons',
        'photo',
        'remainder',
        'finish',
        'member_id',
        'status_id'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
