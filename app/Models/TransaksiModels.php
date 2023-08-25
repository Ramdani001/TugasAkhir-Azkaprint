<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModels extends Model
{ 
    use HasFactory;
 

    protected $table = 'Transaksi';  
      
    protected  $primaryKey = 'id'; 
 
    protected $guarded = [];

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'idUser');
    }

    public function getDetail(){
        return $this->hasOne(DetailTransaksiModels::class, 'idTransaksi', 'idTransaksi');
    }

}
 