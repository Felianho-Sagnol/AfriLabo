<?php

namespace App\Http\Controllers;

use App\Models\demandes;
use App\Models\elements;
use App\Models\echantillons;
use Illuminate\Http\Request;

class DemandeAndEchantillonController extends Controller {
    public function addDemand(Request $request){
        if(
            isset($_POST['demandeur']) && isset($_POST['societe'])&&
            isset($_POST['numDemande']) && isset($_POST['emplacement']) &&
            isset($_POST['etat']) && isset($_POST['nombre']) &&
            isset($_POST['identificateur'])
        ){
            
            $verifDemand = demandes::where('demande_id',$_POST['numDemande'])->first();
            if(!empty($verifDemand)){
                $elements = elements::all();
                $nbDemande = demandes::all()->count();
                return redirect('reception');
               
            }else{
                $demande = new demandes();
                $demande->demande_id = $_POST['numDemande'];
                $demande->society = $_POST['societe'];
                $demande->identification_echantillon = $_POST['identificateur'];
                $demande->demandeur = $_POST['demandeur'];
                $demande->emplacement = $_POST['emplacement'];
                $demande->etat = $_POST['etat'];
                $demande->echantillonnage = "non renseigner pour le moment";
                $demande->nombre_echantillons = $_POST['nombre'];
                $demande->created_at = new \DateTime();
                $demande->receptor_id =session('employe_id');
    
                if(isset($_POST['depot'])){
                    $demande->depot = $_POST['depot'];
                }
                
                if(isset($_POST['etatSolid'])){
                    $demande->etat_solid = $_POST['etatSolid'];
                }
    
                $demande->save();
                $id = $demande->demand_id;
                $elements = elements::all();
                $nbDemande = demandes::all()->count();
                $request->url('Demande/Echantillons');
                return view('reception.echantillons',[
                    'nbEchantillon' => 0,
                    'nbDemande' => $nbDemande,
                    'elements' =>$elements,
                    'demande_id' => $_POST['numDemande'],
                ]);
            }
        }else{
           dd("on est a la fin");
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


    public function addEchantillon(Request $request,$damande_path){
        if(
            isset($_POST['designation1']) && isset($_POST['elementAna1'])
            
           
        ){
            $nbrECH=(count($_POST)-1)/2;
            for ($i=0; $i <$nbrECH ; $i++) { 
                $et1="designation".($i+1);
                $et2="elementAna".($i+1);
                $reference="R/".$damande_path."_2021_".($i+1);
                echo $_POST[$et1]."   ".$_POST[$et2]."  ".$reference."<br>";

                $echantillon = new echantillons();
                $echantillon->designation = $_POST[$et1];
                $echantillon->reference_labo = $reference;
                $echantillon->elements_d_analyse =$_POST[$et2];
                $echantillon->demande_id = $damande_path;
                $echantillon->created_at = new \DateTime();
    
                $echantillon->save();
            }
            return redirect('reception');

          
        }else{
            dd('on est a la fin');
        }
    }

    public function getDemande(){
        if(isset($_GET['demandeId'])){
            $demande = demandes::where('demand_id',$_GET['demandeId'])->first();
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

    public function updateDemand(Request $request){
        if(
            isset($_GET['demand']) && isset($_GET['societe']) && isset($_GET['etat'])
            && isset($_GET['identification_echantillon']) && isset($_GET['numDemande']) 
            && isset($_GET['echantillonnage']) 
            && isset($_GET['emplacement'])
        ){

            $demande = demandes::where("demand_id",$_GET['numDemande']);
            $demande->society = $_GET['societe'];
            $demande->identification_echantillon = $_GET['identification_echantillon'];
            $demande->demandeur = $_GET['demand'];
            $demande->emplacement = $_GET['emplacement'];
            $demande->etat = $_GET['etat'];
            $demande->echantillonnage = $_GET['echantillonnage'];

            if(isset($_GET['depot'])){
                $demande->depot = $_GET['depot'];
            }
            
            if(isset($_GET['etatSolid'])){
                $demande->etat_solid = $_GET['etatSolid'];
            }

            $demande->save();
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function updateEchantillon(Request $request){
        if(
            isset($_GET['designation']) && isset($_GET['reference']) 
            && isset($_GET['elementAnalyse'])
            && isset($_GET['demandId'])
        ){
            $table = explode(';',$_GET['elementAnalyse']);
            $elements_d_analyse =  "";
            for($i=0;$i < count($table);$i++) {
                $element = Element::where("identicateur",trim($table[$i]))->first();
                if($i ==0){
                    $elements_d_analyse .= $element->nom_analyse;
                }else{
                    $elements_d_analyse .= ",".$element->nom_analyse;
                }
            }

            $echantillon = Echantillon::where([
                ['demand_id',$_GET['demandeId']],
                ['reference_labo',$_GET['reference']]
            ])->first();

            $echantillon->designation = $_GET['designation'];
            $echantillon->elements_d_analyse = $elements_d_analyse;

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

}

