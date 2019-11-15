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
<header>
    <nav>
        <ul>
            <li><a href="/home">home</a></li>
            <li><a href="/books">libros</a></li>
            <li><a href="/registeradmin">registro de administrador</a></li>
        </ul>
    </nav>


        <form method="POST" action="/logout">
            @csrf
            <button type="submit">cerrar sesion</button>
        </form>

</header>
@endif

    @yield('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
