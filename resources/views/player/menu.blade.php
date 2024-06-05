<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{url('public/images/LOGOCA.jpeg')}}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{!empty($header_title) ? $header_title : ''}} - Casino Black Wing</title>
  <link rel="stylesheet" href="{{ asset('public/dist/css/menu.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <title>Black Jack</title>
 
 <style>
  .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: Green;
  margin: 8% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 300px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  color: white; /* Color de las letras */
  font-weight: bold; /* Negrita */
}

.modal button {
  background-color: #fbbf24;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
}

.modal button:hover {
  background-color: #e2b04a;
}

.modal button:active {
  background-color: #d4a03b;
}
</style>
</head>
<body>
  <div class="navbar">
    <div class="profile">
      <img src="{{url('public/user-profile/' . Auth::user()->user_photo)}}" class="img-circle elevation-2 rounded-circle" alt="User Image">
      <a href="{{url('player/perfil')}}" class="user-name">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
    </div>
    <a href="{{url('logout')}}" class="logout-button">Cerrar Sesión</a>
  </div>

  <div class="menu">
    <div class="menu-item">
      <a href="#" class="nav-link @if(Request::segment(2) == 'player') active @endif" onclick="openModal()">
        <i class="nav-icon far fa-user"></i>
        VE A JUGAR!!
      </a>
    </div>
    <div class="menu-item">
      <a href="{{url('player/puntajes')}}" class="nav-link @if(Request::segment(2) == 'player') active @endif">
        <i class="nav-icon far fa-user"></i>
        PUNTAJES
      </a>
    </div>
  </div>

  <!-- Ventana modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <p>Usarás 1 de tus 5 intentos disponibles para jugar.</p>
      <button onclick="closeModal()">OK</button>
    </div>
  </div>

  <script>
    function openModal() {
      // Obtener el número de intentos del usuario
      var gamesPlayed = {{ Auth::user()->games_played }};

      // Verificar si el usuario ha alcanzado el límite de intentos
      if (gamesPlayed < 5) {
        // Mostrar la ventana modal
        document.getElementById('myModal').style.display = "block";
      } else {
        // Si ha alcanzado el límite, redirigir al usuario directamente al juego
        window.location.href = "{{url('player/game')}}";
      }
    }

    function closeModal() {
      // Cerrar la ventana modal
      document.getElementById('myModal').style.display = "none";
      
      // Redirigir al usuario al juego
      window.location.href = "{{url('player/game')}}";
    }
  </script>
</body>
</html>
