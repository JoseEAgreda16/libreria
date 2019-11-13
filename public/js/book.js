var document = $(document);
document.ready(inicio);

function inicio(){
    let consulta = $('.name');
    consulta.click(scout);
}
function scout(e){
e.preventDefault();
let nombre = $('.name-book').val();
let genero = $('.genero').val();
let fecha = $('.autor').val();
let autor = $('.autor').val();
let cantidad = $('.quantity').val();
$.post("http://librando.local/books/", {
    title: nombre,
    geners_id: genero,
    date_public: fecha,
    author_id: autor,
    quantity: cantidad,
})
.done(function (object) {
        let object=object
            let i = 0;
            for (let object of resultado) {
                $(".main-container").append(`<table class="table">
                <tr class="book" Id="${i}">
                <td class="name">${object.title}</td>
                <td class="gender">${object.genderId}</td>
                <td class="date">${object.fechPublic}</td>
                <td class="date">${object.authorId}</td>
                <td class="">${object.quantity}</td>
                    <button class="reject" data-indice="${i}" hidden>rechazar</button>
                    <button class="aceppt" data-indice="${i}" hidden>aceptar</button>
                    <button class="alert" data-indice="${i}" hidden>pedir de vuelta</button>
                    </tr>
                    </table>`);
                i++;
                }
});
}
// funcion rechazar
// aceptar




