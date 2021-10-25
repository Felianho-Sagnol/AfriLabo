@extends('preparation.registreBase')
    @section('titleHead')
        AfriLab|Salle de Préparation Chimique
    @endsection
    @section('titlePage')
       
       <a class="navbar-brand" href="{{route('homePagePC')}}">Préparation Chimique</a> 
    @endsection
    @section('registreName')
       
      {{$nameRegistre}}
    @endsection

@section('content')

<?php if (count($demandes)==0) {
        echo "aucun echantillon pour le moment";
    }
    else{
        ?>
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
                            $demandePath="Préparation/Chimique/Registre/".$nameRegistre."/"."enregistrement/".$demande->demande_id;
                            ?>
                            <tr class="line" href="1">
                                    <th scope="row">{{$nb}}</th>
                                    <td>{{$demande->demande_id}}</td>
                                    <td>{{$demande->demandeur}}</td>
                                    <td>{{$demande->nombre_echantillons}}</td>
                                    <td>{{$demande->created_at}}</td>
                                    <td class="detaille"><a href="{{url($demandePath)}}" class="link">Enregistrer</a></td>
                            </tr>
                           
                        <?php
                        $nb++;
                        }

                        ?>

                </tbody>
            </table>
            <?php }?>
@endsection
<style>
  .detaille{
    background-color: #f9bc14;
    
}
.detaille a {
  color:white;
  font-weight:bold;
  text-align:center !important;

}
.detaille a:hover{
  text-decoration:none;
}
</style>