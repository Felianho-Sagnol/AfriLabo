<script defer type='module' src="{{asset('/js/reception.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formulaireEchantillon.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer type='module' src="{{asset('/js/layoutJs/popupController.js')}}"></script>
@extends('baseLabo')
    @section('titleHead')
        AfriLab|Réception
    @endsection
    @section('titlePage')
        Réception
    @endsection

    @section('content')
 
    <form method="POST" action="{{route('echantillon')}}">
            @csrf
        <div class="row tab1 ">
            <div class="row line">
                <div class="col-md-6">
                    <label class="ombre" for="demandeur">Demandeur :</label>
                    <input id="demandeur" name="demandeur" type="text" class="input" placeholder="Demandeur" required>
                </div>
                <div class="col-md-6">
                    <label class="ombre" for="societe">Société :</label>
                    <input id="societe"  name="societe" type="text" class="input" placeholder="Sociéte"  required>
                </div>
            </div>
            <div class="row line">
                <div class="col-md-4 col-sm-4">
                    <label class="ombre" for="identificateur">Identification des echantillons :</label>
                    <input id='identificateur'  name="identificateur" type="text" class="input" placeholder="Exemple: Roche">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="ombre" for="numDemande">Numero de la demande :</label>
                    <input id='numDemande'  name="numDemande" type="number" class="input" min="0" placeholder="Numero de la demande">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="ombre" for="emplacement">Emplacement:</label>
                    <input id='emplacement'  type="text" class="input"  placeholder="exemple YO28 ">
                </div>
            </div>
            <div class="row line">
                <div class="col-md-6 col-sm-6">
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
        <div class="autre">
            <label class="ombre" for="nbrEch">Nombre d'echantillons:</label>
            <select name="nombre" id="nombre">
                    <option value="0" selected>0</option>
                    <option value="1" >1</option>
                    <?php for ($i=2; $i < 27; $i++) { 
                        ?>
                        <option value="<?=$i?>"><?php echo $i?></option>
                        <?php
                    }
                    ?>
            </select >
        </div>
        <a href="">
            <input class="btn d-grid gap-3 col-3 mx-auto btn-danger" id="ehantillon" type="submit" value="Ehantillons" name="echantillon">
        </a>
   
    </form>
   
    @endsection