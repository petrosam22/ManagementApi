<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Http\Requests\MemberForgetPassword;
use App\interfaces\MemberRepositoryInterface;
use App\interfaces\MemberPasswordRepositoryInterface;

class MemberController extends Controller
{
    private MemberRepositoryInterface $MemberRepositories;
    private MemberPasswordRepositoryInterface $MemberPasswordRepositories;





    public function __construct(MemberRepositoryInterface $MemberRepositories,MemberPasswordRepositoryInterface $MemberPasswordRepositories){

        $this->MemberRepositories =$MemberRepositories;
        $this->MemberPasswordRepositories =$MemberPasswordRepositories;
    }

    public function register(MemberRequest $request){
     return  $this ->MemberRepositories->register($request);

    }
    public function login(Request $request){
     return  $this ->MemberRepositories->login($request);

    }
    public function sendVerifyCode(){
     return  $this ->MemberRepositories->sendVerifyCode();

    }
    public function verify(Request $request){
     return  $this ->MemberRepositories->verify($request);

    }
    public function update(MemberUpdateRequest $request ,$id){
     return  $this ->MemberRepositories->update($request,$id);

    }

    public function forgotPassword(MemberForgetPassword $request){
        return $this->MemberPasswordRepositories->forgotPassword($request);
    }
    public function resetPassword(Request $request){

        return $this->MemberPasswordRepositories->resetPassword($request);
    }

}
