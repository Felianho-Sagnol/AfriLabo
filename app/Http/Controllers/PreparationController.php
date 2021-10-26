<?php

namespace App\Http\Controllers;

use App\Models\demandes;
use App\Models\densites;
use App\Models\humidite;
use App\Models\pertefeu;
use App\Models\echantillons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function changePM($demande_id){
        $echantillons=DB::table('echantillons')->where('demande_id',$demande_id)
                                            ->update([
                                                'pm'=>1
                                            ]);
        $demandes=DB::table('demandes')->whereIn('demande_id', function($query){
                                                $query->select('demande_id')
                                                ->from('echantillons')
                                                ->where('pm', 0)
                                                ->where('pc', 0);
                                            })->get();
        $echantillons=DB::table('demandes')->where('demande_id',$demande_id)
                                            ->update([
                                                'pm_id'=>session('employe_id')
                                            ]);
                            return redirect('Préparation/Mecanique');
    }
    public function homePagePM(){
        $demandes=DB::table('demandes')->whereIn('demande_id', function($query){
            $query->select('demande_id')
            ->from('echantillons')
            ->where('pm', 0)
            ->where('pc', 0);
        })->get();
        $nbrDem=count($demandes);
        $nbrEch=DB::table('echantillons')->where('pm', 0)->where('pc', 0)->get()->count();
        return view('preparation.homePM',[
            'nbEchantillon' => $nbrEch,
            'nbDemande' =>$nbrDem,
            'demandes' => $demandes,]
        );
    }

    public function homePagePC(){
        $demandes=DB::table('demandes')->whereIn('demande_id', function($query){
            $query->select('demande_id')
            ->from('echantillons')
            ->where('pm', 1)
            ->where('pc', 0);
        })->get();
        $nbrDemChi=count($demandes);
        $nbrEchChi=DB::table('echantillons')->where('pm', 1)->where('pc', 0)->get()->count();
        return view('preparation.homePC',[
            'nbEchantillon' => $nbrEchChi,
            'nbDemande' => $nbrDemChi,
            'demandes' => $demandes]
        );
    }

    public function demandeDetails($demande_id){

        $demandes=DB::table('demandes')->whereIn('demande_id', function($query){
            $query->select('demande_id')
            ->from('echantillons')
            ->where('pm', 1)
            ->where('pc', 0);
        })->get();
        $echantillons=DB::table('echantillons')->where('pm', 1)->where('pc', 0)->where('demande_id',$demande_id)->get();
        $nbrEchChi=count($echantillons);
        $nbrDemChi=count($demandes);
        return view('preparation.demandeDetails',[
            'nbEchantillon' => $nbrEchChi,
            'nbDemande' => $nbrDemChi,
            'demande_id' => $demande_id,
            'echantillons' => $echantillons]
        );
    }

    public function demandeAddMasseVolume(Request $request,$demande_id){
        $nbech=(count($_POST)-1)/3;
        for ($i=0; $i <$nbech ; $i++) { 
            $masse="masse".($i);
            $volume="volume".($i);
            $ref='ref'.($i);
            $echantillons=DB::table('echantillons')->where('reference_labo',$_POST[$ref])
            ->update([
                'pc'=>1,
                'masse_pc' => $_POST[$masse],
                'vol_pc' => $_POST[$volume],
            ]);
            
        }
        DB::table('demandes')->where('demande_id',$demande_id)
                                            ->update([
                                                'pc_id'=>session('employe_id'),
                                            ]);
        return redirect('/Préparation/Chimique');
    }

    public function registres($nameRegistre){

        if ($nameRegistre=='humidite') {
            $registre='Registre Humidité';
        }
        elseif ($nameRegistre=='densite') {
            $registre='Registre Densité';
        }
        elseif ($nameRegistre=='pertefeu') {
            $registre='Registre Perte Feu';

        }
        $demandes=DB::table('demandes')->whereIn('demande_id', function($query){
            $query->select('demande_id')
            ->from('echantillons')
            ->where('pm', 1)
            ->where('pc', 1);
        })->get();
        return view('preparation.registre',[
            'demandes' => $demandes,
            'nameRegistre' => $registre]
        );
    }

    public function registreEnregistrement($nameRegistre,$demande_id)
    {
        $echantillons=DB::table('echantillons')->where('pm', 1)->where('pc', 1)->where('demande_id',$demande_id)->get();
        return view('preparation.registreDetails',[
            'demande_id' => $demande_id,
            'nameRegistre' => $nameRegistre,
            'echantillons' => $echantillons]
        );
     }



    public function addRegistreHumidite()
    {
        
            $nbech=(count($_POST)-1)/4;
            for ($i=0; $i <$nbech ; $i++) 
            { 
                $PT="poidsTare".($i);
                $PH="poidsHumide".($i);
                $PS="poidsSeche".($i);
                $ref='ref'.($i);
                    $humidite = new humidite();
                    $humidite->reference_labo = $_POST[$ref];
                    $humidite->poids_tar =$_POST[$PT];
                    $humidite->poids_humid =$_POST[$PH];
                    $humidite->poids_seche =$_POST[$PS];
                    $humidite->created_at = new \DateTime();

                    $humidite->save();
                
            }
            return redirect('Préparation/Chimique/Registre/humidite');
        
}
public function addRegistreDensite(){

    $nbech=(count($_POST)-1)/5;
    for ($i=0; $i <$nbech ; $i++) 
    { 
        $M="masse".$i;
        $T="temperature".$i;
        $Vo="v_initial".$i;
        $V1="v_1".$i;
        $ref='ref'.($i);
            $densite = new densites();
            $densite->reference_labo = $_POST[$ref];
            $densite->temperature =$_POST[$T];
            $densite->vol_initial =$_POST[$Vo];
            $densite->vol_v1 =$_POST[$V1];
            $densite->masse =$_POST[$M];
            $densite->created_at = new \DateTime();

            $densite->save();
        
    }
  
    return redirect('Préparation/Chimique/Registre/densite');
}

public function addRegistrePertefeu(){
    $nbech=(count($_POST)-2)/5;
    for ($i=0; $i <$nbech ; $i++) 
    { 
        $MC="masse_c".$i;
        $T="temperature".$i;
        $Mo="masse_o".$i;
        $M2h="masse_2h".$i;
        $ref='ref'.($i);
            $densite = new pertefeu();
            $densite->reference_labo = $_POST[$ref];
            $densite->temperature =$_POST[$T];
            $densite->masse_creuse =$_POST[$MC];
            $densite->masse_initiale =$_POST[$Mo];
            $densite->masse_2h =$_POST[$M2h];
            $densite->created_at = new \DateTime();

            $densite->save();
        
    }
  
    return redirect('Préparation/Chimique/Registre/pertefeu');
}






}
