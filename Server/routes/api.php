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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

///// api test
Route::get('/User', 'Api\BlogController@index');
Route::get('User/{id}', 'BlogController@index');
Route::post('User', 'BlogController@store');
Route::put('User/{id}', 'BlogController@update');
Route::delete('User/{id}', 'BlogController@delete');
