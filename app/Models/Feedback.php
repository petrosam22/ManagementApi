<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [ 'description','member_id','task_id'];


    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function Task(){
        return $this->belongsTo(Task::class);
    }
}
