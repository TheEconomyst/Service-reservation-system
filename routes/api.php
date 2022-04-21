<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProviderController;

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

Route::group(['middleware'=>['auth:sanctum']], function(){
    //routai kuriem reikia autho eina cia
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/refreshtoken', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('/service_providers', [ServiceProviderController::class, 'create']);
    Route::delete('/service_providers/{id}', [ServiceProviderController::class, 'destroy']);
});

Route::get('/service_providers', [ServiceProviderController::class, 'index']);
Route::get('/service_providers/{id}', [ServiceProviderController::class, 'show']);
