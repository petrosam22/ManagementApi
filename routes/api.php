<?php

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('admin')->group(function(){

Route::post('/register',[AdminController::class,'register']);

Route::post('/login',[AdminController::class,'login']);

Route::post('/logout',[AdminController::class,'logout'])
->middleware('auth:admin');

Route::post('/sendVerifyCode',[AdminController::class,'sendVerifyCode'])
->middleware('auth:admin');

Route::post('/verify',[AdminController::class,'verify'])
->middleware('auth:admin');

Route::post('/update/{id}',[AdminController::class,'update'])
->middleware('auth:admin');

Route::post('/forget/password',[AdminController::class,'forgotPassword']);
Route::post('/reset/password',[AdminController::class,'resetPassword']);

});



Route::get('/user',function(){
    $admin = Auth::guard('admin')->user();
    dd($admin);
})->middleware('auth:admin');





Route::get('/mail',function(){
     $welcomeMessage = 'Your verify cod is 2222!';
     $user = 'petrosam26@gmail.com';

    Mail::to($user)->send(new WelcomeMail($welcomeMessage));

    return "Email sent successfully!";

});
