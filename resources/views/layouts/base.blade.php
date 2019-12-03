<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2e5aeb2f40.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')

    <title>librando</title>
</head>
<body>
@if(Auth::check())
<header class="header">
    <span class="logo">LIBRANDO</span>
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
            <div class="button-wrapper">
            <button type="submit" class=" submit cerrar btn btn-primary">cerrar sesion</button>
            </div>
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
<footer></footer>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<footer>
    <i class="fab fa-facebook-f btn-icon solcialnetworks"></i>
    <i class="fab fa-twitter btn-icon solcialnetworks"></i>
    <i class="fab fa-instagram btn-icon solcialnetworks"></i>
</footer>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
