<?php

namespace App\Models;

use App\Models\Attend;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'name',
        'photo',
        'email',
        'password',
        'Status',
        'phone',
        'role',
        'city',
    ];
    protected $hidden = [
        'password',
     ];


    public function attend(){
        return $this->morphMany(Attend::class,'attendable');
    }
}
