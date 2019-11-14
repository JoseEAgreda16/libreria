var document =$(document);
document.ready(inicio);

function inicio(){
    let consultar = $('.consult');
    consultar.click(consult);
    let pedir = $('.pedir');
    pedir.click(request);
}
function consultar(){
    let nombre =$('.title').val();
    let genero =$('.gender').val();
    let autor =$('.author').val();
    let fecha =$('.date').val();
    let cantidad =$('.quantity').val();
        $.post("./loger.php", {
            title: nombre,
            genderId: genero,
            fechPublic: fecha,
            authorId: autor,
            quantity: cantidad,
        })
        .done(function (books) {
                let i = 0;
                for (let book of books) {
                    $(".main-container").append(`<table class="table">
                    <tr class="book" Id="${i}">
                            <td class="name">${book.title}</td>
                            <td class="gender">${book.genderId}</td>
                            <td class="date">${book.fechPublic}</td>
                            <td class="date">${book.authorId}</td>
                            <td class="">${book.quantity}</td>
                        <button class="pedir" data-indice="${i}" hidden>pedir</button>
                        </tr>
                        </table>`);
                        if(book.status == 'liberado'){
                            let tabla =$(this).parent();
                            tabla.append(`<button class="download" data-indice="${i}" hidden>pedir</button>`)
                        }
                    i++;
                    }
    });
}
