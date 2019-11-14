$(document).ready(inicio);
// funciones iniciales el sistema

// fucntiones de bindding de datos
// Registrar
function reg(e){
    e.preventDefault();
    if($(".password").val() != $(".confirm").val()){
        alert('la contraseña y la confirmacion no coinciden verifique e intenete nuevamente');
    }
            let usuario = $(".user").val();
            let apellido = $(".surname").val();
            let clave = $(".password").val();
            let email = $(".email").val();
            let ci = $(".ci").val();
            // hay que cambiar la ruta del post
        $.post("http://librando.local/register", {
                name: usuario,
                surmane: apellido,
                password: clave,
                email: email,
                id_card: ci,
            })
            .done(function (ladada) {
                alert(`usuario ${usuario} registrado con exito ahora puede hacer login e ingresar`);
            });

 }
// login

// activa el formulario login

// activa el formulario de registro

