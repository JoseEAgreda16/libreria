@extends('layouts.base')

@section('style')
    <style>
        html,body{
            margin:0;
            padding:0;
        }
        .found{
            display:list-item;
        }
        .reply{
            width:400px;
            height:400px;
        }
    </style>
@endsection

@section('content')
    <div class="main-container">
        <h1>Pide un libro libro</h1>
        <form class="found">
            <input name="title" class="title" type="text" placeholder="titulo">
            <input name="date" class="date" type="text" placeholder="fecha">

            <select name="gender" id="options" class="gender">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>

            <select name="author" id="options" class="autor">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>

            <button name="consult" class="consult">consultar</button>
            <button name="pedir" class="pedir">pedir</button>
        </form>
    </div>
    <div class="reply"></div>
@endsection

@section('js')
    <script>
        $(document).ready(inicio);

        function inicio() {
            let consultar = $('.found');
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
                        <tr class="book" Id="${i}">
                            <td class="name">${book.title}</td>
                            <td class="gender">${book.genres_id}</td>
                            <td class="date">${book.datePublic}</td>
                            <td class="date">${book.author_id}</td>
                            <td class="">${book.quantity}</td>
                        </tr>
                        </table>`);
                            if (book.status == 'liberado') {
                                let tabla = $(this).parent();
                                tabla.append(`<button class="download btn btn-" data-indice="${i}" >tomar</button>`)
                            } else if (book.status == 'pedido') {
                                let tabla = $(this).parent();
                                tabla.append(`<button class="download" data-indice="${i}" disabled>alquilado</button>`)
                            }
                            i++;
                        }
                    });
            })
        }
    </script>
@endsection

