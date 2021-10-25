<link rel="stylesheet" href="{{asset('css/preparation/baseTable.css')}}">

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
  <?php 

       if ($nameRegistre=="Registre Humidité") 
       {
         ?>
         <form action="http://127.0.0.1:8000/Préparation/Chimique/RegistreAdd/humidite" method="post">
                @csrf
                    <table class="table" width="100%">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Designation</th>
                            <th scope="col">Reference Labo</th>
                            <th scope="col">Poids Tare(g)</th>
                            <th scope="col">Poids Humide(g)</th>
                            <th scope="col">Poids sèche(g)</th>
                            <th scope="col">Poids(g)</th>
                            <th scope="col">H<SUB>2</SUB>O(%)</th>
                            <th style="background:none"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nb=1;
                                foreach ($echantillons as $echantillon) {
                                    $references[$nb-1]=$echantillon->reference_labo;
                                    $PT="poidsTare".($nb-1);
                                    $PH="poidsHumide".($nb-1);
                                    $PS="poidsSeche".($nb-1);
                                    $P="poids".($nb-1);
                                    $EAU="eau".($nb-1);
                                    $ref='ref'.($nb-1);
                                    ?>
                                    <tr class="line" >
                                            <th scope="row">{{$nb}}</th>
                                            <td>{{$echantillon->designation}}</td>
                                            <td>{{$echantillon->reference_labo}}
                                                <input id="prodId" name="{{$ref}}" type="hidden" value="{{$echantillon->reference_labo}}">
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$PT?>" id="<?=$PT?>" placeholder="Entrer le Poids Tare ici" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$PH?>" id="<?=$PH?>" placeholder="Entrer le Poids Humide ici" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$PS?>" id="<?=$PS?>" placeholder="Entrer le Poids sèche ici" required>
                                            </td>
                                            <td id="{{$P}}">...</td>
                                            <td id="{{$EAU}}">...</td>
                                    </tr>
                                
                                <?php
                                $nb++;
                                }

                                ?>

                        </tbody>
                    </table>
                    <input type="hidden" value="{{$nb-1}}" id="nombreEchantillon">
                </div>
                <center class="btns">
                    <button type="button" class="btn valide " id="calculer">Calculer</button>
                    <button type="submit" class="btn valide  ">Registrer</button>
                            </center>
    </form>
         <?php  
       }
       elseif ($nameRegistre=="Registre Densité") 
       {
           ?>
         <form action="http://127.0.0.1:8000/Préparation/Chimique/RegistreAdd/densite" method="post">
                @csrf
                    <table class="table" width="100%">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Designation</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Masse(g)</th>
                            <th scope="col">Temperature(&#8451;)</th>
                            <th scope="col">Volume initial(ml)</th>
                            <th scope="col">Volume V1</th>
                            <th scope="col">Volume</th>
                            <th scope="col">Densité</th>
                            <th style="background:none"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nb=1;
                                foreach ($echantillons as $echantillon) {
                                    $references[$nb-1]=$echantillon->reference_labo;
                                    $M="masse".($nb-1);
                                    $T="temperature".($nb-1);
                                    $Vo="v_initial".($nb-1);
                                    $V1="v_1".($nb-1);
                                    $V="volume".($nb-1);
                                    $D="densite".($nb-1);
                                    $ref='ref'.($nb-1);
                                    ?>
                                    <tr class="line" >
                                            <th scope="row">{{$nb}}</th>
                                            <td>{{$echantillon->designation}}</td>
                                            <td>{{$echantillon->reference_labo}}
                                                <input id="prodId" name="{{$ref}}" type="hidden" value="{{$echantillon->reference_labo}}">
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$M?>" id="<?=$M?>" placeholder="La masse(g)" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$T?>" id="<?=$T?>" placeholder="Temperature(&#8451;)" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$Vo?>" id="<?=$Vo?>" placeholder="Volume V0(ml)" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$V1?>" id="<?=$V1?>" placeholder="Volume V1(ml)" required>
                                            </td>
                                            <td id="{{$V}}">...</td>
                                            <td id="{{$D}}">...</td>
                                    </tr>
                                
                                <?php
                                $nb++;
                                }

                                ?>

                        </tbody>
                    </table>
                    <input type="hidden" value="{{$nb-1}}" id="nombreEchantillon">
                </div>
                <center class="btns">
                    <button type="button" class="btn valide " id="calculerDensite">Calculer</button>
                    <button type="submit" class="btn valide  ">Enregistrer</button>
                            </center>
    </form>

           <?php
       }
       elseif ($nameRegistre=="Registre Perte Feu") 
       {
           ?>

            <form action="http://127.0.0.1:8000/Préparation/Chimique/RegistreAdd/pertefeu" method="post">
                @csrf
                    <table class="table" width="100%">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Designation</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Temperature(&#8451;)</th>
                            <th scope="col">Masse de creuset</th>
                            <th scope="col">Masse initiale(g)</th>
                            <th scope="col">Masse Après 2h(g)</th>
                            <th scope="col">Masse(g)</th>

                            <th scope="col" >
                                <input type="radio" name="resultat" value="pf" >
                                 PF(%)
                                <input type="radio" name="resultat" value="mo">
                                    MO(%)
                            </th>
                           
                            <th style="background:none"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nb=1;
                                foreach ($echantillons as $echantillon) {
                                    $references[$nb-1]=$echantillon->reference_labo;
                                    $MC="masse_c".($nb-1);
                                    $T="temperature".($nb-1);
                                    $Mo="masse_o".($nb-1);
                                    $M2h="masse_2h".($nb-1);
                                    $M="masse".($nb-1);
                                    $PF="pf".($nb-1);
                                    $ref='ref'.($nb-1);
                                    ?>
                                    <tr class="line" >
                                            <th scope="row">{{$nb}}</th>
                                            <td>{{$echantillon->designation}}</td>
                                            <td>{{$echantillon->reference_labo}}
                                                <input id="prodId" name="{{$ref}}" type="hidden" value="{{$echantillon->reference_labo}}">
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$T?>" id="<?=$T?>" placeholder="Temperature(&#8451;)" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$MC?>" id="<?=$MC?>" placeholder="masse de Creuset(g)" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$Mo?>" id="<?=$Mo?>" placeholder="Masse M0(ml)" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control input" min="0" name="<?=$M2h?>" id="<?=$M2h?>" placeholder="Volume V1(ml)" required>
                                            </td>
                                            
                                            <td id="{{$M}}">...</td>
                                            <td id="{{$PF}}">...</td>
                                    </tr>
                                
                                <?php
                                $nb++;
                                }

                                ?>

                        </tbody>
                    </table>
                    <input type="hidden" value="{{$nb-1}}" id="nombreEchantillon">
                </div>
                <center class="btns">
                    <button type="button" class="btn valide " id="calculerPF">Calculer</button>
                    <button type="submit" class="btn valide  ">Enregistrer</button>
                            </center>
            </form>
           <?php
       }
  ?>





@endsection