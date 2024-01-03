<?php
namespace App\interfaces;
use Illuminate\Http\Request;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberUpdateRequest;


interface MemberRepositoryInterface {

    public function register(MemberRequest $request);
    public function login(Request $request);
    public function sendVerifyCode();

    public function verify(Request $request);
    // public function logout();
    public function update(MemberUpdateRequest $request,$id);
}














?>
