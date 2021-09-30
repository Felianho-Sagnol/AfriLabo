<script defer type='module' src="{{asset('/js/reception.js')}}"></script>
<script defer type='module' src="{{asset('/Js/formulaireResultant/resultatSaisi.js')}}"></script>

<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
    @extends('templateHead')
    @section('title')
        <h2>Réception </h2>
    @endsection
    @section('containPage')
    <div class="row tab1 toHide">
        <div class="row line">
            <div class="col-md-6">
                <label class="ombre" for="demandeur">Demandeur :</label>
                <input id="demandeur" type="text" class="input" placeholder="Demandeur">
            </div>
            <div class="col-md-6">
                <label class="ombre" for="societe">Société :</label>
                <input id="societe" type="text" class="input" placeholder="Sociéte">
            </div>
        </div>
        <div class="row line">
            <div class="col-md-6">
                <label class="ombre" for="identificateur">Identification des echantillons :</label>
                <input id='identificateur'  type="text" class="input" placeholder="Exemple: Roche">
            </div>
            <div class="col-md-6">
                <label class="ombre" for="numDemande">Numero de la demande :</label>
                <input id='numDemande'  type="number" class="input" min="0" placeholder="Numero de la demande">
            </div>
        </div>
        <div class="row line">
            <div class="col-md-6">
                <label class="ombre" for="etat">Etat de l'echantillon :</label>
                <select name="etat" id="etat">
                    <option value="">--Etat--</option>
                    <option value="solide" id="solideChoose">Solide</option>
                    <option value="liquide" >Liquide</option>
                    <option value="pulpe">Pulpe</option>
                </select >
                <div id="solideOptions">
                     <div >
                        <input type="radio" id="roche" name="solide" value="roche"
                                >
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
                <label class="ombre" for="echantillonnage">echantillonnage :</label>
                <select name="depotAfrilab" id="depotAfrilab">
                    <option value="">--choix--</option>
                    <option value="AfriLAb" >AFRILAB</option>
                    <option value="Client" selected>Client</option>
                </select >
                <div id="depotoire">
                    <div >
                       <input type="radio" id="ULS" name="depot" value="ULS">
                       <label  for="ULS">ULS</label>
                   </div>

                   <div>
                       <input type="radio" id="AZILOG" name="depot" value="AZILOG">
                       <label  for="AZILOG">AZILOG</label>
                   </div>
                   <div>
                       <input type="radio" id="SSL" name="depot" value="SSL">
                       <label  for="SSL">SSL</label>
                   </div>
                   <div>
                       <input type="radio" id="BELARCO" name="depot" value="BELARCO">
                       <label  for="BELARCO">BELARCO</label>
                   </div>
                   <div>
                        <input type="radio" id="Site_client" name="depot" value="Site client">
                        <label  for="Site_client">Site client</label>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="autre">
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
    <table class="tab2" toHide>
        <tr id="entete">
            <th rowspan="2">Designation</th>
            <th rowspan="2">Reference Labo</th>
            <th colspan="23">Elements démandés</th>
        </tr>
        <tr id="enteteElement">
            <th>A1</th>
            <th>A2</th>
            <th>A3</th>
            <th>A4</th>
            <th>A5</th>
            <th>A6</th>
            <th>A7</th>
            <th>A8</th>
            <th>A9</th>
            <th>A10</th>
            <th>A11</th>
            <th>A12</th>
            <th>A13</th>
            <th>A14</th>
            <th>A15</th>
            <th>A16</th>
            <th>A17</th>
            <th>A18</th>
            <th>A19</th>
            <th>A20</th>
            <th>21</th>
            <th>A22</th>
            <th>A23</th>
        </tr>
        <tr>
           <td  class='elementscar'><input id="design1" type='text' placeholder='Designation'></td>
           <td id='ref1'>Reference</td>
           <td> <input type="checkbox" class="btnAffichage" name="line1" value="A1" alt="Analyse de l'Au par plombeuse"> </td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A2"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A3"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A4"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A5"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A6"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A7"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A8"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A9"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A10"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A11"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A12"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A13"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A14"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A15"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A16"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A17"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A18"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A19"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A20"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A21"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A22"></td>
           <td><input type="checkbox" class="btnAffichage"  name="line1" value="A23"></td>
        </tr>
    </table>
    <div class="btns" id="btnForm">
        <button type="button" class="btn btn-lg valide registerBTN">Enregistrer</button>
        <button type="button" class="btn btn-lg danger annuler" id="reinitialiser">Réinitialiser</button>
    </div>
    <div class="container popup" id="popup">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"> 
                <img src="{{ asset('Images/logoAfriLab.png') }}" width="80%">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-12" >Demande Numéro: <span id="NoDemandePop">ici num demande </span></div>
            <div class="col-md-12">Sociéte :<span id="societePop">ciscom</span> </div>
            <div class="col-md-12" >Démandeur: <span id="NomDemandeurPop">techno</span> </div>
            <div class="col-md-12"> Nombre d'echantillons :<span id="numEch"> num echan</span> </div>
            <div class="col-md-12"> Recepteur :<span id="recepteur"> recetion</span> </div>
            <div class="col-md-6">Date :<span id="date"></span> </div>
            <div class="col-md-6">Heure :<span id="heure"></span></div>
        </div>
        <div class="row btnsPop">
            <button type="button" class="btn  valide valider">Valider</button>
            <button type="button" class="btn  danger nonValider">Annuler</button>
        </div>
    </div>
@endsection