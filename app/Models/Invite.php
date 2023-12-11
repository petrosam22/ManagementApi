<?php

namespace App\Models;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'email',
        'workspace_id',
        'role',
        'status',
    ];


    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
