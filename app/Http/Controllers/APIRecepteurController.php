<?php

namespace App\Http\Controllers;

use App\Models\Recepteur;
use Illuminate\Http\Request;

class APIRecepteurController extends Controller
{
    public function addRecepteur(Request $request){
        $recepteur1 = new Recepteur();
        return response()->json([
            'success' => true,
        ]);
    }
}
