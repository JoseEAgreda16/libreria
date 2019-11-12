var document =$(document);
document.ready(inicio);

function inicio(){
    let registraradmin = $('.registad');
    registraradmin.click(save);
}
function save(){
    let nombre =$('.name').val();
    let apellido =$('.surname').val();
    let email =$('.email').val();
    let clave =$('.password').val();
        $.post("http://librando.local/register/", {
            title: nombre,
            surname: apellido,
            email: email,
            password: clave,
            rol_id:2,
        })
        .done(function (books) {
                alert(`el usuario ${nombre} se ha registrado con exito`);
        });
    }
