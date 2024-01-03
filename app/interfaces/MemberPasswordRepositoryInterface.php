<?php

namespace App\interfaces;
use Illuminate\Http\Request;

use App\Http\Requests\MemberForgetPassword;


interface MemberPasswordRepositoryInterface{
    public function resetPassword(Request $request);
    public function forgotPassword(MemberForgetPassword $request);

}

