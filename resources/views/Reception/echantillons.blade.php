
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
<link rel="stylesheet" href="{{asset('css/echantillon.css')}}">
<script defer type='module' src="{{asset('/js/reception.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script defer type='module' src="{{asset('/js/layoutJs/popupController.js')}}"></script>
@extends('baseLabo')
    @section('titleHead')
    Réception|Demande|Echantillon(s)

    @endsection
    @section('titlePage')
    <a class="navbar-brand" href=" {{route('reception')}}">Réception</a> 
    @endsection

    @section('content')

    <?php   $demande_path="http://127.0.0.1:8000/echantillons/".$demande_id?>
<center>
    <form action="<?= $demande_path?>" id="echantillonForm" method="POST">
         @csrf
         <h1 style="text-align:center"> Les echantillons Pour la demande :{{$demande_id}}</h1>
            <table class="table" border="2">
                <tr id="entete">
                    <th >Designation</th>
                    <th >Reference Labo</th>
                    <th colspan="2">Elements démandés</th>
                </tr>
            <?php 
                for ($i=0; $i <$_POST['nombre']  ; $i++) { 
                    $design="designation".($i+1);
                    $elem="elementAna".($i+1);
                    $ref="reference".($i+1);
                    $classDiv="id".($i+1);
                   ?>
                <tr>
                    <td  class='elementscar'>
                        <input class="<?= $classDiv?>" type='text' placeholder='Designation' name="<?= $design?>" required>
                    </td>
                    <td id='ref1'> <em name="<?=$ref ?>">R/<?php echo $_POST['numDemande'] ?>_2021_<?php echo ($i+1)?></em> </td>
                    <td colspan="2">
                        <div class="row">
                           
                                <div class="col-md-3">
                                    <?php $allClass= "col-md-6  ech".($i+1)?>
                                    <select  id="<?=($i+1)?>" class="col-md-6 selectfield optionElement">
                                        <?php
                                            foreach ($elements as $element) {
                                                $nameFull=$element->nom_simple."(".$element->code.")";
                                                ?>
                                                    <option value="<?=$nameFull?>" ><em><?php echo $element->nom_analyse ?></em></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input style="width:100%" type="text" id="<?= $elem?>" name="<?= $elem?>" readonly  value="" class="<?=$classDiv?>" placeholder="Les éléments demandés" required>
                            </div>

                        </div>

                    </td>
                </tr>

                <?php
                }
            ?>

            </table>


        <div class="btns" id="btnForm">
        <div  class="btn btn-lg valide registerBTN">Enregistrer</div>
        <button type="reset" class="btn btn-lg danger annuler" id="reinitialiser">Réinitialiser </button>
    </div>

    @include('layouts.popupValidation')
</form> 
</center>
@include('layouts.popupValidation')
@include('layouts.appercue')
   
@endsection
