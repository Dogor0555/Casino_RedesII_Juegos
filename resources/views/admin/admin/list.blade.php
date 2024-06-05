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
      font-family: Arial, sans-serif;
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
      color: #fbbf24;
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
    }
    .header button {
      background: #fbbf24;
      color: #ffffff;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      border: none;
      cursor: pointer;
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
    }
    .action-buttons button {
      background: #fbbf24;
      color: #ffffff;
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      border: none;
      cursor: pointer;
    }
    .action-buttons .delete {
      background: #ef4444;
    }
  </style>
</head>
<body class="dark">
  <h1>User Management</h1>
  <div class="container">
    <div class="header">
      <h2>Lista de Administrado</h2>
      <button onclick="window.location.href='{{ url('admin/players/add') }}'">Add Admin</button>
    </div>
    <ul>
      @foreach($getRecord as $admin)
        <li>
          <div class="user-info">
            <img src="{{ url('public/user-profile/' . $admin->user_photo) }}" alt="User Image">
            <span>{{ $admin->name }} {{ $admin->last_name }}</span>
          </div>
          <div class="action-buttons">
            <button onclick="window.location.href='{{ url('admin/players/edit/' . $admin->id) }}'">Edit</button>
            <form action="{{ url('admin/players/delete/' . $admin->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</button>
            </form>
          </div>
        </li>
      @endforeach
    </ul>
    {{ $getRecord->links() }}
  </div>
</body>
</html>
