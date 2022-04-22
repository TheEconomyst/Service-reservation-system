<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceController;

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
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services', [ServiceController::class,'store']);
Route::get('/services/{id}',[ServiceController::class,'show']);
Route::put("/services", [ServiceController::class, 'update']);
Route::delete('/services/{id}', [ServiceController::class,'destroy']);
Route::get('/companies', [\App\Http\Controllers\CompaniesController::class, 'index']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    //routai kuriem reikia autho eina cia
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/refreshtoken', [\App\Http\Controllers\AuthController::class, 'refresh']);
});

Route::get('/users',[\App\Http\Controllers\AuthController::class,'index']);
Route::get('/service_providers', [ServiceProviderController::class, 'index']);
Route::get('/service_providers/{id}', [ServiceProviderController::class, 'show']);
Route::post('/service_providers', [ServiceProviderController::class, 'create']);
Route::delete('/service_providers/{id}', [ServiceProviderController::class, 'destroy']);
