<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
            <div class="col-md-3"> <img src="{{ asset('Images/logoAfriLab.png') }}" width="50%"></div>
            <div class="col-md-5 title"> @yield('title')</div>
            <div class="col-md-3 logout"> Déconnexion</div>
        </div>
        @yield('containPage')
    </section>

    <div class="formReception">
        <div class="container">
                <div class="logo">
                    <i class="fas fa-user"></i>
                </div>

                <div class="tab-body" data-id="connexion">
                    <span class="errorLogin"></span>
                    <form>
                        <div class="rowTab">
                            <i class="far fa-user"></i>
                            <input id="conncexionMatricule" type="text" class="input" placeholder="Matricule">
                        </div>
                        <div class="rowTab">
                            <i class="fas fa-lock"></i>
                            <input id="connexionPassword" placeholder="Mot de Passe" type="password" class="input">
                        </div>
                        <a href="#" class="link">Mot de passe oublié ?</a>
                        <button class="btn connexion" type="button">Connexion</button>
                    </form>
                </div>

                <div class="tab-body" data-id="inscription">
                    <span class="errorSignin"></span>

                    <form>
                        <div class="rowTab">
                            <i class="fas fa-passport"></i>
                            <input id="registerMatricule" type="text" class="input" placeholder="Matricule">
                        </div>
                        <div class="rowTab">
                            <i class="far fa-user"></i>
                            <input id="registerName" type="text" class="input" placeholder="Entrez votre Nom">
                        </div>
                        <div class="rowTab">
                            <i class="fas fa-lock"></i>
                            <input id="registerPassword" type="password" class="input" placeholder="Mot de Passe">
                        </div>
                        <div class="rowTab">
                            <i class="fas fa-lock"></i>
                            <input id="registerPasswordComfirm" type="password" class="input" placeholder="Confirmer Mot de Passe">
                        </div>
                   
                        <button class="btn inscription" type="button">Inscription</button>
                    </form>
                </div>

                <div class="tab-footer">
                    <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
                    <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>
                </div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <script defer type='module' src="{{asset('/js/loginReception.js')}}"></script>
    </body>
</html>
