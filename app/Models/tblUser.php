<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblUser extends Model
{
    use HasFactory;

    protected $table = 'Users'; 
    
    protected  $primaryKey = 'id';

    // protected $guard = [];

    protected $fillable = [
        'idUser', 'namaUser', 'username', 'password' ,'status', 'email', 'profile'
    ];

}
