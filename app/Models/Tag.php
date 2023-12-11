<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','owner_id'];


    public function tagable(){
        return $this->morphTo();
    }

    public function owner(){
        return $this->belongsTo(Member::class,'owner_id');
    }
}
