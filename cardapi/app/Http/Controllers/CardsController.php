<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cards;
use App\Models\Collection;
use App\Models\Sell;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    //cards controller funcionalidad

    public function index(){

    	$cards = DB::table('cards')->get();
    	return $cards;

    }

    public function store(Request $request){

        $msg = null;

            $cards = new Cards;

            $cards->name = $request->name;

            $cards->description = $request->description;

            $cards->id_collection = $request->id_collection;

            $cards->save();

             $this->msg = 'Carta registrada';



        return $this->msg;
    }

    public function indexCollection(){

        $collections = DB::table('collections')->get();
        return $collections;

    }

    public function storeCollection(Request $request){

        $msg = null;


            $collection = new Collection;

            $collection->name = $request->name;

            $collection->photo = $request->photo;

            $collection->date = $request->date;

            $collection->save();

            $this->msg = 'Colección guardada';
        

        return $this->msg;
    }

    public function indexSells(){

        $sells = DB::table('sells')->get();
        return $sells;

    }

    public function storeSells(Request $request){

        $msg = null;

        $sells = new Sell;

        $sells->id_card = $request->id_card;

        $sells->amount = $request->amount;

        $sells->price = $request->price;

        $sells->save();

        $this->msg = 'Venta guardada';

        return $this->msg;

    }
}
