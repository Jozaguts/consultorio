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

Route::apiResource('consultorio', 'ConsultorioController')->middleware('auth:api');
Route::apiResource('especialidad', 'EspecialidadController')->middleware('auth:api');
// Route::middleware(['auth:api'])->group(function () {

//     Route::post('consultorio/store', 'ProductController@store')->name('consultorio.store')
//         ->middleware('permission:consultorio.create');
//     Route::get('consultorio', 'ProductController@index')->name('consultorio.index')
//         ->middleware('permission:consultorio.index');
//     Route::get('consultorio/create', 'ProductController@create')->name('consultorio.create')
//         ->middleware('permission:consultorio.create');
//     Route::put('consultorio/{role}', 'ProductController@update')->name('consultorio.update')
//         ->middleware('permission:consultorio.edit');
//     Route::get('consultorio/{role}', 'ProductController@show')->name('consultorio.show')
//         ->middleware('permission:consultorio.show');
//     Route::delete('consultorio/{role}', 'ProductController@destroy')->name('consultorio.destroy')
//         ->middleware('permission:consultorio.destroy');
//     Route::get('consultorio/{role}/edit', 'ProductController@edit')->name('consultorio.edit')
//         ->middleware('permission:consultorio.edit');
// });