<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Recepteur;
use App\Models\Echantillon;
use Illuminate\Http\Request;

class DemandeAndEchantillonController extends Controller {
    public function addDemand(Request $request){
        if(
            isset($_GET['demand']) && isset($_GET['societe']) && isset($_GET['etat'])
            && isset($_GET['identification_echantillon']) && isset($_GET['numeroDemande']) 
            && isset($_GET['echantillonnage']) 
            && isset($_GET['nombreEchantillons'])
            && isset($_GET['emplacement'])
        ){
            $verifDemand = Demande::where('demand_id',$_GET['numeroDemande'])->first();

            if(!empty($verifDemand)){
                return response()->json([
                    'success' => false,
                    'demandId' => 0,
                    'demandAlreadyExist' =>true,
                ]);
            }else{
                $demande = new Demande();
                $demande->demand_id = $_GET['numeroDemande'];
                $demande->society = $_GET['societe'];
                $demande->identification_echantillon = $_GET['identification_echantillon'];
                $demande->demandeur = $_GET['demand'];
                $demande->emplacement = $_GET['emplacement'];
                $demande->etat = $_GET['etat'];
                $demande->echantillonnage = $_GET['echantillonnage'];
                $demande->nombre_echantillons = $_GET['nombreEchantillons'];
                $demande->created_at = new \DateTime();
                $demande->recepteur_id = $request->session()->get('receptor_id');
    
                if(isset($_GET['depot'])){
                    $demande->depot = $_GET['depot'];
                }
                
                if(isset($_GET['etatSolid'])){
                    $demande->etat_solid = $_GET['etatSolid'];
                }
    
                $demande->save();
                $id = $demande->demand_id;
    
                return response()->json([
                    'success' => true,
                    'demande' => $demande,
                    'recepteur' => Recepteur::where('matricule',session()->get('receptor_id'))->first()->name,
                    'demandAlreadyExist' =>false,
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'demandId' => 0,
                'demandAlreadyExist' =>false,
            ]);
        }
    }

    public function deleteDemande(){
        if(isset($_GET['demandeId'])){
            Echantillon::where('demand_id',$_GET['demandeId'])->delete();
            Demande::where('demand_id',$_GET['demandeId'])->delete();
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }


    public function addEchantillon(Request $request){
        if(
            isset($_GET['designation']) && isset($_GET['reference']) 
            && isset($_GET['elementAnalyse'])
            && isset($_GET['demandId'])
        ){
            $echantillon = new Echantillon();
            $echantillon->designation = $_GET['designation'];
            $echantillon->reference_labo = $_GET['reference'];
            $echantillon->elements_d_analyse = $_GET['elementAnalyse'];
            $echantillon->demand_id = $_GET['demandId'];
            $echantillon->created_at = new \DateTime();

            $echantillon->save();
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function getDemande(){
        if(isset($_GET['demandeId'])){
            $demande = Demande::where('demand_id',$_GET['demandeId'])->first();
            if(!empty($demande)){
                $echantillons =  Echantillon::where('demand_id',$_GET['demandeId'])->get();
                return response()->json([
                    'demande' => $demande,
                    'echantillons' => $echantillons,
                    'demandeExist' => true,
                ]);
            }else{
                return response()->json([
                    'demandeExist' => false,
                    'message' => "Aucune demande trouvée pour le numéro de demande : "  .$_GET['demandeId'],
                ]);
            }
        }
    }

}

