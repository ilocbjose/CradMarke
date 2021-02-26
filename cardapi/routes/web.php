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
	$cards = Card::latest()->take(5)->get();
	$collections = Collection::latest()->take(4)->get();
	$sells = Sell::latest()->take(5)->get();
    return view('home')
    		->with('cards',$cards)
    		->with('collections',$collections)
    		->with('sells',$sells);
});

Route::get('indexCard',function(){

	$cards = DB::table('cards')->get();

	return view('index.index_card')
			->with('cards',$cards);
});

Route::get('indexSell',function(){

	$sells = DB::table('sells')->get();

	return view('index.index_sell')
			->with('sells',$sells);
});

Route::get('indexCollection',function(){

	$collections = DB::table('collections')->get();

	return view('index.index_collection')
			->with('collections',$collections);
});

Route::get('login',function(){
	return view('auth.login');
});

Route::get('search',function(){
	return view('search');
});

Route::get('createCard',function(){
	return view('create_card');
});

Route::get('register',function(){
	return view('auth.register');
});

Route::get('createCollection',function(){
	return view('create_collections');
});

Route::get('createSell',function(){
	return view('create_sells');
});

Route::view('forgot_password', 'auth.reset_password')->name('password.reset');