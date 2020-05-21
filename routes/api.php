<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'AuthenticationController@login')->name('api-login');
Route::post('register', 'AuthenticationController@register');

Route::apiResource('especialidades', 'EspecialidadController')->middleware('auth:api');
Route::apiResource('doctor', 'DoctorController')->middleware('auth:api');
Route::apiResource('horarios','ScheduleController')->middleware('auth:api');
Route::apiResource('consultas', 'ConsultationsController')->middleware('auth:api');


/* 
******************************** FALTAN LAS RUTAS DE ELIMINAR
*/

Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|index consulting_room|show consulting_room']], function () {
        Route::post('consultorios', 'ConsultorioController@store')->middleware('permission:create consulting_room');
        Route::put('consultorios/{id}', 'ConsultorioController@update')->middleware('permission:edit consulting_room');
        Route::delete('consultorios/{id}', 'ConsultorioController@destroy')->middleware('permission:destroy consulting_room');
        Route::get('consultorios', 'ConsultorioController@index');
        Route::get('consultorios/{id}', 'ConsultorioController@show');
});

Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|index user|show user']], function () {
        Route::post('usuarios', 'UserController@store')->middleware('permission:create user');
        Route::put('usuarios/{id}', 'UserController@update')->middleware('permission:edit user');
        Route::get('usuarios', 'UserController@index');
        Route::get('usuarios/{id}', 'UserController@show');
});

Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|index cash_out|show cash_out']], function () {
        Route::post('cortes', 'CashOutController@store')->middleware('permission:create cash_out');
        Route::put('cortes/{id}', 'CashOutController@update')->middleware('permission:edit cash_out');
        Route::delete('cortes/{id}', 'CashOutController@destroy')->middleware('permission:destroy cash_out');
        Route::get('cortes', 'CashOutController@index');
        Route::get('cortes/{id}', 'CashOutController@show');
});

Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|index patient|show patient']], function () {
    Route::post('pacientes', 'PatientsController@store')->middleware('permission:create patient');
    Route::put('pacientes/{id}', 'PatientsController@update')->middleware('permission:edit patient');
    Route::delete('pacientes/{id}', 'PatientsController@destroy')->middleware('permission:destroy patient');
    Route::get('pacientes', 'PatientsController@index');
    Route::get('pacientes/{id}', 'PatientsController@show');
});
Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|index payment_method|show payment_method']], function () {
    Route::post('metodos-de-pago', 'PaymentMethodsController@store')->middleware('permission:create payment_method');
    Route::put('metodos-de-pago/{id}', 'PaymentMethodsController@update')->middleware('permission:edit payment_method');
    Route::delete('metodos-de-pago/{id}', 'PaymentMethodsController@destroy')->middleware('permission:destroy payment_method');
    Route::get('metodos-de-pago', 'PaymentMethodsController@index');
    Route::get('metodos-de-pago/{id}', 'PaymentMethodsController@show');
});
     