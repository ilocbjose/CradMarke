<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use JWTAuth;
use App\Models\User;
use App\Models\Collection;
use App\Models\Sell;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CardsController extends Controller
{
    //cards controller funcionalidad

    public function search(Request $request){

        $respuesta = null;

        if($request){

            $card = Card::where('name',$request->id)->get();

            if($card){

                return view('response.search_response')->with('cards',$card);

                Log::info('Codigo 200, peticion aceptada');
                Log::debug($request->id);

            }else{

                $this->respuesta = "No existe ninguna carta asociado a los datos proporcionados";
                Log::info('No existe dicha carta');
                Log::debug($request->id);

            }

        } else {

            $this->respuesta = "Datos introducidos no validos";
            Log::info('Datos introducidos erroneos');
            Log::debug($request->id);

        }
        
        return $this->respuesta;

    }

    public function store(Request $request){

        $response = "";

        $user = $request->cookie('token');

        $user = JWTAuth::parseToken()->authenticate();

        $collection_find = $request->input('id_collection'); 

        $role = $user->role;

        if(!($role == "seller")){

            $this->msg = 'Acceso denegado para clientes, unico para vendedores';
            Log::info('Acceso denegado para clientes');
            Log::debug($user);

        }else {

            $msg = null;

            $cards = new Card;

            $collections = Collection::where('id',$collection_find)->first();

            if($collections){

                $cards->name = $request->input('name');
                $cards->description = $request->input('description');
                $cards->id_collection = $request->input('id_collection');

                $cards->save();

                $this->msg = 'Carta registrada';
                Log::info('Carta registrada, 201 Created');
                Log::debug($cards);

            }else{

                $this->msg = 'No existe esa coleccion';
                Log::info('404 No existe dicha coleccion');
                Log::debug($request->input('description'));

            }
        }

        

        return $this->msg;
    }

    public function storeCollection(Request $request){

        $msg = "";

        $user = $request->cookie('token');

        $user = JWTAuth::parseToken()->authenticate();

        $role = $user->role;

        if($request){

            if(!($role == "seller")){

                $this->msg = "Acceso denegado para clientes, unico para vendedores";

            }else{
                $collection = new Collection;

                $collection->name = $request->name;
                $collection->date = $request->date;
            

                if(strpos($request->file_path,'http') === 0){

                    $collection->file_path = $request->file_path;

                    $collection->save();

                    $this->msg = "Collection created!";


                } else {

                    $this->msg = "Photo have to be an URL";

                }  
            }

        } else {

            $this->msg = "Datos incorrectos!";

        }
        
        return $this->msg;
    }

    public function indexSells(){

        $sells = DB::table('sells')->get();
        return $sells;

    }

    public function storeSells(Request $request){

        $msg = "";

        $user = $request->cookie('token');

        $user = JWTAuth::parseToken()->authenticate();

        if($request){

            if($user->role == "seller"){

                $sells = new Sell;

                $id_user = $user->id;

                if($id_user){

                    $sells->amount = $request->amount;

                    $sells->price = $request->price;

                    $sells->id_user = $id_user;

                    $card_id = Card::where('id',$request->id_card)->first();

                    if($card_id){

                        $sells->id_card = $request->id_card;

                        $sells->save();

                        $this->msg = 'Venta guardada!';

                    } else  {

                        $this->msg = 'No existe la carta que pretendes vender.';

                    }

                } else {

                    $this->msg = 'El usuario no corresponde con un id.';

                }

            } else {

                $this->msg = 'Venta exclusiva para vendedores';

            }
        }
        return $this->msg;

    }
}
