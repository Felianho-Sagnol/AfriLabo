<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function reception(){
        return view('reception.reception');
    }
}
