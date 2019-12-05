@extends('layouts.base')
@section('content')
    <div class="table-wrapper">
        <div class="form-container fill">
            <h2 class="title-form">Bienvenido a la gestion de Pedidos de libros</h2>
            <form class="form-wrapper fill">
            <input type="select" name="name" class="form-control name-book" type="text" placeholder="nombre">
            <select name="generos" id="options" class="gender form-control">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <select name="autor" id="options" class="autor form-control">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <input name="fecha" class="fecha form-control" type="text" placeholder="fecha">
                <div class="button-wrapper">
            <button name="found" class="found btn btn-primary">filrar</button>
                </div>
            </form>
       </div>
       <div class="main-container">
           <table class=" table-wrapper booklook book">
               <thead>
               <tr>
                   <th>usuario</th>
                   <th>titulo</th>
                   <th>author</th>
                   <th>genero</th>
               </tr>
               </thead>
               <tbody>
               {{--@foreach($books as $book)--}}
                   {{--<tr class="boook">--}}
                       {{--<td>{{$book->title}}</td>--}}
                       {{--<td>{{$book->author->name}}</td>--}}
                       {{--<td>{{$book->gender->name}}</td>--}}
                           {{--<td><button class="get btn btn-primary" data-indice="${i}" >aceptar</button></td>--}}
                           {{--<td><button class="download btn btn-primary" data-indice="${i}" >rechazar</button></td>--}}
                   {{--</tr>--}}
               {{--@endforeach--}}
               </tbody>
           </table>

      </div>
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
                        if(book.status_id == 1){
                            let tabla =$(this).parent();
                            tabla.append(`<button class="download" data-indice="${i}" disabled>disponible</button>`);
                        }else if(book.status_id == 3) {
                            tabla.append(`<button class="alquilado" data-indice="${i}" disabled>alquilado</button>`);
                        }else if(book.status_id == 3) {
                            tabla.append(`<select name="status" id="">
                                            <option value="valor 1">rechazar</option>
                                            <option value="valor 2">aceptar</option>
                                            <button class="respuesta" data-indice="${i}" disabled>responder</button>
                                            </select>`);
                        }
                        i++;
                    }
                });
        }
        // $.get("http://librando.local/books" + params)
        //     .done(function (books) {
        //         console.log(books);
        //         let i = 0;
        //         for (let book of books) {
        //             $(".main-container").append(`<table class="table">
        //             <tr class="book" Id="${i}">
        //                     <td class="name">${book.title}</td>
        //                     <td class="gender">${book.genderId}</td>
        //                     <td class="date">${book.datePublic}</td>
        //                     <td class="date">${book.authorId}</td>
        //                     <td class="">${book.quantity}</td>
        //                     <td class="">${book.status_id}</td>
        //             </tr>
        //                 </table>`);
        //             if(book.status == 'liberado'){
        //                 let tabla =$(this).parent();
        //                 tabla.append(`<button class="download" data-indice="${i}" disabled>disponible</button>`);
        //             }else if(book.status == 'alquilado') {
        //                 tabla.append(`<button class="alquilado" data-indice="${i}" disabled>alquilado</button>`);
        //             }else if(book.status == 'pedido') {
        //                 tabla.append(`  <select name="status" id="">
        //                                     <option value="valor 1">rechazar</option>
        //                                     <option value="valor 2">aceptar</option>
        //                                     <button class="respuesta" data-indice="${i}" disabled>responder</button>
        //                                     </select>`);
        //             }
        //             i++;
        //         }
        //     })
        </script>
    @endsection

