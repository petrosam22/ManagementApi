<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attend extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'attendable_id',
        'attendable_type',
        'day',
        'time',
        'end',
    ];

    public function attendable(){
        return $this->morphTo();
    }
}
