<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function reception(){
        return view('reception.reception');
    }

    public function modification(){


        return view('reception.modification');
    }
    public function showDemande($id){
        $infoDemande=Demande::FindOrFail($id);
        die($infoDemande);
        dd($infoDemande);
        return view(home);
    }
}
