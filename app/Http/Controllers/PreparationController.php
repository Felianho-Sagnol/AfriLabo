<?php

namespace App\Http\Controllers;

use App\Models\demandes;
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
                            return redirect('PreparationMecanique#');
    }
}
