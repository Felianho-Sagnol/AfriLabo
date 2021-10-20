<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
<script defer type='module' src="{{asset('/js/reception.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer type='module' src="{{asset('/js/layoutJs/popupController.js')}}"></script>
@extends('baseLabo')
    @section('titleHead')
    Réception|Demande|Echantillon(s)

    @endsection
    @section('titlePage')
        Réception
    @endsection

    @section('content')
    <form action="#">
            <table class="tab2" border="2">
                <tr id="entete">
                    <th >Designation</th>
                    <th >Reference Labo</th>
                    <th colspan="2">Elements démandés</th>
                </tr>
            <?php 
                for ($i=0; $i <$_POST['nombre']  ; $i++) { 
                   ?>
                <tr>
                    <td  class='elementscar'><input id="design1" type='text' placeholder='Designation'></td>
                    <td id='ref1'> <em>R/<?php echo $_POST['numDemande'] ?>_2021_<?php echo ($i+1)?></em> </td>
                    <td colspan="2">
                        <div class="row">
                        <div class="col-md-9">
                                <input class="col-md-6" type="text" name="elementsDemandes" placeholder="les elements demandes">

                            </div>
                            <div class="col-md-3">
                                <select name="elementD" id="elementD" class="col-md-6">
                                    <?php
                                        foreach ($elements as $element) {
                                            echo $element->code;
                                            ?>
                                                <option value="<?=$element->code ?>"><em><?php echo $element->nom_analyse ?></em></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>

                        </div>

                    </td>
                </tr>

                <?php
                }
            ?>

            </table>


        <div class="btns" id="btnForm">
        <button type="button" class="btn btn-lg valide registerBTN">Enregistrer</button>
        <button type="button" class="btn btn-lg danger annuler" id="reinitialiser">Réinitialiser <img src="{{ asset('Images/arrow-clockwise.svg') }} " width="10%"></button>
    </div>
</form>
<h1><?php echo $_POST['nombre'] ?></h1>

@endsection

    <!-- @include('layouts.popupValidation')
    @include('layouts.appercue') -->
   
