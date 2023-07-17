<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Table Barang
    protected $table = 'Barang';
    protected $primarykey = 'id';

    protected $guard = [];

}
