<?php

namespace App\Http\Controllers;

use App\Models\Recepteur;
use Illuminate\Http\Request;

class APIReceptorController extends Controller
{
    public function registerReceptor(){
        if(isset($_GET['name']) && isset($_GET['password']) && isset($_GET['comfirmPassword'])){
            if($_GET['password'] != $_GET['comfirmPassword']){
                return response()->json([
                    'success' => false,
                    'comfirmError' => true,
                ]);
            }else{
                $receptor = new Recepteur();
                $receptor->name = htmlspecialchars($_GET['name']);
                $receptor->password = sha1($_GET['password']);
                $receptor->created_at = new \DateTime();

                $receptor->save();
                        
                return response()->json([
                    'success' => true,
                    'comfirmError' => false,
                ]);
            }
        }
    }

    public function login(Request $request){
        if(isset($_GET['name']) && isset($_GET['password'])){
            $receptor = Recepteur::where([
                ['name',$_GET['name']],
                ['password',sha1($_GET['password'])],
            ])->first();

            if(!empty($receptor)){
                if(session()->has('receptor_id')){
                    session()->pull('receptor_id');
                    $request->session()->put('receptor_id',$receptor->id);
                }else{
                    $request->session()->put('receptor_id',$receptor->id);
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
