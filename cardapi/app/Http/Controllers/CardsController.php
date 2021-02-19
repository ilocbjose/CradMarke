<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use JWTAuth;
use App\Models\User;
use App\Models\Collection;
use App\Models\Sell;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CardsController extends Controller
{
    //cards controller funcionalidad

    public function index(){

    	$cards = DB::table('cards')->get();
    	return $cards;

    }

    public function search($id){

        $respuesta = null;

        if($id){

            $card = Card::where('name',$id)->get()->toArray();

            if($card){

                $this->respuesta = $card;

                Log::info('Codigo 200, peticion aceptada');
                Log::debug($id);

            }else{

                $this->respuesta = "No existe ninguna carta asociado a los datos proporcionados";
                Log::info('No existe dicha carta');
                Log::debug($id);

            }

        } else {

            $this->respuesta = "Datos introducidos no validos";
            Log::info('Datos introducidos erroneos');
            Log::debug($id);

        }
        
        return $this->respuesta;

    }

    public function store(Request $request){

        $response = "";

        $data = $request->getContent();

        $data = json_decode($data);

        if($data){

            $user = JWTAuth::parseToken()->authenticate();

            $role = $user->role;

            if(!($role == "seller")){

                $this->msg = 'Acceso denegado para clientes, unico para vendedores';
                Log::info('Acceso denegado para clientes');
                Log::debug($user);

            }else {

                $msg = null;

                $cards = new Card;

                $collections = Collection::where('id',$data->id_collection)->first();

                if($collections){

                    $cards->name = $data->name;
                    $cards->description = $data->description;
                    $cards->id_collection = $data->id_collection;

                    $cards->save();

                    $this->msg = 'Carta registrada';
                    Log::info('Carta registrada, 201 Created');
                    Log::debug($cards);

                }else{

                    $this->msg = 'No existe esa coleccion';
                    Log::info('404 No existe dicha coleccion');
                    Log::debug($data->id_collection);

                }
            }

        } else {

            $this->msg = 'Datos incorrectos';
            Log::info('500 Datos incorrectos');
            Log::debug($cards);

        }

        return $this->msg;
    }

    public function indexCollection(){

        $collections = DB::table('collections')->get();
        return $collections;

    }

    public function storeCollection(Request $request){

        $msg = "";

        $data = $request->getContent();

        $data = json_decode($data);

        $user = JWTAuth::parseToken()->authenticate();

        $role = $user->role;

        if($data){

            if(!($role == "seller")){

                $this->msg = "Acceso denegado para clientes, unico para vendedores";

            }else{
                $collection = new Collection;

                $collection->name = $data->name;

                if($data->date && strtotime($data->date) != NULL){
                    $collection->date = $data->date;
                }else{
                    $this->msg = " Incorrect Date Format | ";
                }

                if(strpos($data->file_path,'http') === 0){

                    $collection->file_path = $data->file_path;

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

        $data = $request->getContent();

        $user = JWTAuth::parseToken()->authenticate();

        $data = json_decode($data);

        if($data){

            if($user->role == "seller"){

                $sells = new Sell;

                $id_user = $user->id;

                if($id_user){

                    $sells->amount = $data->amount;

                    $sells->price = $data->price;

                    $sells->id_user = $id_user;

                    $card_id = Card::where('id',$data->id_card)->first();

                    if($card_id){

                        $sells->id_card = $data->id_card;

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
