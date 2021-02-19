<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file_path', 'date'];

    public function cards(){

    	return $this->hasMany('App\Cards');

    }
}
