<script defer type='module' src="{{asset('/js/reception.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
    @extends('templateHead')
    @section('title')
        <h2>Réception des echantilllons</h2>
    @endsection
    @section('containPage')
    <div class="row tab1 toHide">
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
           <select name="nombre" id="nombre">
                <option value="">Choix</option>
                <option value="1" selected>1</option>
                <option value="2" >2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
           </select >
    </div>
    <table class="tab2" >
        <tr id="entete">
            <th rowspan="2">Designation</th>
            <th rowspan="2">Reference Labo</th>
            <th colspan="4">Elements démandés</th>
        </tr>
        <tr id="element" >
            <th>Zn</td>
            <th>Cu</td>
            <th>Pb</td>
            <th>Ag</td>
        </tr>
        <tr>
            <td id="1">EHAN 1</td>
            <td>RE_454_1</td>
            <td><input type='checkbox' class='zn' name='zn' ></td>
            <td> <input type='checkbox' class='cu' name='cu'></td>
            <td><input type='checkbox' class='pb' name='pb' ></td>
            <td><input type='checkbox' id='ag' name='ag' > </td>
        </tr>
    </table>
@endsection