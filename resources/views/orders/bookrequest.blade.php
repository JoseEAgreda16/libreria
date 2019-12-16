@extends('layouts.base')

@section('content')

    <div class="table-wrapper">
        <div class="reply">
            <h1 class="title-form">libros disponibles</h1>
            <h2 class="title-form">¡Pide un libro libro!</h2>
        <form class="found form-wrapper fill user">
            <input name="title" class="title form-control fill" type="text" placeholder="titulo">
            <input name="date" class="date form-control fill" type="text" placeholder="fecha">

            <select name="gender" id="options" class="gender form-control fill">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>

            <select name="author" id="options" class="author form-control fill">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <div class="button-wrapper">
            <button name="consult" class="consult  btn btn-primary">consultar</button>

            </div>
        </form>


        <table class=" table-wrapper booklook book">
            <thead>
            <tr>
                <th>titulo</th>
                <th>author</th>
                <th>genero</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr class="boook">
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}}</td>
                    <td>{{$book->gender->name}}</td>
                    {{--liberado--}}
                    <td><button class="get btn btn-second order" data-indice="{{$book->id}}" >pedir</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(inicio);

        function inicio() {
            let consultar = $('.consult');
            consultar.click(() => {

                let nombre = $('.title').val();
                let genero = $('.gender').val();
                let autor = $('.author').val();
                let fecha = $('.date').val();

                let params = `?title=${nombre || ''}&genres_id=${genero || ''}&author_id=${autor || ''}&date_public=${fecha || ''}`;

                $.get("http://librando.local/books" + params)
                    .done((books) => {
                        console.log(books + 'este es el objeto que me estoy trayendo');
                        let i = 0;
                        for (let book of books) {
                            $(".main-container").append(`<table class="reply">
                        <tr class="boook" Id="${i}">
                            <td class="name">${book.title}</td>
                            <td class="gender">${book.genres_id}</td>
                            <td class="date">${book.datePublic}</td>
                            <td class="date">${book.author_id}</td>
                            <td class="">${book.quantity}</td>
                        </tr>
                        </table>`);
                            if (book.status_id == 1) {
                                let tabla = $(this).parent();
                                tabla.append(`<button class="download btn btn-" data-indice="${i}" >tomar</button>`)
                            } else if (book.status_id == 3) {
                                let tabla = $(this).parent();
                                tabla.append(`<button class="download" data-indice="${i}" disabled>alquilado</button>`)
                            }
                            i++;
                        }
                    });
            })
        }
        //funciones naturles de la pigina pedir,leer,etc
        $('.get').click(function(){
            let ind=$(this).data('indice');
            console.log(ind);
            $.post("http://librando.local/order",
            {book_id:ind}
            )
                .done( (data)=> {
                    alert('libro pedido, espara la respuesta de nuestros administradores');
                    $(this).prop('disabled',true);
                    $(this).css("background-color", "grey");
                })
                .fail(()=>{
                    alert('hubo un error con el servidor intentelo nuevamente mas tarde');
                });
            });
        $('.read').click(()=>{
            let ind=$(this).data('indice');

            $.get({
                url: "http://librando.local/books",
                book_id:ind
            })
                .done(function (data) {
                    alert(`Ven a retirar tu libro! con el sigiente codigo de pedido ${data}`);
                });
        });
        $('.molon').click(()=>{
                    alert(`cuando los botones molen tendran funciones`);
        });

    </script>
@endsection

