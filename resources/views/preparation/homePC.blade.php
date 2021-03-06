<link rel="stylesheet" href="{{asset('css/preparation/preparationPC.css')}}">
@extends('baseLabo')
    @section('titleHead')
        AfriLab|Salle de Préparation Chimique
    @endsection
    @section('titlePage')
       
       <a class="navbar-brand" style='color:black !important;' href="#">Préparation Chimique</a> 
    @endsection

    @section('content')
    <?php if (count($demandes)==0) {
        echo "aucun echantillon pour le moment";
    }
    else{
        ?>
     <div class="container row">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Numéro de Demade </th>
                    <th scope="col">Client</th>
                    <th scope="col">Nombre d'echatiollons</th>
                    <th scope="col">Date de Réception</th>
                    <th style="background:none"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nb=1;
                        foreach ($demandes as $demande) {
                            $demandePath="/Préparation/Chimique/detatils/demande/".$demande->demande_id;
                            ?>
                            <tr class="line" href="1">
                                    <th scope="row">{{$nb}}</th>
                                    <td>{{$demande->demande_id}}</td>
                                    <td>{{$demande->demandeur}}</td>
                                    <td>{{$demande->nombre_echantillons}}</td>
                                    <td>{{$demande->created_at}}</td>
                                    <td class="detaille"><a href="{{url($demandePath)}}" class="link">Détails</a></td>
                            </tr>
                           
                        <?php
                        $nb++;
                        }

                        ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-3 btns">
        <a href="http://127.0.0.1:8000/Préparation/Chimique/Registre/humidite" class='link'><button type="button" style="opacity:1 " class="btn btn-registre btn-lg btn-block">Registre Humidité </button></a>
            <a href="http://127.0.0.1:8000/Préparation/Chimique/Registre/densite" ><button type="button" class="btn btn-registre btn-lg btn-block">Registre de Densité </button></a>
            <a href="http://127.0.0.1:8000/Préparation/Chimique/Registre/pertefeu" > <button type="button" class="btn btn-registre btn-lg btn-block ">Registre Perte Feu </button></a>
        </div>
     </div>

     <?php } ?>
    @endsection

