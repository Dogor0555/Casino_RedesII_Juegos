<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{!empty($header_title) ? $header_title : ''}} - Casino Black Wing</title>
  <link rel="stylesheet" href="{{ asset('public/dist/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <title>Black Jack</title>
</head>
<body>
  <div id="title">Juego</div>
  <div id="canvasDiv"><canvas id="canvas"></canvas></div>
  <div id="botones">
    <input type="button" value="Pedir Carta" onclick="pedirCarta()" id="pedir" class="button">
    <input type="button" value="Jugar otra vez!" id="reset" onclick="playagain()" class="button">
    <input type="button" value="Plantarme" onclick="plantarme()" id="plantar" class="button">
  </div>
  <div id="info" class="hidden"></div>


  <li class="nav-item">
    <a href="{{url('logout')}}" class="nav-link">
      <i class="nav-icon fas fa-sign-out-alt"></i>
      <p>Cerrar Sesión</p>
    </a>
  </li>
  <script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('public/dist/js/blackJack.js') }}"></script>
  <input type="hidden" id="rutaimagescarta" value="{{ asset('public') }}">
</body>
</html>