<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FieldChoiceController;
use App\Http\Controllers\FieldOptionController;
use App\Http\Controllers\FormFieldController;
use App\Http\Controllers\ProviderServices;
use App\Http\Controllers\ReservationFormController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\WorkScheduleController;

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
Route::get('/companies', [CompanyController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    //routai kuriem reikia autho eina cia
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refreshtoken', [AuthController::class, 'refresh']);
});

Route::get('/users',[AuthController::class,'index']);

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);

Route::get('/field_choices', [FieldChoiceController::class, 'index']);
Route::get('/field_choices/{id}', [FieldChoiceController::class, 'show']);
Route::post('/field_choices', [FieldChoiceController::class, 'store']);
Route::delete('/field_choices/{id}', [FieldChoiceController::class, 'destroy']);

Route::get('/field_options', [FieldOptionController::class, 'index']);
Route::get('/field_options/{id}', [FieldOptionController::class, 'show']);
Route::post('/field_options', [FieldOptionController::class, 'store']);
Route::delete('/field_options/{id}', [FieldOptionController::class, 'destroy']);

Route::get('/form_fields', [FormFieldController::class, 'index']);
Route::get('/form_fields/{id}', [FormFieldController::class, 'show']);
Route::post('/form_fields', [FormFieldController::class, 'store']);
Route::delete('/form_fields/{id}', [FormFieldController::class, 'destroy']);

Route::get('/provider_services', [ProviderServices::class, 'index']);
Route::get('/provider_services/{id}', [ProviderServices::class, 'show']);
Route::post('/provider_services', [ProviderServices::class, 'store']);
Route::delete('/provider_services/{id}', [ProviderServices::class, 'destroy']);

Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservations/{id}', [ReservationController::class], 'show');
Route::post('/reservations', [ReservationController::class, 'store']);
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);

Route::get('/reservation_forms', [ReservationFormController::class, 'index']);
Route::get('/reservation_forms/{id}', [ReservationFormController::class, 'show']);
Route::post('/reservation_forms', [ReservationFormController::class, 'store']);
Route::delete('/reservation_forms/{id}', [ReservationFormController::class, 'destroy']);

Route::get('/service_providers', [ServiceProviderController::class, 'index']);
Route::get('/service_providers/{id}', [ServiceProviderController::class, 'show']);
Route::post('/service_providers', [ServiceProviderController::class, 'store']);
Route::delete('/service_providers/{id}', [ServiceProviderController::class, 'destroy']);

Route::get('/work_schedules', [WorkScheduleController::class, 'index']);
Route::get('/work_schedules/{id}', [WorkScheduleController::class, 'show']);
Route::post('/work_schedules', [WorkScheduleController::class, 'store']);
Route::delete('/work_schedules/{id}', [WorkScheduleController::class, 'destroy']);
