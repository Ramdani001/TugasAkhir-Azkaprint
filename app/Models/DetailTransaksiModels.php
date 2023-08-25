<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModels extends Model
{
    use HasFactory;

    protected $table = 'DetailCart';


    public function getTransaksi(){
        return $this->hasOne(User::class, 'idTransaksi', 'idTransaksi');
    }

    public function getProduk(){
        return $this->hasOne(Produk::class, 'id', 'idProduk');
    }

}
