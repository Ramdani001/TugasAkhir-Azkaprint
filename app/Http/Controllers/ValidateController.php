<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    public function loginIndex(){
        
        return view('validate.main');
    }
}
