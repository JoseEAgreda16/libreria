<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')

    <title>librando</title>
</head>
<body>
@if(Auth::check())
<header class="header">
    <nav class="main-menu">
        <ul class="menu">
            <li><a class="link" href="/orders">Pedidos</a></li>
            <li><a  class="link" href="/books">libros</a></li>
            <li><a class="link"  href="/registeradmin">Registrar administrador</a></li>
            <li><a  class="link"  href="/authors">Autores </a></li>
            <li><a  class="link"  href="/genders">Genero </a></li>
        </ul>
    </nav>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit">cerrar sesion</button>
        </form>

</header>
    @else
    <header class="header">
        <span class="logo">LIBRANDO</span>
        <nav class="main-menu">
            <ul class="menu">
                <li><a class="link" href="/login">iniciar sesion usuario</a></li>
                <li><a class="link" href="/register">registrar nuevo usuario</a></li>
            </ul>
        </nav>
    </header>
@endif
    <div class="main-container">
        @yield('content')
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
