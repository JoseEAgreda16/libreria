@extends('layouts.base')

@section('content')

    <div class="table-wrapper">
        <div class="reply">
            <h1 class="title-form">mis libros</h1>
            <h3 class="title-form">aqui estan los libros que has pedido y los que ya puedes leer</h3>
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
                        <td><button class="get btn btn-second" data-indice="${i}" >leer</button></td>
                        <td><button class="get btn btn-second" data-indice="${i}" >leer</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>

        //funciones naturles de la pigina pedir,leer,etc
        $('.get').click(()=>{
            let ind=$(this).data('indice');
            $.post({
                url: "http://librando.local/request",
                book_id:ind
            })
                .done( (data)=> {
                    alert('libro pedido, espara la respuesta de nuestros administradores');
                    $(this).prop('disabled',true);
                });
        });
        $('.read').click(()=>{
            let ind=$(this).data('indice');
            $.get({
                url: "http://librando.local/books",
                book_id:ind
            })
                .done(function (data) {
                    alert(`Ven a retirar tu libro! con el sigiente codigo de pedido`);
                });
        });
        $('.molon').click(()=>{
            alert(`cuando los botones molen tendran funciones`);
        });

    </script>
@endsection

