<?php

namespace App\Models;

use App\Models\Invite;
use App\Models\Member;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workspace extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'owner_id',
    ];


    public function owner()
    {
        return $this->belongsTo(Member::class, 'owner_id');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_workspace', 'workspace_id', 'member_id')
            ->withTimestamps();
    }

    public function invites(){
        return $this->hasMany(Invite::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
