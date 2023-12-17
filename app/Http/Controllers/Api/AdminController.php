<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\AdminForgetPassword;
use App\interfaces\AdminRepositoryInterface;
use App\interfaces\AdminPasswordRepositoryInterface;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Laravel\Passport\TokenRepository;
class AdminController extends Controller
{
    private AdminRepositoryInterface $adminRepository;
    private AdminPasswordRepositoryInterface $AdminPasswordRepositories;

    public function __construct(AdminRepositoryInterface $adminRepository
    ,AdminPasswordRepositoryInterface $AdminPasswordRepositories)
    {
        $this->adminRepository = $adminRepository;
        $this->AdminPasswordRepositories = $AdminPasswordRepositories;
    }

    public function register(AdminRequest $request)
    {
        $admin = $this->adminRepository->register($request);

        return $admin;
    }

    public function sendVerifyCode()
     {
         $verifyCode = $this->adminRepository->sendVerifyCode();

        return $verifyCode;
     }
    public function verify(Request $request)
     {
         $admin = $this->adminRepository->verify($request);

        return $admin;
     }
     public function login(Request $request)
    {
        $admin = $this->adminRepository->login($request);

        return $admin;
    }
     public function logout()
    {
        $admin = $this->adminRepository->logout();

        return $admin;
    }

    public function update(UpdateAdminRequest $request,$id){

        $admin = $this->adminRepository->update($request,$id);

        return $admin;


    }

    public function forgotPassword(AdminForgetPassword $request){
        $admin = $this->AdminPasswordRepositories->forgotPassword($request);

        return $admin;
    }
    public function resetPassword(Request $request,TokenRepository $tokenRepository){
        $admin = $this->AdminPasswordRepositories->resetPassword($request,$tokenRepository);

        return $admin;
    }

 }
