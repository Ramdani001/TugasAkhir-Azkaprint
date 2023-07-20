<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "Produk"; 
    protected  $primaryKey = 'id'; 

    protected $guard = [];


    public function produk(){
    	return $this->hasMany('App\Models\CartModels');
    }

}
