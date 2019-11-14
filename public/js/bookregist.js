$(document).ready(inicio);

function inicio(){
    let registrar = $('.register');
    registrar.click(save);
}
function save(e){
    e.preventDefault();
    let nombre =$('.title').val();
    let genero =$('.gender').val();
    let autor =$('.author').val();
    let fecha =$('.date').val();
    let cantidad =$('.quantity').val();
        $.post("http://librando.local/books/", {
            title: nombre,
            gender_id: genero,
            date_public: fecha,
            author_id: autor,
            quantity: cantidad,
        })
        .done(function (books) {
                alert(`el libro ${nombre} se ha registrado con exito`);
        });
    }
