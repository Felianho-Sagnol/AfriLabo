<link rel="stylesheet" href="{{asset('css/modification.css')}}">
<script defer type='module' src="{{asset('/Js/formulaireResultant/modification.js')}}"></script>


@extends('templateHead')
    @section('titleHead')
        Réception|modification Echantillon
    @endsection
    @section('titlePage')
        <h2>Réception </h2>
    @endsection
    @section('containPage')

    <div class="container modification">
        <div class="row barre">
            <div class="col-md-2"></div>
            <div class="col-md-6 col-sm-6 "> <input class="rechercheText" type="number" min="1" placeholder="Numero de la demande"> </div>
            <div class="col-md-2 col-sm-6"><button type="button" class="btn btn-lg rechercheBtn"><i class="bi bi-search" style="width: 100px;"></i>Rechercher </button></div>
            <div class="col-md-3"></div>
        </div>
        <div class="container affichage " style="height: 50%; " >
            bienvenu gfgfghghf
        </div>
        <div class="footer">
            <button type="button" class="btn btn-danger btn-lg retour">Retour </button>
        </div>
    </div>
    
    @endsection