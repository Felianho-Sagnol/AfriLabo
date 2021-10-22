<?php

namespace App\Http\Controllers;

use App\Models\demandes;
use App\Models\elements;
use Illuminate\Http\Request;


class ReceptionController extends Controller
{
    public function reception(){
        if(session()->has('employe_id')){
            $log=true;
         }else{
            $log=FALSE;
         }
 
         if($log==FALSE){
             return view('loginForm',[
                 'NamePrepa' => 'reception_']);
         }else
            $nbDemande = demandes::all()->count();
           $elements = elements::all();
           return view('reception.reception',[
            'nbEchantillon' => 0,
            'nbDemande' => $nbDemande,
            'elements' =>$elements
        ]);
    }
 
    public function modification(){


        return view('reception.modification');
    }
    public function showDemande($id){
        $infoDemande=demandes::FindOrFail($id);
        die($infoDemande);
        dd($infoDemande);
        return view(home);
    }

    public function echatillon(){

        $elements = elements::all();
        return view('reception.echantillons',[
            'nbEchantillon' => 0,
            'nbDemande' => 0,
            'elements' =>$elements
        ]);
    }
}
