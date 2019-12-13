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
                        <td>{{date('d/m/Y', strtotime($order->date))}}</td>
                        @if($order->status->id==1 || $order->status->id==2)
                            <td><button class="cancel btn btn-primary" data-indice="{{$order->id}}" >cancelar</button></td>
                        @elseif($order->status->id==2)
                            <td><button class="read btn btn-primary" data-indice="{{$order->id}}" >leer</button></td>
                            @endif
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
        $('.cancel').click(function (e){
            e.preventDefault();
            let idx=$(this).data('indice');
            $.ajax({
                url: `http://librando.local/mybooks/${idx}`,
                method: 'PUT',
            })
                .done(()=>{
                        alert('has cancelado la solicitud');
                        $(this).prop('disabled',true);
                        $(this).css("background-color", "grey");
                    }
                );
        });
        $('.read').click(()=>{
            let ind=$(this).data('indice');
            $.get({
                url:"http://librando.local/books",
                book_id:ind
            })
                .done(function (data) {
                    alert(`Ven a retirar tu libro! con el sigiente codigo de pedido${data}`);
                    // $()
                });
        });
        $('.molon').click(()=>{
            alert(`cuando los botones molen tendran funciones`);
        });

    </script>
@endsection

