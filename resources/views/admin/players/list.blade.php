<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{ url('public/images/LOGOCA.jpeg') }}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ !empty($header_title) ? $header_title : '' }} - Casino Black Wing</title>
  <link rel="stylesheet" href="{{ asset('public/dist/css/menu.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <title>Black Jack - ADMIN</title>
  <style>
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background-image: linear-gradient(to bottom, #FFD700, #708090);
      color: #1a1a1a;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .dark {
      color: #f5f5f5;
    }
    h1 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 2rem;
      font-family: 'Montserrat', sans-serif;
      color: white; /* Cambiar color a gris */
      opacity: 0;
      animation: fadeIn 5s forwards;
    }
    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }
    .container {
      background: #ffffff;
      padding: 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 90%;
      border: 4px solid #fbbf24;
      overflow-x: auto;
    }
    .dark .container {
      background: #3f3f46;
    }
    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1rem;
    }
    .header h2 {
      font-size: 1.25rem;
      font-weight: 600;
      color: white;
      font-family: 'Montserrat', sans-serif;
      opacity: 0;
      animation: fadeIn 1s forwards;
    }
    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }
    .header button,
    .action-buttons button {
      color: #ffffff;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
      transition: transform 0.3s ease-in-out;
    }
    .action-buttons .delete {
      background: #ef4444;
    }
    .header button:hover,
    .action-buttons button:hover {
      transform: scale(1.1) translateY(-10%);
    }
    @keyframes waterEffect {
      0% {
        transform: scale(1) translateY(0);
      }
      50% {
        transform: scale(1.15) translateY(-15%);
      }
      100% {
        transform: scale(1) translateY(0);
      }
    }
    .header button:hover,
    .action-buttons button:hover {
      animation: waterEffect 0.5s ease-in-out;
    }
    ul {
      list-style: none;
      padding: 0;
      margin: 0;
      overflow-y: auto;
      max-height: 60vh;
    }
    li {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.5rem 0;
      border-bottom: 1px solid #d4d4d8;
      flex-wrap: wrap;
      width: 100%;
    }
    .dark li {
      border-bottom: 1px solid #6b7280;
    }
    .user-info {
      display: flex;
      align-items: center;
      flex: 1;
      min-width: 200px;
    }
    .user-info img {
      height: 2.5rem;
      width: 2.5rem;
      border-radius: 50%;
      margin-right: 1rem;
    }
    .user-info span {
      font-weight: 600;
    }
    .action-buttons {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-right: 1rem; /* Añadir margen a la derecha */
    }
    .boton_regresar {
      background-color: #e2b04a;
      color: #fff;
      text-decoration: none;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
      font-weight: bold;
      font-family: 'Montserrat', sans-serif;
    }
    .boton_regresar:hover {
      background-color: #d4a03b;
    }

    .boton_regresar:active {
      background-color: #b88632;
    }
    /* Estilos del botón Agregar Jugador */
    .add-button {
      background: #28a745; /* Color verde */
    }

    /* Estilos del botón Editar Jugador */
    .edit-button {
      background: #fbbf24; /* Color amarillo */
    }
    
    /* Estilos de paginación */
    .pagination {
      display: none; /* Ocultar paginación */
    }

    .search-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-input {
      padding: 0.5rem;
      border-radius: 0.5rem;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .search-button {
      padding: 0.5rem 1rem;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      font-size: 1rem;
    }

    .search-button:hover {
      background-color: #218838;
    }

    /* Estilos de la ventana modal */
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
      color: white;
      font-weight: bold;
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
<body class="dark">
<h1>Usuarios Jugadores</h1>
  <div class="container">
    <div class="header">
      <a href="{{ url('admin/menu') }}" class="boton_regresar">&#10094;</a>
      <div class="search-container">
        <input type="text" class="search-input" id="search-input" placeholder="Buscar jugador...">
        <button class="add-button" onclick="window.location.href='{{ url('admin/players/add') }}'">Agregar Jugador</button>
      </div>
    </div>
    <ul id="player-list">
      @foreach ($getRecord as $user)
      <li>
        <div class="user-info">
          <img src="{{ url('public/user-profile/' . $user->user_photo) }}" alt="User Image">
          <span>{{ $user->name }} {{ $user->last_name }}</span>
        </div>
        <div class="action-buttons">
          <button class="edit-button" onclick="window.location.href='{{ url('admin/players/edit/' . $user->id) }}'">Editar Jugador</button>
          <button type="button" class="delete" onclick="showModal({{ $user->id }}, '{{ $user->name }} {{ $user->last_name }}')">Eliminar Jugador</button>
        </div>
      </li>
      @endforeach
    </ul>
  </div>

  <!-- Ventana modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <p>¿Estás seguro que deseas eliminar al jugador <span id="modal-player-name"></span>?</p>
      <div style="text-align: center; margin-top: 20px;">
        <button id="confirmDelete">OK</button>
        <button id="cancelDelete">Cancelar</button>
      </div>
    </div>
  </div>

  <script>
    // Obtener el modal
    var modal = document.getElementById("myModal");
    var modalPlayerName = document.getElementById("modal-player-name");

    // Obtener los botones del modal
    var confirmDeleteBtn = document.getElementById("confirmDelete");
    var cancelDeleteBtn = document.getElementById("cancelDelete");

    var deleteUserId = null;

    function showModal(userId, playerName) {
      modal.style.display = "block";
      deleteUserId = userId;
      modalPlayerName.textContent = playerName;

      confirmDeleteBtn.onclick = function() {
        deleteUser(deleteUserId);
      };

      cancelDeleteBtn.onclick = function() {
        modal.style.display = "none";
      };
    }

    function deleteUser(userId) {
      const csrfToken = "{{ csrf_token() }}";
      const url = "{{ url('admin/players/list') }}/" + userId;

      fetch(url, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken
        }
      })
      .then(response => {
        if (response.ok) {
          // Eliminar el elemento del DOM
          const playerList = document.getElementById('player-list');
          const playerElement = playerList.querySelector(`li .user-info span:contains("${userId}")`);
          if (playerElement) {
            playerElement.parentNode.parentNode.remove();
          }
          modal.style.display = "none";
        } else {
          console.error("Error al eliminar el jugador");
        }
      })
      .catch(error => {
        console.error("Error al realizar la solicitud:", error);
      });
    }

    // Búsqueda en tiempo real
    document.getElementById('search-input').addEventListener('input', function() {
      let query = this.value.toLowerCase();
      let playerList = document.getElementById('player-list');
      let players = playerList.getElementsByTagName('li');

      Array.from(players).forEach(function(player) {
        let playerName = player.querySelector('.user-info span').textContent.toLowerCase();
        if (playerName.includes(query)) {
          player.style.display = '';
        } else {
          player.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>

