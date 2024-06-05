
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{url('public/images/LOGOCA.jpeg')}}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{!empty($header_title) ? $header_title : ''}} - Casino Black Wing</title>
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
    /* Estilos del botón Agregar Administrador */
    .add-button {
      background: #28a745; /* Color verde */
    }

    /* Estilos del botón Editar Administrador */
    .edit-button {
      background: #fbbf24; /* Color amarillo */
    }


	/* Estilos de paginación */
    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 1rem;
    }
    .pagination li {
      margin: 0 5px;
      display: inline-block;
    }
    .pagination li a {
      padding: 5px 10px;
      
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s;
	  background-color: #e2b04a;
    }
    .pagination li a:hover {
		background-color: #fbbf24;
    }


    .pagination-container {
  display: flex;
  justify-content: center;
  margin-top: 1rem;
}


  </style>
</head>
<body class="dark">
  <h1>Usuarios Administradores</h1>
  <div class="container">
    <div class="header">
      <a href="{{ url('admin/menu') }}" class="boton_regresar">&#10094;</a>
      
      <button class="add-button" onclick="window.location.href='{{ url('admin/admin/add') }}'">Agregar Administrador</button>
    </div>
    <ul>
      @foreach($getRecord as $admin)
      <li>
        <div class="user-info">
          <img src="{{ url('public/user-profile/' . $admin->user_photo) }}" alt="User Image">
          <span>{{ $admin->name }} {{ $admin->last_name }}</span>
        </div>
        <div class="action-buttons">
          <button class="edit-button" onclick="window.location.href='{{ url('admin/admin/edit/' . $admin->id) }}'">Editar Administrador</button>
          <form action="{{ url('admin/admin/list/' . $admin->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete" onclick="return confirm('¿Estas seguro que desea eliminar el administrador?')">Eliminar Administrador</button>
			</form>
        </div>
      </li>
      @endforeach
    </ul>
	<div class="pagination-container">
    {{ $getRecord->links() }}
  </div>
  </div>
</body>
</html>
