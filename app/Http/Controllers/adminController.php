<?php

namespace App\Http\Controllers;

use App\Models\employes;
use Illuminate\Http\Request;

class adminController extends Controller
{
   public function adminPage(){
       return view('administration.superAdmin');
   }

    public function ajoutEmploye(){
        if(isset($_POST['nom']) && isset($_POST['password'])  && isset($_POST['matricule'])&& isset($_POST['service'])){
                    $receptor = new employes();
                    $receptor->name = htmlspecialchars($_POST['nom']);
                    $receptor->matricule = htmlspecialchars($_POST['matricule']);
                    $receptor->password = sha1($_POST['password']);
                    $receptor->service = $_POST['service'];
                    $receptor->created_at = new \DateTime();
    
                    $receptor->save();
                    return redirect('admin');

        }
    }



}
