<?php

namespace App\Repositories;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Jobs\MemberResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MemberForgetPassword;
use App\interfaces\MemberPasswordRepositoryInterface;



class MemberPasswordRepositories implements MemberPasswordRepositoryInterface{
    public function forgotPassword(MemberForgetPassword $request){
        $member = Member::where('email',$request->email)->first();
        if (!$member){
            return response()->json([
                'message'=> 'Email Not Found'
            ],401);
        }

        $member->tokens()->delete();

        $token = $member->createToken('member-token')->accessToken;

        dispatch(new MemberResetToken($member,$token));
        return response()->json([
            'message'=> 'Your Reset Token Send In Your Email'
        ],200);




    }
    public function resetPassword(Request $request){
        $member = Member::where('email',$request->email)->first();
        $token = DB::table('oauth_access_tokens')
        ->where('id',$request->token)->get();

        if(!$member){
            return response()->json([
                'message'=> 'Email Not Found'
            ],200);
        }
        if(!$token){
         return response()->json([
                'message'=> 'Token Not Found'
            ],200);

        }


        $member->password = Hash::make($request->password);
        $member->save();



            return response()->json([
                'message'=> 'Password Changed Successfully'

            ],200);
    }
}
