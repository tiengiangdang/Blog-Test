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
 

Route::group(['prefix' => 'auth'], function ()
{	

	Route::post('login', 'AuthController@login');
	Route::post('signup', 'AuthController@signup');

	Route::group(['middleware' => 'auth:api'], function (){
		Route::get('logout', 'AuthController@logout');
		Route::get('user', 'AuthController@user');
	});
});


Route::group(['prefix' => 'post', 'middleware' => 'auth:api'], function () {
	Route::get('list', 'PostController@listPost' );
	Route::post('add', 'PostController@addPost');
    Route::get('delete/{id}', 'PostController@deletePost');
	Route::post('edit/{id}', 'PostController@editPost');
	Route::get('detail/{id}', 'PostController@detailPost');

});
Route::get('list', 'PostController@listPost' );