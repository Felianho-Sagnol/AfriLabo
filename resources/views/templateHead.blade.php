<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/css/app.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('titleHead')</title>

        <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> -->

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/887c56acc8.js" crossorigin="anonymous"></script>

        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->

        <!-- <script src="https://cdn.jsdelivr.net/highlight.js/9.9.0/highlight.min.js"></script> -->
        <!-- <script src="script.js" defer></script> -->
        <!--Css of header-->
        <link rel="stylesheet" href="{{asset('css/templateHead.css')}}">
        <!-- css of section1 -->
        <!-- <link rel="stylesheet" href="{{asset('css/section1/index.css')}}" /> -->
        <!-- <link rel="stylesheet" href="{{asset('css/sectionsContent/main.css')}}" /> -->
        <!-- <link rel="stylesheet" href="{{asset('css/sectionsContent/section_css.css')}}" /> -->
    </head>
<body>
    <section class="toHide">
        <div class="headBar row">
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2"> <img src="{{ asset('Images/logoAfriLab.png') }}" width="50%"></div>
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 title"><a class="nav-link" href="{{route('ReceptionON')}}">@yield('titlePage')</a></div>
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 "> listes de demandes </div>
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 EchantillonModification"> Modification </div>
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 logout"> Déconnexion </div>
        </div>
        @yield('containPage')
    </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <script defer type='module' src="{{asset('/js/loginReception.js')}}"></script>
    </body>
</html>
