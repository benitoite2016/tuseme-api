<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route:: post('/report','ReportController@report');
Route::get('/report','ReportController@index');
Route::post('/announcement','AnnouncementController@store');
Route::get('/announcement', 'AnnouncementController@index');
Route::get('/petition','PetitionController@index');
Route::post('/petition','PetitionController@store');
Route::get('/users','UserController@index');
Route::post('/users','UserController@store');