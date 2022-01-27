<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication routes
Route::post('/register',[AuthController::class,'register'])->name('api.register');
Route::post('/login',[AuthController::class,'login'])->name('api.login');
Route::post('/logout',[AuthController::class,'logout'])->name('api.logout');


Route::group(['middleware'=> 'auth:sanctum'],function(){
    Route::get('user',[UsersController::class,'user']);
    Route::put('users/info', [UsersController::class,'updateInfo']);

    Route::get('/sendemail',[EmailController::class,'index'])->middleware('is_admin');
});




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
