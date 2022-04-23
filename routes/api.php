<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\FieldChoicesController;
use App\Http\Controllers\FieldOptionsController;;
use App\Http\Controllers\ProviderServices;
use App\Http\Controllers\ReservationFormsController;
use App\Http\Controllers\ReservationsController;
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
Route::get('/companies', [CompaniesController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    //routai kuriem reikia autho eina cia
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refreshtoken', [AuthController::class, 'refresh']);
});

Route::get('/users',[AuthController::class,'index']);

Route::get('/companies', [CompaniesController::class, 'index']);
Route::get('/companies/{id}', [CompaniesController::class, 'show']);
Route::post('/companies', [CompaniesController::class, 'store']);
Route::delete('/companies/{id}', [CompaniesController::class, 'destroy']);

Route::get('/field_choices', [FieldChoicesController::class, 'index']);
Route::get('/field_choices/{id}', [FieldChoicesController::class, 'show']);
Route::post('/field_choices', [FieldChoicesController::class, 'store']);
Route::delete('/field_choices/{id}', [FieldChoicesController::class, 'destroy']);

Route::get('/field_options', [FieldOptionsController::class, 'index']);
Route::get('/field_options/{id}', [FieldOptionsController::class, 'show']);
Route::post('/field_options', [FieldOptionsController::class, 'store']);
Route::delete('/field_options/{id}', [FieldOptionsController::class, 'destroy']);

Route::get('/form_fields', [FormFieldsController::class, 'index']);
Route::get('/form_fields/{id}', [FormFieldsController::class, 'show']);
Route::post('/form_fields', [FormFieldsController::class, 'store']);
Route::delete('/form_fields/{id}', [FormFieldsController::class, 'destroy']);

Route::get('/provider_services', [ProviderServices::class, 'index']);
Route::get('/provider_services/{id}', [ProviderServices::class, 'show']);
Route::post('/provider_services', [ProviderServices::class, 'store']);
Route::delete('/provider_services/{id}', [ProviderServices::class, 'destroy']);

Route::get('/reservations', [ReservationsController::class, 'index']);
Route::get('/reservations/{id}', [ReservationsController::class], 'show');
Route::post('/reservations', [ReservationsController::class, 'store']);
Route::delete('/reservations/{id}', [ReservationsController::class, 'destroy']);

Route::get('/reservation_forms', [ReservationFormsController::class, 'index']);
Route::get('/reservation_forms/{id}', [ReservationFormsController::class, 'show']);
Route::post('/reservation_forms', [ReservationFormsController::class, 'store']);
Route::delete('/reservation_forms/{id}', [ReservationFormsController::class, 'destroy']);

Route::get('/service_providers', [ServiceProviderController::class, 'index']);
Route::get('/service_providers/{id}', [ServiceProviderController::class, 'show']);
Route::post('/service_providers', [ServiceProviderController::class, 'store']);
Route::delete('/service_providers/{id}', [ServiceProviderController::class, 'destroy']);

Route::get('/work_schedules', [WorkScheduleController::class, 'index']);
Route::get('/work_schedules/{id}', [WorkScheduleController::class, 'show']);
Route::post('/work_schedules', [WorkScheduleController::class, 'store']);
Route::delete('/work_schedules/{id}', [WorkScheduleController::class, 'destroy']);
