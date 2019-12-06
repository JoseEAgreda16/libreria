@extends('layouts.base')

@section('content')
    <div class="form-container">
        <h1 class="title-form">Registrar</h1>

        <form class="regist-form form-wrapper">
            <input  name="user" class="form-control user" placeholder="ingrese el username" required>
            <input  name="surname" class="form-control surname" placeholder="ingrese el apellido" required>
            <input  name="password" class="form-control password" placeholder="ingrese el password" type="password" required>
            <input  name="confirm" class="form-control confirm" placeholder="confirmar contraseña" type="password" required>
            <input  name="ci" class="form-control ci" placeholder="ci" required>
            <input  name="email" class="form-control email" placeholder="email" required>

            <div class="button-wrapper">
                <button class="btn btn-primary submit">registrar</button>
            </div>
        </form>
    </div>
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
                    window.location="/request"

                })
                .fail(xhr => {
                    const errors = xhr.responseJSON.errors;

                    if (errors.id_card) {
                        alert('la cedula ya fue registrada');
                    } else if (errors.email) {
                        alert('el email ya ha sido registrado');
                    }
                });
        });
    </script>
@endsection
