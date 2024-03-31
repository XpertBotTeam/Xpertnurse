<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PatientController;
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

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);



Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::resource('patients',PatientController::class);
});

