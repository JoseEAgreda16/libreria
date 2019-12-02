@extends('layouts.base')

@section('content')
    <div class="main-container">
        <h2 class="title-form">registro de administrador</h2>
        <form class="regist form-wrapper">
                <input name="name" class="form-control name" type="text" placeholder="nombre" required>
                <input name="surname" class="form-control surname" type="text"placeholder="apellido" required>
                <input name="pasword" class="form-control password" type="password" placeholder="password" required>
                <input name="confirm" class="form-control confirm" type="password" placeholder="confirmacion" required>
                <input name="ci" class="form-control ci" type="text" placeholder="ci" required>
                <input name="email" class="form-control email" type="text" placeholder="email" required>
                <div class="button-wrapper">
                <button name="submit" class="submit btn btn-primary">registrar</button>
            </div>
        </form>
    </div>
        <aside class="reply"></aside>
@endsection
        @section('js')
    <script>
    $(document).ready(inicio);

    function inicio(){
    let registraradmin = $('.submit');
    registraradmin.click(save);
    }
    function save(e){
        e.preventDefault();
    let nombre =$('.name').val();
    let apellido =$('.surname').val();
    let email =$('.email').val();
    let ci =$('.ci').val();
    let clave =$('.password').val();
    let clave2 =$('.confirm').val();
    $.post("http://librando.local/registeradmin", {
    name: nombre,
    surname: apellido,
    email: email,
    id_card:ci,
    password: clave,
    password_confirm: clave2,
    })
    .done(function (books) {
    alert(`el usuario admin ${nombre} se ha registrado con exito`);
    });
    }
    </script>
    @endsection

