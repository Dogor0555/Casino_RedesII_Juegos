<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="{{url('public/images/LOGOCA.jpeg')}}" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{!empty($header_title) ? $header_title : ''}} - Casino Black Wing</title>
  <link rel="stylesheet" href="{{ asset('public/dist/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <title>Black Jack</title>


</head>

<body>  

    <nav class="navbar">
        <div class="nav-button">
          <a href="{{ url('player/menu') }}" class="boton_regresar">&#10094;</a>
        </div>
         <div class="logo-container">
            <a alt="21 Black Jack" class="logo">21 - BLACKJACK</a>
        </div>
        <div class="attempts-info">
            Coins Restantes: {{ 5 - Auth::user()->games_played }}
        </div>
        <div class="user-info">
    <img src="{{url('public/user-profile/' . Auth::user()->user_photo)}}" alt="User" class="user-avatar">
    <span class="username">{{ Auth::user()->name }} {{ Auth::user()->last_name }} </span>
        </div>
    </nav>



 <div id="canvasDiv"><canvas id="canvas"></canvas></div>
<div class="botones">
  <input type="button" value="Pedir Carta" onclick="pedirCarta()" id="pedir" class="action-button">
  <input type="button" value="Jugar otra vez!" id="reset" onclick="playagain()" class="action-button">
  <input type="button" value="Quedarme aquí" onclick="plantarme()" id="plantar" class="action-button">
</div>

<div id="info" class="hidden"></div>
<div id="infor"></div>


    <script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script type="text/javascript" src="{{ asset('public/dist/js/blackJack.js') }}"></script>
    <input type="hidden" id="rutaimagescarta" value="{{ asset('public') }}">
    <input type="hidden" value="{{route("guardarPuntaje")}}" id="rutaGuardarPuntaje"/>
    <input type="hidden" value="{{csrf_token()}}" id="_token"/>
    <script type="text/javascript">
      let table = new DataTable('#tablaPuntajes');

      var gamesPlayed = {{ $gamesPlayed }};
        var maxGames = 5;

        if (gamesPlayed >= maxGames) {
            // Crear el mensaje
    var limitMessage = document.createElement('div');
    limitMessage.classList.add('limit-message');
    limitMessage.textContent = '¡Ya has superado tu límite de intentos!';

    // Obtener el contenedor donde se mostrará el mensaje
    var limitMessageContainer = document.getElementById('infor');

    // Insertar el mensaje dentro del contenedor
    limitMessageContainer.appendChild(limitMessage);
        }

        document.addEventListener('DOMContentLoaded', function() {
    // Obtener el número de intentos del usuario desde el servidor
    var gamesPlayed = <?php echo Auth::user()->games_played; ?>;

    // Obtener referencias a los botones relevantes
    var pedirCartaButton = document.getElementById('pedir');
    var jugarOtraVezButton = document.getElementById('reset');
    var plantarButton = document.getElementById('plantar');

    // Verificar si se alcanzó el límite de intentos y desactivar los botones si es necesario
    if (gamesPlayed >= 5) {
        pedirCartaButton.disabled = true;
        jugarOtraVezButton.disabled = true;
        plantarButton.disabled = true;
    }
});
      
    </script>
 
</body>
</html>
