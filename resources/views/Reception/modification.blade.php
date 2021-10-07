<link rel="stylesheet" href="{{asset('css/modification.css')}}">
<script defer type='module' src="{{asset('/Js/formulaireResultant/modification.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">


@extends('templateHead')
    @section('titleHead')
        Réception|modification Echantillon
    @endsection
    @section('titlePage')
        <h2>Réception </h2>
    @endsection
    @section('containPage')

    <div class="container " id="modification">
        <div class="row barre">
            <div class="col-md-2"></div>
            <div class="col-md-6 col-sm-6 "> <input class="rechercheText" type="number" min="1" placeholder="Numero de la demande"> </div>
            <div class="col-md-2 col-sm-2 col-xs-2"><button type="button" class="btn btn-lg rechercheBtn"><i class="bi bi-search" style="width: 100px;"></i>Rechercher </button></div>
            <div class="col-md-2 col-sm-2 col-xs-2"></div>
        </div>
        <div class="container affichage mt-3" >
            <div class="row">
                <div class="col-md-12">
                    <p id="errorMessage">
                       
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6>Informations sur la demande <span id="idDemande" class="colorPrimaire"></span> </h6>
                </div>
            </div>
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
                <div class="col-md-4 col-sm-4">
                    <label class="ombre" for="identificateur">Identification :</label>
                    <input id='identificateur'  type="text" class="input" placeholder="Exemple: Roche">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="ombre" for="numDemande">Numero de la demande :</label>
                    <input id='numDemande'  type="number" class="input" min="0" placeholder="Numero de la demande">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="ombre" for="emplacement">Emplacement:</label>
                    <input id='emplacement'  type="text" class="input"  placeholder="exemple YO28 ">
                </div>
            </div>
                <div class="row line">
                    <div class="col-md-6 col-sm-6">
                        <label class="ombre" for="etat">Etat  :</label>
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
                            <option value="Client" >Client</option>
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
        <div class="row" id="echantillonM">
            <div class="col-md-2 th">REFERENCE</div>
            <div class="col-md-2 th">DESIGNATION</div>
            <div class="col-md-8 th" id="enteteElement">
                <table>
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
                </table>
          
            </div>

        </div>
        <div class="footer">
            <button type="button" class="btn btn-danger btn-lg retour">Retour </button>
        </div>
        <div class="btns" >
            <button id="modificationBTNclass" type="button" class="btn btn-lg  ">Enregistrer</button>
        </div>
    </div>

    
    
    @endsection