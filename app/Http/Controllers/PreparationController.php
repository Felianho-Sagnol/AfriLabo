<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreparationController extends Controller
{
    public function showPage($name){
        if(session()->has('receptor_id')){
           $log=true;
        }else{
           $log=FALSE;

        }
        // var_dump($log);

        if($log==FALSE){
            return view('loginForm',[
                'NamePrepa' => $name]);
        }
        elseif ($name=='PM') {
            return view('preparation.homePM',[
                'titre' => 'La Salle de Preparation',
                'inf' => 'mdd X'
            ]);
        }
        elseif ($name=='PC') {
            return view('preparation.homePA',[
                'titre' => 'Preparation ',
                'inf' => 'mdd X'
            ]);
        }

    }
    public function showPagePM(){
        return view('preparation.homePM',[
            'titre' => 'Preparation Mecanique',
            'nbEchantillon' => 20,
            'inf' => 'mdd X']
        );
    }

}
