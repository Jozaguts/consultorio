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
Route::apiResource('especialidad', 'EspecialidadController')->middleware('auth:api');



Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|edit consulting_room|create consulting_room']], function () {
        Route::post('consultorios', 'ConsultorioController@store');
        Route::put('consultorios/{id}', 'ConsultorioController@update');
});

Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|edit user|create user']], function () {
        Route::post('usuarios', 'UserController@store');
        Route::put('usuarios/{id}', 'UserController@update');
});

Route::group(['middleware' => ['auth:api', 'role_or_permission:Admin|edit cash_out|create cash_out']], function () {
        Route::post('cortes', 'CashOutController@store');
});
