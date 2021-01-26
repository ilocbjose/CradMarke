<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Cards;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = ['id_card','amount', 'price'];

    public function cards(){

    	return $this->hasMany('App\Cards');

    }
}
