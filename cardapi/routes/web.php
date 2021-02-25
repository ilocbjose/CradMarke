<?php

use Illuminate\Support\Facades\Route;
use App\Models\Card;
use App\Models\Collection;
use App\Models\Sell;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$cards = DB::table('cards')->get();
	$collections = DB::table('collections')->get();
	$sells = DB::table('sells')->get();
    return view('home')
    		->with('cards',$cards)
    		->with('collections',$collections)
    		->with('sells',$sells);
});

Route::get('login',function(){
	return view('auth.login');
});

Route::get('createCard',function(){
	return view('create_card');
});

Route::get('register',function(){
	return view('auth.register');
});

Route::view('forgot_password', 'auth.reset_password')->name('password.reset');