<?php

namespace App\Http\Controllers;

use App\Models\demandes;
use App\Models\elements;
use App\Models\employes;
use App\Models\echantillons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIReceptorController extends Controller
{
    public function registerReceptor(){
        if(isset($_GET['name']) && isset($_GET['password']) && isset($_GET['comfirmPassword']) && isset($_GET['matricule'])){
            if($_GET['password'] != $_GET['comfirmPassword']){
                return response()->json([
                    'success' => false,
                    'comfirmError' => true,
                    'userAlreadyExists' => false,
                ]);
            }else{
                $info = employes::where('matricule', $_GET['matricule'])->first();
                if(!empty($info)){
                    return response()->json([
                        'success' => false,
                        'comfirmError' => false,
                        'userAlreadyExists' => true,
                    ]);
                }else{
                    $employes = new employes();
                    $employes->name = htmlspecialchars($_GET['name']);
                    $employes->matricule = htmlspecialchars($_GET['matricule']);
                    $employes->password = sha1($_GET['password']);
                    $employes->service = "rien pour le moment";
                    $employes->created_at = new \DateTime();
    
                    $employes->save();
                            
                    return response()->json([
                        'success' => true,
                        'comfirmError' => false,
                        'userAlreadyExists' => false,
                    ]);
                }
            }
        }
    }



    public function login(Request $request,$page){
       

        if(isset($_POST['matricule']) && isset($_POST['password'])){
            $employe = employes::where([
                ['matricule',$_POST['matricule']],
                ['password',sha1($_POST['password'])],
            ])->first();
            if(!empty($employe)){
                if ($page=="PreparationMecanique" && $employe->service=="mecanique") {
                    if(session()->has('employe_id')){
                        session()->pull('employe_id');
                        $request->session()->put('employe_id',$employe->matricule);
                    }else{
                        $request->session()->put('employe_id',$employe->matricule);
                    }
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
                elseif ($page=="PreparationChimique" && $employe->service=="chimique") {
                    if(session()->has('employe_id')){
                        session()->pull('employe_id');
                        $request->session()->put('employe_id',$employe->matricule);
                    }else{
                        $request->session()->put('employe_id',$employe->matricule);
                    }
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
                elseif ($page=="Reception" && $employe->service=="reception") {
                    if(session()->has('employe_id')){
                        session()->pull('employe_id');
                        $request->session()->put('employe_id',$employe->matricule);
                    }else{
                        $request->session()->put('employe_id',$employe->matricule);
                    }
                   
                    $elements = elements::all();
                    $nbDemande = demandes::all()->count();
                    $nbrECH=echantillons::all()->count();
                    return view('reception.reception',[
                        'nbEchantillon' => $nbrECH,
                        'nbDemande' =>$nbDemande,
                        'elements' =>$elements
                    ]);
                    
                }
                else{
                    dd("page inconnu");
                }
            }else{
                dd("pas de compte");
              
            }
        }else{
            dd("les champs sont vides");
        }
    }

    // public function beginSession(){
    //     if(session()->has('employe_id')){
    //         session()->pull('employe_id');
    //         $request->session()->put('employe_id',$employe->matricule);
    //     }else{
    //         $request->session()->put('employe_id',$employe->matricule);
    //     }
    //     dd(session());
    // }
    public function isLoggedIn(){
        if(session()->has('employe_id')){
            return response()->json([
                'isLoggedIn' => true
            ]);
        }else{
            return response()->json([
                'isLoggedIn' => false
            ]);
        }
    }

    public function logout(){
        if(session()->has('employe_id')){
            session()->pull('employe_id');
        }
    }
}
