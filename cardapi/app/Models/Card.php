<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'id_collection'];

    public function collection(){

    	return $this->belongsTo('App\Collection');

    }
}
