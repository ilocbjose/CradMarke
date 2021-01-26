<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cards;

class CardsController extends Controller
{
    //cards controller funcionalidad

    public function index(){

    	$cards = DB::table('cards')->get()->orderBy('id','DESC')->paginate(3);
    	return $this->cards;

    }

    public function store(Request $request){

    	$cards = new Cards;

    	$cards->name = $request->name;

    	$cards->description = $request->description;

    	$cards->save();
    }
}
