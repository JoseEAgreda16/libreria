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
        <h1>edite el campo</h1>
        <form class="found">
            <input name="title" class="title" type="text" placeholder="titulo" value="{{book.title}}">
            <input name="genres_id" class="gender" type="text" placeholder="titulo" value="{{book.genres_id}}">
            <input name="date_public" class="date" type="text" placeholder="titulo" value="{{book.date_public}}">
            <input name="author_id" class="author" type="text" placeholder="titulo" value="{{book.author_id}}">
            <button name="edit" class="edit">editar</button>
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

            let params = `?title=${nombre || ''}&genres_id=${genero || ''}&author_id=${autor || ''}&date_public=${fecha ||''}`;

            $.get("http://librando.local/books" + params)
                .done(function (books) {
                    let i = 0;
                    for (let book of books) {
                        $(".main-container").append(`<table class="reply">
                    <tr class="book" Id="${i}">
                            <td class="name">${book.title}</td>
                            <td class="gender">${book.genres_id}</td>
                            <td class="date">${book.date_public}</td>
                            <td class="author">${book.author_id}</td>
                            <td class="quantity">${book.quantity}</td>
                            <button class="edit" data-indice="${i}" >editar</button>
                        </tr>
                        </table>`);
                        $('edit').click(
                        function Edit(e) {
                            $('name').val(book.title);
                            $('gender').val(book.genres_id);
                            $('date').val(data.record.unidadMedida);
                            $('author').val(data.record.descripcion);
                            $('quantity').val(data.record.condicion);

                        }
                        i++;
                    }
                });
        }
    </script>
@endsection

