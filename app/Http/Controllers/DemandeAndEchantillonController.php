<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeAndEchantillonController extends Controller
{
    public function addDemand(Request $request){
        if(isset(
            $_POST['demand'],$_POST['societe'],$_POST['identificateur'],$_POST['numeroDemande'],
            $_POST['etatEchantillon'],$_POST['etatSolide'],$_POST['echantillonnage'],$_POST['nombreEchantillons']
        )){

        }
    }

    public function addEchantillon(Request $request){
        if(iseet(
            $_POST['numeroDemande'],$_POST['designation'],$_POST['referenceLabo'],$_POST['elementAnalyse'],
        )){
            
        }
    }
}
