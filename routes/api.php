<?php

use App\Http\Controllers\AuthControlle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
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

Route::get('/users', [UserController::class, 'index']);        
Route::get('/users/{id}', [UserController::class, 'show']);      
Route::post('/users', [UserController::class, 'store']);         
Route::put('/users/{id}', [UserController::class, 'update']);   
Route::delete('/users/{id}', [UserController::class, 'destroy']); 


Route::post('login',[AuthControlle::class,'login']);
Route::post('register',[AuthControlle::class,'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthControlle::class, 'logout']);
    Route::post('refresh', [AuthControlle::class, 'refresh']);
    Route::get('me', [AuthControlle::class, 'me']);
});

Route::post('/Player_register', [PlayerController::class, 'register']); 
Route::post('/Player_login', [PlayerController::class, 'login']); 

Route::middleware('auth:sanctum')->group(function () 
{
    Route::post('/Player_logout', [PlayerController::class, 'logout']);
    Route::get('/Player_user', function (Request $request) {
        return $request->user();
    });
});