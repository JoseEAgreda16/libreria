@extends('layouts.base')

@section('content')

    <header>
        <div class="username"></div>
    </header>
    <div class="main-container">
        <h1>registro de administrador</h1>
        <form class="regist">
                <input name="name" class="name" type="text" placeholder="nombre" required>
                <input name="surname" class="surname" type="text"placeholder="apellido" required>
                <input name="pasword" class="password" type="text" placeholder="password" required>
                <input name="confirm" class="confirm" type="text" placeholder="confirmacion" required>
                <input name="ci" class="ci" type="text" placeholder="ci" required>
                <input name="email" class="email" type="text" placeholder="email" required>
                <button name="submit" class="submit">registrar</button>
        </form>
    </div>
        <aside class="reply"></aside>
        @section('js')
    <script>
    $(document).ready(inicio);

    function inicio(){
    let registraradmin = $('.submit');
    registraradmin.click(save);
    }
    function save(e){
        e.prevenDefault();
    let nombre =$('.name').val();
    let apellido =$('.surname').val();
    let email =$('.email').val();
    let clave =$('.password').val();
    let clave2 =$('.confirm').val();
    $.post("http://librando.local/registeradmin/", {
    title: nombre,
    surname: apellido,
    email: email,
    password: clave,
    password_confirm: clave2,
    })
    .done(function (books) {
    alert(`el usuario ${nombre} se ha registrado con exito`);
    });
    }
    </script>
    @endsection
@endsection
