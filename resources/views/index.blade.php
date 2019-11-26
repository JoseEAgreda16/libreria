@extends('layouts.base')

@section('content')
    <header>
         <div class="title"><h1>Librando<h1></div>
            <nav class="options">
                <a href="/login">iniciar sesion usuario</a>
                <a href="/register">registrar nuevo usuario</a>
            </nav>
    </header>
     <div class="main-container">
         <div class="preview-content">
             <h2 class="content-title">Librando</h2>
                <p class="intruccions">buenvenido al sistema Librando labiblioteca en linea que te permitira de forma gratuita aceder a contenido de tu interes gratis para acceder a contenido registrate</p>

                <h3>¿eres administrador?</h3>
                <p class="intruccions"> ingresa como admin  colabora con nosotros en la aplicacion para que podamos ampliar nuestrar barreras a la informacion gratuita</p>
         </div>
     </div>
@endsection

@section('js')
<script src="{{ asset('js/users.js') }}"></script>
@endsection
