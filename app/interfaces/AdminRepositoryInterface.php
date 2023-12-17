<?php
namespace App\interfaces;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


interface AdminRepositoryInterface {

    public function register(AdminRequest $request);
    public function sendVerifyCode();
    public function verify(Request $request);
    public function login(Request $request);

    public function logout();
    public function update(UpdateAdminRequest $request,$id);

}














?>
