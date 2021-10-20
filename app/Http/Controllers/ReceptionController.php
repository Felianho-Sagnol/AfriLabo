<?php

namespace App\Http\Controllers;

use App\Models\demandes;
use App\Models\elements;
use Illuminate\Http\Request;


class ReceptionController extends Controller
{
    public function reception(){
        if(session()->has('receptor_id')){
            $log=true;
         }else{
            $log=FALSE;
 
         }
         // var_dump($log);
 
         if($log==FALSE){
             return view('loginForm',[
                 'NamePrepa' => 'reception_']);
         }else
            return view('reception.reception');
    }
    public function receptionON(){
        $elements = elements::all();
        return view('reception.reception',[
            'nbEchantillon' => 0,
            'nbDemande' => 0,
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
