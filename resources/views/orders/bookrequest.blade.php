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
        <h1 clas="form-title">Pide un libro libro</h1>
        <form class="found form-wrapper fill user">
            <input name="title" class="title form-control fill" type="text" placeholder="titulo">
            <input name="date" class="date form-control fill" type="text" placeholder="fecha">

            <select name="gender" id="options" class="gender form-control fill">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>

            <select name="author" id="options" class="autor form-control fill">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <div class="button-wrapper">
            <button name="consult" class="consult  btn btn-primary">consultar</button>
            </div>
        </form>
    </div>
    <div class="reply"><h1>libros</h1>
        <a class='registro' href="/books/create">  libros </a>

        <table class="booklook book">
            <thead>
            <tr>
                <th></th>
                <th>titulo</th>
                <th>author</th>
                <th>fecha</th>
                <th>genero</th>
                <th>cantidad</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr class="boook">
                    <td>
                        <a href="/books/{{$book->id}}/edit" class="btn-icon"> <i class="fas fa-edit"></i></a>
                        <button class="btn-icon delete" data-id="{{$book->id}}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}}</td>
                    <td>{{$book->date_public}}</td>
                    <td>{{$book->gender->name}}</td>
                    <td>{{$book->quantity}}</td>
                    @if($book->status==1)
                    <td><button class="get btn btn-primary" data-indice="${i}" >pedir</button></td>
                        @elseif($book->status==5)
                        <td><button class="download btn btn-primary" data-indice="${i}" >proceso</button></td>
                        @elseif($book->status==2)
                        <td><button class="download btn btn-primary" data-indice="${i}" >agotado</button></td>
                        @elseif($book->status==3)
                        <td><button class="read btn btn-primary" data-indice="${i}" >leer</button></td>
                        @elseif($book->status==4)
                        <td><button class="download btn btn-primary" data-indice="${i}" disable>proceso</button></td>
                        @elseif($book->status==6)
                        <td><button class="download btn btn-primary" data-indice="${i}" >descontinuado</button></td>
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
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
                            if (book.status == 'liberado') {
                                let tabla = $(this).parent();
                                tabla.append(`<button class="download btn btn-" data-indice="${i}" >tomar</button>`)
                            } else if (book.status == 'rechazado') {
                                let tabla = $(this).parent();
                                tabla.append(`<button class="download" data-indice="${i}" disabled>alquilado</button>`)
                            }
                            i++;
                        }
                    });
            })
        }
        $('.get').click(()=>{
            let ind=$(this).data('indice');
            $.post({
                url: "http://librando.local/books",
                book_id:ind
            })
                .done(function (data) {
                    alert('libro pedido espara la respuesta de nuestros administradores');
                });
            })

    </script>
@endsection

