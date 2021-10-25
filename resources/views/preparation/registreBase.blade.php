<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('css/baseLabo.css')}}">
<link rel="stylesheet" href="{{asset('css/preparation/registre.css')}}">

<script src="https://kit.fontawesome.com/887c56acc8.js" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-icon-top navbar-expand-lg">
  @yield('titlePage')
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
   
    </ul>
    <ul class="navbar-nav ">
    <li class="nav-item">
         <a href="#"><button class="btn ">Afficher</button></a>
      </li>
      <li class="nav-item">
          <h2>@yield('registreName')</h2> 
      </li>
    </ul>
 
  </div>
</nav>
@yield('content')


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer type='module' src="{{asset('/js/loginReception.js')}}"></script>
<script defer type='module' src="{{asset('/js/registres/registreHumidite.js')}}"></script>