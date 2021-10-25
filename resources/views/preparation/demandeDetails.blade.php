<link rel="stylesheet" href="{{asset('css/preparation/baseTable.css')}}">

@extends('baseLabo')
    @section('titleHead')
        AfriLab|Salle de Préparation Chimique
    @endsection
    @section('titlePage')
       
       <a class="navbar-brand" href="{{route('homePagePC')}}">Préparation Chimique</a> 
    @endsection

@section('content')
  <h1 style='text-align:center'>DEMANDE : {{$demande_id}}</h1>
  <?php 
       $path='http://127.0.0.1:8000/Préparation/Chimique/MasseVolume/'.$demande_id;
  ?>
    <form action="{{$path}}" method="post">
        @csrf
                    <table class="table" width="100%">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Designation</th>
                            <th scope="col">Reference Labo</th>
                            <th scope="col">Masse(g)</th>
                            <th scope="col">Volume(ml)</th>
                            <th style="background:none"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nb=1;
                                foreach ($echantillons as $echantillon) {
                                    $references[$nb-1]=$echantillon->reference_labo;
                                    $nameMasse="masse".($nb-1);
                                    $nameVolume="volume".($nb-1);
                                    $ref='ref'.($nb-1);
                                    ?>
                                    <tr class="line" >
                                            <th scope="row">{{$nb}}</th>
                                            <td>{{$echantillon->designation}}</td>
                                            <td>{{$echantillon->reference_labo}}
                                                <input id="prodId" name="{{$ref}}" type="hidden" value="{{$echantillon->reference_labo}}">
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control" min="0" name="<?=$nameMasse?>" placeholder="Entrer la masse ici" required>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" class="form-control" min="0" name="<?=$nameVolume?>" placeholder="Entrer le Volume ici" required>
                                            </td>
                                    </tr>
                                
                                <?php
                                $nb++;
                                }

                                ?>

                        </tbody>
                    </table>
                </div>
                <center class="btns">
                    <button type="submit" class="btn valide ">Valider</button>
                    <button type="reset" class="btn danger  ">Annuler</button>
                            </center>
    </form>
@endsection
