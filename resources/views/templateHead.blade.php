<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 title"> @yield('titlePage')</div>
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 listElement"> 
                <div class="teteLi">Liste des Elements d'analyse 
                </div> 
                <ul class="elementLi">
                <span class="quitter"> <img src="{{ asset('Images/x-lg.svg') }}"></span> 
                    <li> <span>A1 : </span> <em>Analyse de l'Au par plombeuse</em> </li>
                    <li><span>A2 : </span> <em>Analyse de l'Ag par fusion plombeuse</em> </li>
                    <li><span>A3 : </span> <em>Analyse du Cu par Analyse chimique</em> </li>
                    <li><span>A4 : </span> <em>Analyse du Mn par Analyse Chimique</em> </li>
                    <li><span>A5 : </span> <em>Analyse du Zn par Analyse Chimique</em> </li>
                    <li><span>A6 : </span> <em>Analyse Pb par Analyse Chimique</em> </li>
                    <li><span>A7 : </span> <em>Analyse du Fe par Analyse Chimique</em> </li>
                    <li><span>A8 : </span> <em>Analyse de l'Ag par Absorption Atomique flamme</em> </li>
                    <li><span>A9 : </span> <em>Analyse du Cu par Absorption Atomique flamme</em> </li>
                    <li><span>A10 : </span> <em>Analyse du Pb par Absorption Atomique flamme</em> </li>
                    <li><span>A11 : </span> <em>Analyse du Zn par Absorption Atomique flamme</em> </li>
                    <li><span>A12 : </span> <em>Analyse du Mn par Absorption Atomique flamme</em> </li>
                    <li><span>A13 : </span> <em>Analyse du Co par Absorption Atomique flamme</em> </li>
                    <li><span>A14 : </span> <em>Analyse du Ni par Absorption Atomique flamme</em> </li>
                    <li><span>A15 : </span> <em>Analyse du Fe par Absorption Atomique flamme</em> </li>
                    <li><span>A16 : </span> <em>Détermination de la teneur des majeurs (Al2O3, CaO...)</em> </li>
                    <li><span>A17 : </span> <em>Mesure de la Densité</em> </li>
                    <li><span>A18 : </span> <em>Analyse de l'Hg par ICP</em> </li>
                    <li><span>A19 : </span> <em>Détermination de la teneur des majeurs dans les argiles</em> </li>
                    <li><span>A20 : </span> <em>Analyse du Sb par ICP</em> </li>
                    <li><span>A21 : </span> <em>Analyse de la granulométrie</em> </li>
                    <li><span>A22 : </span> <em>Préparation mécanique des échantillons et détermination de l'humidité dans les échantillons issus des opérations d'échantillonnage</em> </li>
                    <li><span>A23 : </span> <em>Mesure de l'humidité</em> </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 EchantillonModification"> Modification</div>
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 logout"> Déconnexion</div>
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
