<?php
namespace App\interfaces;

use Illuminate\Http\Request;

use Laravel\Passport\TokenRepository;
use App\Http\Requests\AdminForgetPassword;


interface AdminPasswordRepositoryInterface {

    public function forgotPassword(AdminForgetPassword $request);
    public function resetPassword(Request $request, TokenRepository $tokenRepository);


}














?>
