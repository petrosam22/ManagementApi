<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Member;
use App\Mail\VerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Traits\ValidatesImageTrait;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAdminRequest;
use App\interfaces\AdminRepositoryInterface;
use NextApps\VerificationCode\VerificationCode;

class AdminRepositories implements AdminRepositoryInterface {
use ValidatesImageTrait;

    public function register(AdminRequest $request){
        $image = $this->validateImage($request->photo , 'image/admin');
        $admin = Admin::create([
            'name' => $request->name,
            'photo' => $image,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'phone' => $request->phone,
            'role' => $request->role,
            'city' => $request->city,
        ]);

        $token = $admin->createToken('Admin-Token')->accessToken;



        return response()->json([
            'data'=>$admin,
            'token'=>$token,

        ],200);
    }



    public function sendVerifyCode()
{
        $admin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $verifyCode = DB::table('verification_codes')
        ->where('verifiable',$admin->email);


        if(!$admin){
        return response()->json([
            'message'=> 'Pleas Login First'
        ],200);
        }


        if($verifyCode->first()){
            $verifyCode->delete();
            $admin->is_verify = false;
            $admin->save();
            VerificationCode::send($admin->email);
        }
            VerificationCode::send($admin->email);




        return response()->json([
            'message'=> 'Your Verify Code Send To Your Email'
        ],200);
    }

    public function verify(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $code = $request->input('code');

        if ($admin instanceof Admin && VerificationCode::verify($code, $admin->email,false)) {
            $admin->is_verify = true;
            $admin->save();
            return response()->json(['message' => 'Verification successful'], 200);
        } else {
             return response()->json(['message' => 'Invalid verification code'], 400);
        }
    }

    public function login(Request $request){



        $admin = Admin::where('email',$request->email)->first();


        if($admin){
            if(Hash::check($request->password,$admin->password)){
                  $token = $admin->createToken('Admin-Token')->accessToken;
                     return response()->json([
                        'token' => $token,
                    ], 200);
            }else {
                    return response()->json(['message' => 'Email or Password is incorrect'], 401);
                }


        }else{
            return response()->json(['message' => 'Email Not Found'], 401);


        }



    }


    public function logout(){
        $user= Admin::where('id',Auth::guard('admin')->user()->id)->first();

        // dd($user);

        return[
             'user'=> $user->tokens()->delete(),
             'message'=> "logout successfully"
           ];



    }

    public function update(UpdateAdminRequest $request ,$id){
        $admin = Admin::findOrFail($id);
        if ($request->hasFile('photo')) {
            $image = $this->validateImage($request->file('photo'), 'image/admin');
            $admin->photo = $image;
             }
             $admin->update($request->only([
                'name',
                'Status',
                'phone',
                'city',
            ]));


        $admin->save();
        return response()->json([
            'data'=>$admin,
            'message'=> 'Your Information Updated Successfully'
        ],200) ;


    }


}
