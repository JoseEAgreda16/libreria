@extends('layouts.base')

@section('style')
    <style>
        .filter{
            text-align:center;
            display:flex;
            height:40px;
        }
        .filter > input{
            width:20%;
            height:30px;
            margin-right:10px;
        }
        .registro{
            margin-right:15px;
            text-decoration: none;
        }
        .registadmin{
            margin-left:15px;
            text-decoration: none;
        }
    </style>
    @endsection
@section('content')
    <header>
        <h2>bienvenido a la gestion de libros</h2>
        <nav>
        <a class='registro' href="/book/add">registro de libros </a>
        <a class='registadmin' href="/registeradmin">registro de administrador</a>
        </nav>
        <div class="filter">
            <input name="name" class="name-book" type="text" placeholder="nombre">
            <input name="genero" class="genero" type="text" placeholder="genero">
            <input name="autor" class="autor" type="text" placeholder="autor">
            <input name="fecha" class="fecha" type="text" placeholder="fecha">
            <button name="found" class="found">filrar</button>
       </div>
       <div class="main-container">

      </div>
    </header>
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

            let params = `?title=${nombre || ''}&genres_id=${genero}&author_id=${autor}&date_public=${fecha}&quantity=${cantidad}`;

            $.get("http://librando.local/books" + params)
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
        </script>
    @endsection

