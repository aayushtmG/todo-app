<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  @vite('resources/css/app.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <title>Todo App</title>
</head>
<body>
  <header class=" shadow-md p-4">
    <h3 class="text-center text-5xl flex-1 font-['Bungee'] tracking-wider">Todo List</h3>
    <nav class="float-right -translate-y-9 -translate-x-10">
      @guest
      <ul class="flex gap-8 text-xl font-medium">
        <li><a href="{{ route("login")}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
      </ul>
      @endguest
      @auth
      <ul class="flex gap-4 text-xl font-medium">
        <p>{{auth()->user()->name}},</p>
        <li>
          <form action="{{route('logout')}}" method="POST">
            @csrf
          <button type="submit">Logout</button>
          </form></li>
      </ul>
      @endauth
    </nav>
  </header >

  <main>
    @yield('content')
  </main>
  
</body>
<script>

function editTodo(id){
  let todo = document.getElementById('todo'+id);
  todo.removeAttribute('disabled');
  todo.focus();
}
function removeFocus(event){
  let todo = event.target;
  let id = todo.id.slice(4);
  todo.setAttribute('disabled','disabled');
      fetch(`/alltodos/${id}/update`, {
          method: 'POST',
           headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="_token"]').getAttribute('content')
          },
          body: JSON.stringify({ inputValue: todo.value })
      })
      .catch(error => {
          console.error('Error:', error);
      });
}

</script>
</html>