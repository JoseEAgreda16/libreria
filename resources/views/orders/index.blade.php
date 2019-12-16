@extends('layouts.base')
@section('content')
    <div class="table-wrapper">
        <div class="form-container fill">
            <h2 class="title-form">Bienvenido a la gestion de Pedidos de libros</h2>
            <form class="form-wrapper fill">
            <input type="select" name="name" class="name form-control name-book" type="text" placeholder="nombre">
            <input type="select" name="user" class="user form-control name-book" type="text" placeholder="nombre">
            <input name="fecha" class="card form-control" type="text" placeholder="fecha">
            <input name="fecha" class="date form-control" type="text" placeholder="fecha">
                <div class="button-wrapper">
            <button name="found" class="found btn btn-primary">filrar</button>
                </div>
            </form>
       </div>
       <div class="main-container">
           <table class=" table-wrapper booklook book">
               <thead>
               <tr>
                   <th>libro</th>
                   <th>usuario</th>
                   <th>estatus</th>
               </tr>
               </thead>
               <tbody>
               @foreach($orders as $order)
                   <tr class="boook">
                       <td>{{$order->inventory->book->title}}</td>
                       <td>{{$order->user->name}}</td>
                       {{--<td>{{$order->status->name}}</td>--}}
                       @if($order->status->id==1)
                           <td><button class="acept btn btn-second" data-indice="{{$order->id}}" >aceptar</button></td>
                           <td><button class="reject btn btn-primary" data-indice="{{$order->id}}">rechazar</button></td>
                       @elseif($order->status->id==2)
                           <td><button class="give btn btn-primary" data-indice="{{$order->id}}" >entregar</button></td>
                       @elseif($order->status->id==4)
                           <td><button class="receive btn btn-primary" data-indice="{{$order->id}}" >recibir</button></td>
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
        $('.acept').click(function (e){
            e.preventDefault();
            let idx=$(this).data('indice');
            $.ajax({
                url: `http://librando.local/orders/${idx}`,
                method: 'PUT',
                data:{status_id : 2},
            })
                .done(()=>{
                    alert('has aceptado solicitud');
                    $(this).prop('disabled',true);
                    $(this).css("background-color", "grey");
                    $(this).siblings().prop('disabled',true);
                    $(this).siblings().css("background-color", "grey");
                    }
                );
        });
        $('.give').click(function (e){
            e.preventDefault();
            let idx=$(this).data('indice');
            $.ajax({
                url: `http://librando.local/orders/${idx}`,
                method: 'PUT',
                data:{status_id :4},
            })
                .done(()=>{
                    alert('has aceptado solicitud');
                    $(this).prop('disabled',true);
                    $(this).css("background-color", "grey");
                    $(this).siblings().prop('disabled',true);
                    }
                );
        });
        $('.receive').click(function (e){
            e.preventDefault();
            let idx=$(this).data('indice');
            $.ajax({
                url: `http://librando.local/orders/${idx}`,
                method: 'PUT',
                data:{status_id :5},
            })
                .done(()=>{
                    alert('libro recibido');
                    $(this).prop('disabled',true);
                    $(this).css("background-color", "grey");
                    $(this).siblings().prop('disabled',true);
                    }
                );
        });
        $('.reject').click(function (e){
            e.preventDefault();
            let idx=$(this).data('indice');
            $.ajax({
                url: `http://librando.local/orders/${idx}`,
                method: 'PUT',
                data:{status_id : 3},
            })
                .done(()=>{
                        alert('has aceptado solicitud');
                        $(this).prop('disabled',true);
                        $(this).css("background-color", "grey");
                    }
                );
        });

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
        $('')
        </script>
    @endsection

