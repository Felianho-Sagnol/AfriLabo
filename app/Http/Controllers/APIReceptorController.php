<?php

namespace App\Http\Controllers;

use App\Models\employes;
use Illuminate\Http\Request;

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
                    $receptor = new employes();
                    $receptor->name = htmlspecialchars($_GET['name']);
                    $receptor->matricule = htmlspecialchars($_GET['matricule']);
                    $receptor->password = sha1($_GET['password']);
                    $receptor->service = "rien pour le moment";
                    $receptor->created_at = new \DateTime();
    
                    $receptor->save();
                            
                    return response()->json([
                        'success' => true,
                        'comfirmError' => false,
                        'userAlreadyExists' => false,
                    ]);
                }
            }
        }
    }

    public function login(Request $request){
        if(isset($_GET['matricule']) && isset($_GET['password'])){
            $receptor = employes::where([
                ['matricule',$_GET['matricule']],
                ['password',sha1($_GET['password'])],
            ])->first();

            if(!empty($receptor)){
                if(session()->has('receptor_id')){
                    session()->pull('receptor_id');
                    $request->session()->put('receptor_id',$receptor->matricule);
                }else{
                    $request->session()->put('receptor_id',$receptor->matricule);
                }
                
                return response()->json([
                    'receptor ' => $receptor,
                    'success' => true
                ]);
            }else{
                return response()->json([
                    'receptor ' => [],
                    'success' => false
                ]);
            }
        }else{
            return response()->json([
                'receptor ' => [],
                'success' => false
            ]);
        }
    }

    public function isLoggedIn(){
        if(session()->has('receptor_id')){
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
        if(session()->has('receptor_id')){
            session()->pull('receptor_id');
        }
    }
}
