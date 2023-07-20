<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModels extends Model
{
    use HasFactory;

    protected $table = 'Cart'; 
      
    // protected  $primaryKey = 'id';

    protected $guarded = [];

    public function getProduk(){
        return $this->hasOne(Produk::class, 'id', 'idProduk');
    }

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'idUser');
    }

    // protected $fillable = [
    //     'idUser', 'namaUser', 'username', 'password' ,'status', 'email', 'profile'
    // ];

}
 