<?php

namespace App\Repositories;
use App\Models\Member;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ValidatesImageTrait;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MemberUpdateRequest;
use App\interfaces\MemberRepositoryInterface;
use NextApps\VerificationCode\VerificationCode;

class MemberRepositories implements MemberRepositoryInterface {

    use ValidatesImageTrait;

    public function register(MemberRequest $request){

        $image = $this->validateImage($request->photo,'image/member');
        $member  = Member::create([
            'name'=> $request->name,
            'photo'=>$image,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'position'=>$request->position,
            'status'=>$request->status,
            'company'=>$request->company,
            'phone'=>$request->phone,
            'contract'=>$request->contract,
            'role'=>$request->role,
            'city'=>$request->city,

        ]);

        $token = $member->createToken('Member-api')->accessToken;


        return response()->json([
            'member'=>$member,
            'token'=>$token,
        ]);
    }

    public function login(Request $request){

        $member = Member::where('email',$request->email)->first();


        if($member){
            if(Hash::check($request->password,$member->password)){
                $token = $member->createToken('Member-api')->accessToken;
                return response()->json(['token' => $token],200);

            }else{
                return response()->json(['message' => 'Email or Password is incorrect'], 401);

            }
        }else{
            return response()->json(['message' => 'Email Not Found'], 401);

        }
    }



    public function sendVerifyCode(){
        $member = Member::where('id',Auth::guard('member')->user()->id)->first();
        $verifyCode = DB::table('verification_codes')
        ->where('verifiable',$member->email);

        if(!$member){
            return response()->json([
              'message'=>"This account does not exist"
            ],403);
        }

        if($verifyCode->first()){
            $verifyCode->delete();
            $member->is_verify = false;
            $member->save();
             VerificationCode::send($member->email);
        }
            VerificationCode::send($member->email);




        return response()->json([
            'message'=> 'Your Verify Code Send To Your Email'
        ],200);


    }

    public function verify(Request $request){

        $member = Auth::guard('member')->user();

        $code = $request->input('code');

        if ($member instanceof Member && VerificationCode::verify($code, $member->email,false)) {
            $member->is_verify = true;
            $member->save();
            return response()->json(['message' => 'Verification successful'], 200);
        } else {
             return response()->json(['message' => 'Invalid verification code'], 400);
        }
    }
    public function update(MemberUpdateRequest $request ,$id){
        $member   = Member::findOrFail($id);
        if($request->hasFile('photo')){
            $image = $this->validateImage($request->photo,'member');
            $member->photo = $image;
        }
        $member->update($request->only([
            'name',
            'status',
            'phone',
            'city',
            'company',
            'phone',
            'contract',
        ]));


    $member->save();
    return response()->json([
        'data'=>$member,
        'message'=> 'Your Information Updated Successfully'
    ],200) ;





    }
}
