var document =$(document);
document.ready(inicio);

function inicio(){
    let registraradmin = $('.submit');
    registraradmin.click(save);
}
function save(){
    let nombre =$('.name').val();
    let apellido =$('.surname').val();
    let email =$('.email').val();
    let clave =$('.password').val();
    let clave =$('.password').val();
        $.post("http://librando.local/registeradmin/", {
            title: nombre,
            surname: apellido,
            email: email,
            password: clave,
            password_confirm: clave,
        })
        .done(function (books) {
                alert(`el usuario ${nombre} se ha registrado con exito`);
        });
    }
