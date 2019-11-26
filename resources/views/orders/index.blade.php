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
        <h2>Bienvenido a la gestion de Pedidos de libros</h2>
        <div class="filter">
            <input type="select" name="name" class="name-book" type="text" placeholder="nombre">
            <select name="generos" id="options" class="gender">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <select name="autor" id="options" class="autor">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <input name="fecha" class="fecha" type="text" placeholder="fecha">
            <button name="found" class="found">filrar</button>
       </div>
       <div class="main-container">

      </div>
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
                    console.log(books);
                    let i = 0;
                    for (let book of books) {
                        $(".main-container").append(`<table class="table">
                    <tr class="book" Id="${i}">
                            <td class="name">${book.title}</td>
                            <td class="gender">${book.genderId}</td>
                            <td class="date">${book.datePublic}</td>
                            <td class="date">${book.authorId}</td>
                            <td class="">${book.quantity}</td>
                            <td class="">${book.status_id}</td>
                    </tr>
                        </table>`);
                        if(book.status == 'liberado'){
                            let tabla =$(this).parent();
                            tabla.append(`<button class="download" data-indice="${i}" disabled>disponible</button>`);
                        }else if(book.status == 'alquilado') {
                            tabla.append(`<button class="alquilado" data-indice="${i}" disabled>alquilado</button>`);
                        }else if(book.status == 'pedido') {
                            tabla.append(`  <select name="status" id="">
                                            <option value="valor 1">rechazar</option>
                                            <option value="valor 2">aceptar</option>
                                            <button class="respuesta" data-indice="${i}" disabled>responder</button>
                                            </select>`);
                        }
                        i++;
                    }
                });
        }
        </script>
    @endsection

