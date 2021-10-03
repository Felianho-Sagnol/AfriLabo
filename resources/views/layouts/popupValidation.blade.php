



<div class="container popup" id="popup">
        <div class="row">
            <div class="col-md-3 col-xs-3 col-sm-3"></div>
            <div class="col-md-6 col-xs-6 col-sm-6"> 
                <img src="{{ asset('Images/logoAfriLab.png') }}" width="80%">
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3"><i id="apercu" style="color:rgb(3, 73, 119)" class="bi bi-eye-fill fa-2x red"  ></i></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12" >Demande Numéro: <span id="NoDemandePop">ici num demande </span></div>
            <div class="col-md-12 col-xs-12 col-sm-12">Société :<span id="societePop">ciscom</span> </div>
            <div class="col-md-12 col-xs-12 col-sm-12" >Démandeur: <span id="NomDemandeurPop">techno</span> </div>
            <div class="col-md-12 col-xs-12 col-sm-3"> Nombre d'echantillons :<span id="numEch"> num echan</span> </div>
            <div class="col-md-12 col-xs-12 col-sm-3"> Recepteur :<span id="recepteur"> recetion</span> </div>
            <div class="col-md-6 col-xs-12 col-sm-3">Date :<span id="date"></span> </div>
            <div class="col-md-6 col-xs-12 col-sm-3">Heure :<span id="heure"></span></div>
        </div>
        <div class="row btnsPop">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="btn  valide valider">Valider</button>
                <button type="button" class="btn  danger nonValider">Annuler</button>
            </div>
         
        </div>
</div>
<style>
.btnsPop{
   transform: translateX(18vh);
}
.btnsPop .btn {
    width: 25%;
    margin: 3%;
    border-radius: 10px;
    border: 2px solid rgb(3, 73, 119);
    box-shadow: 0px 0px 2px black;
    outline: none;
    cursor: pointer;
    font-size: auto;
    font-family: Georgia, 'Times New Roman', Times, serif;
    color: #f9bc14;
    font-weight: bold;
}
.popup .row{
    margin: 10px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    color: black;
    font-weight: bold;
    font-size: 20px;

}
span{
    color: #f9bc14;
}
.popup i{
        cursor: pointer;
        opacity: 0.8;
}
.popup i:hover{
    opacity: 1;
}
</style>