@extends('layouts.base')

@section('content')
<body>
    <header>
        <div class="username"></div>
    </header>
    <div class="main-container">
        <h1>registro de administrador</h1>
        <form class="regist">
                <input class="name" type="text" placeholder="nombre">
                <input class="surname" type="text"placeholder="apellido">
                <input class="password" type="text" placeholder="password">
                <input class="ci" type="text" placeholder="ci">
                <input class="email" type="text" placeholder="email">
                <button class="submit">registrar</button>
        </form>
    </div>
        <aside class="reply"></aside>
        @section('js')
    <script src="{{asset('js/adminregist.js')}}"></script>
    @endsection
</body>
@endsection
