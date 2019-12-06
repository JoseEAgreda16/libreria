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
                    <th>estado</th>
                    <th>fecha de pedido</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr class="boook">
                        <td>{{$order->inventory->book->title}}</td>
                        <td>{{$order->status->name}}</td>
                        <td>{{$order->date}}</td>
                            <td><button class="cancel btn btn-primary" data-indice="{{$order->id}}" >cancelar</button></td>
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
            $.post( "http://librando.local/request",
                {book_id:ind
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

