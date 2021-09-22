<script defer type='module' src="{{asset('/js/reception.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
@extends('templateHead')
@section('title')
    <h2>Réception des echantilllons</h2>
@endsection
@section('containPage')
    <div class="row tab1 ">
        <div class="row line">
            <div class="col-md-6">
                <label class="ombre" for="demandeur">Demandeur :</label>
                <input id="2" type="text" class="input" placeholder="Demandeur">
            </div>
            <div class="col-md-6">
                <label class="ombre" for="societe">Société :</label>
                <input id="1" type="text" class="input" placeholder="Sociéte">
            </div>
        </div>
        <div class="row line">
            <div class="col-md-6">
                <label class="ombre" for="demandeur">Identificqtion des echantillons :</label>
                <input  type="text" class="input" placeholder="Exemple: Roche">
            </div>
            <div class="col-md-6">
                <label class="ombre" for="societe">Numero de la demande :</label>
                <input  type="text" class="input" placeholder="Numero de la demande">
            </div>
        </div>
        <div class="row line">
            <div class="col-md-6">
                <label class="ombre" for="demandeur">Etat de l'echantillon :</label>
                <select name="etat" id="etat">
                    <option value="">--Etat--</option>
                    <option value="solide" id="solideChoose">Solide</option>
                    <option value="liquide" selected>Liquide</option>
                    <option value="pulpe">Pulpe</option>
                </select >
                <div id="solideOptions">
                     <div >
                        <input type="radio" id="roche" name="solide" value="roche"
                                checked>
                        <label  for="roche">Roche</label>
                    </div>

                    <div>
                        <input type="radio" id="minerai" name="solide" value="minerai">
                        <label  for="minerai">Minerai</label>
                    </div>
                    <div>
                        <input type="radio" id="carotte" name="solide" value="carotte">
                        <label  for="carotte">Carotte</label>
                    </div>
                    <div>
                        <input type="radio" id="sol" name="solide" value="sol">
                        <label  for="sol">Sol</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="ombre" for="societe">echantillonnage :</label>
                <div id="echantionnage">
                    <div>
                        <input type="radio" id="afilab" name="echantionnage" value="Afrilab">
                        <label  for="afrilab">AfriLab</label>
                    </div>
                    <div>
                        <input type="radio" id="client" name="echantionnage" value="Client" >
                        <label  for="client">Client</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <label class="ombre" for="nbrEch">Nombre d'echantillons:</label>
           <select name="etat" id="etat">
                <option value="">Nombre</option>
                <?php $nombre=27?>
                @foreach( $nombre as $coach)
                    <option  value = '{{ $coach}}'>{{ $coach}}</option>
                @endforeach
           </select >
    </div>
    <table class="tab2">
        <tr id="entete">
            <th>Designation</th>
            <th>Reference Labo</th>
            <th colspan="4">Elements</th>
        </tr>
        <tr id="element">
            <td></td>
            <td></td>
            <th>Zn</td>
            <th>Cu</td>
            <th>Pb</td>
            <th>Ag</td>
        </tr>
    </table>
@endsection