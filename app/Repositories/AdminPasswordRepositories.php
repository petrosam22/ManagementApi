<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Jobs\SendResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use App\Http\Requests\AdminForgetPassword;
use App\interfaces\AdminPasswordRepositoryInterface;




class  AdminPasswordRepositories implements AdminPasswordRepositoryInterface {
    public function forgotPassword(AdminForgetPassword $request)
    {
        $admin = Admin::where('email',$request->email)->first();

        if(!$admin){
            return response()->json([
                'message'=> 'Email Not Found'
            ],200);
        }

        $admin->tokens()->delete();

       $token =  $admin->createToken('admin-token')->accessToken;

        dispatch(new SendResetToken($admin,$token));
        return response()->json([
            'message'=> 'Your Reset Token Send In Your Email'
        ],200);

    }
    public function resetPassword(Request $request, TokenRepository $tokenRepository){

        $admin = Admin::where('email',$request->email)->first();
        $token = DB::table('oauth_access_tokens')
        ->where('id',$request->token)->get();
        // ->where('id ',$request->token)->first();

        if(!$admin){
            return response()->json([
                'message'=> 'Email Not Found'
            ],200);
        }
        if(!$token){
         return response()->json([
                'message'=> 'Token Not Found'
            ],200);

        }


        $admin->password = Hash::make($request->password);
        $admin->save();


        
            return response()->json([
                'message'=> 'Password Changed Successfully'

            ],200);



    }
}
