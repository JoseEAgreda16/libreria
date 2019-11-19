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
        .replay{
            width:400px;
            height:400px;
        }
    </style>
@endsection

@section('content')
    <header>
        <div class="username">{{}}</div>
    </header>
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
                @foreach($genders as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>

            <input name="quantity" class="quantity" type="text" placeholder="cantidad">

            <button name="consult" class="consult">consultar</button>
            <button name="pedir" class="pedir">pedir</button>
        </form>
    </div>
    <div class="reply"></div>
@endsection

@section('js')
    <script>
        $(document).ready(inicio);

        function inicio(){
            let consultar = $('.found');
            consultar.click(request);
        }
        function request(){
            let nombre =$('.title').val();
            let genero =$('.gender').val();
            let autor =$('.author').val();
            let fecha =$('.date').val();
            let cantidad =$('.quantity').val();

            let params = `?title=${nombre || ''}&genres_id=${genero || ''}&author_id=${autor || ''}&date_public=${fecha ||''}&quantity=${cantidad ||''}`;

            $.get("http://librando.local/books" + params)
                .done(function (books) {
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
                        if(book.status == 'liberado'){
                            let tabla =$(this).parent();
                            tabla.append(`<button class="download" data-indice="${i}" >tomar</button>`)
                        }else if(book.status == 'pedido') {
                            let tabla = $(this).parent();
                            tabla.append(`<button class="download" data-indice="${i}" disabled>alquilado</button>`)
                        }
                        i++;
                    }
                });
        }
    </script>
@endsection

