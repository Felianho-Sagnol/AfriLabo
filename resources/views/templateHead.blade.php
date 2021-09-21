<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
        <script src="https://kit.fontawesome.com/887c56acc8.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/highlight.js/9.9.0/highlight.min.js"></script>
        <!-- <script src="script.js" defer></script> -->
        <!--Css of header-->
        <link rel="stylesheet" href="{{asset('css/templateHead.css')}}">
        <!-- css of section1 -->
        <!-- <link rel="stylesheet" href="{{asset('css/section1/index.css')}}" /> -->
        <!-- <link rel="stylesheet" href="{{asset('css/sectionsContent/main.css')}}" /> -->
        <!-- <link rel="stylesheet" href="{{asset('css/sectionsContent/section_css.css')}}" /> -->
    </head>
    <body>

    <div class="headBar row">
        <div class="col-md-3"> <img src="{{ asset('Images/AfriLabLogo.png') }}" width="10%"></div>
        <div class="col-md-9"> @yield('title')</div>
    </div>

<div class="formReception">
    
</div>
    <div class="container">
        <div class="logo">
            <i class="fas fa-user"></i>
        </div>

        <div class="tab-body" data-id="connexion">
            <form>
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="text" class="input" placeholder="Entrez votre Nom">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input placeholder="Mot de Passe" type="password" class="input">
                </div>
                <a href="#" class="link">Mot de passe oublié ?</a>
                <button class="btn" type="button">Connexion</button>
            </form>
        </div>

        <div class="tab-body" data-id="inscription">
            <form>
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="email" class="input" placeholder="Entrez votre Nom">
                </div>
                <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" class="input" placeholder="Mot de Passe">
                </div>
                <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" class="input" placeholder="Confirmer Mot de Passe">
                </div>
                <button class="btn" type="button">Inscription</button>
            </form>
        </div>

        <div class="tab-footer">
            <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
            <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>
        </div>
  </div>

        @yield('containPage')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="{{asset('/js/loginReception.js')}}"></script>
    </body>
</html>
