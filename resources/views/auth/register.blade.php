@extends('layouts.base')

@section('content')
<form class="regist">
    <div class="form-content">
        <h2 class="title-form">Registrar</h2>
            <input  name="user" class="user" placeholder="ingrese el username" required>
            <input  name="surname" class="surname" placeholder="ingrese el apellido" required>
            <input  name="password" class="password" placeholder="ingrese el password" required>
            <input  name="confirm" class="confirm" placeholder="confirmar contraseña" required>
            <input  name="ci" class="ci" placeholder="ci" required>
            <input  name="email" class="email" placeholder="email" required>
        <button class="submit">registrar</button>
    </div>
</form>
@endsection
@section('js')
    <script>
        $('.submit').click(function (e) {
            e.preventDefault();
            if ($(".password").val() != $(".confirm").val()) {
                alert('la contraseña y la confirmacion no coinciden verifique e intenete nuevamente');
            }
            let usuario = $(".user").val();
            let apellido = $(".surname").val();
            let clave = $(".password").val();
            let clave2 = $(".comfirm").val();
            let email = $(".email").val();
            let ci = $(".ci").val();
            // hay que cambiar la ruta del post
            $.post("http://librando.local/register", {
                name: usuario,
                surname: apellido,
                password: clave,
                password_confirmation: clave2,
                email: email,
                id_card: ci,
            })
                .done(function (ladada) {
                    alert(`usuario ${usuario} registrado con exito ahora puede hacer login e ingresar`);

                });
        });
    </script>
@endsection
