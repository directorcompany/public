<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    @if(session('city'))
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('about',['city'=> session('city')->slug]) }}">О нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('news', ['city'=>session('city')->slug]) }}">Новости</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endif
<main class="container">
  <header class="my-2">
      <h5>Выбранный город: {{ session('city')->name ?? 'Не выбран' }}</h5>
    </header>
    @if(session('store'))
    <div class="alert alert-success" role="alert">
      {{ session()->pull('store') }} 
  </div>
  @elseif(session('delete'))
  <div class="alert alert-danger" role="alert">
    {{ session()->pull('delete') }} 
  </div>
  @endif
   @if(!request()->is('city/store'))
  <a href="{{route('store')}}" class="btn btn-primary">Добавить</a>
  @endif

  <a href="{{ route('home') }}">Вернуться к списку городов</a>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>