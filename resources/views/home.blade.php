<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/Accueil.css')}}">
   
    <title>AfriLab</title>
</head>
<body>
    <nav>
        <div class="row container">
            <div class="col-md-3 logo"><img src="{{ asset('Images/logoAfriLab.png') }}" width="80%"></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 item btn reception">Réception</div>
                    <div class="col-md-3 item btn">Salle de Pese</div>
                    <div class="col-md-3 item">Salle Analyse</div>
                    <div class="col-md-3 item">Login</div>
                </div>

            </div>
        </div>
    </nav>
    <!-- <img src="{{ asset('Images/AfriLabLogo.png') }}"> -->
    <footer>
        <div class="foot_title"> Laboratoire Africain des mines et l'environnement</div>
        <div class="foot_subTitle">No 344, zone industrielle Sidi Ghanem- Marrakech</div>

    </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
    <script defer type='module' src="{{asset('/js/home/home.js')}}"></script>
</body>