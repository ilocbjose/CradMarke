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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::post('password/email', 'App\Http\Controllers\UserController@forgot');
Route::post('password/reset', 'App\Http\Controllers\UserController@reset');

Route::get('indexCollection','App\Http\Controllers\CardsController@indexCollection');
Route::get('indexSells','App\Http\Controllers\CardsController@indexSells');

Route::get('searchCards/{id}','App\Http\Controllers\CardsController@search');

Route::group(['middleware' => ['jwt.verify']], function() {
	
    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('logout','App\Http\Controllers\UserController@logout');

    Route::post('sells','App\Http\Controllers\CardsController@storeSells');
	Route::post('cards','App\Http\Controllers\CardsController@store');
	Route::post('collection','App\Http\Controllers\CardsController@storeCollection');

});

	
