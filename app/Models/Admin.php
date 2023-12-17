<?php

namespace App\Models;

use App\Models\Attend;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use NextApps\VerificationCode\Contracts\Verifiable;

class Admin extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $guard = "admin";

    protected $fillable = [
        'name',
        'photo',
        'email',
        'password',
        'status',
        'phone',
        'role',
        'city',
        'is_verify',
    ];
    protected $hidden = [
        'password',
 
     ];


    public function attend(){
        return $this->morphMany(Attend::class,'attendable');
    }
}
