<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'day',
        'date',
        'owner_id',
        'time',
        'location',
        'guest',
        'duration',
        'note',
    ];


    public function owner()
    {
        return $this->belongsTo(Member::class, 'owner_id');
    }


public function members()
    {
        return $this->belongsToMany(Member::class, 'event_member', 'event_id', 'member_id')
            ->withTimestamps();
    }



}
