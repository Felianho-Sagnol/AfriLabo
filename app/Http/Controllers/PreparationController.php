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
                'inf' => 'les information'
            ]);
        }
        elseif ($name=='PC') {
            return view('preparation.homePC',[
                'inf' => 'les informations '
            ]);
        }

    }
    public function showPagePM(){
        return view('preparation.homePM',[
            'nbEchantillon' => 20,
            'nbDemande' =>10,
            'inf' => 'les informations']
        );
    }
    public function showPagePC(){
        return view('preparation.homePC',[
            'nbEchantillon' => 20,
            'nbDemande' => 10,
            'inf' => 'les informations']
        );
    }

}
