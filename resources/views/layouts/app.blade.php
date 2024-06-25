<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>slip.web.id</title>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
  <script src="{{ asset('build/assets/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/0901de813d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</head>

<body>
  <div id="app">
    @include('layouts.nav')
    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>

</html>