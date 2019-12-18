@extends('layouts.base')
@section('content')
    <div class="table-wrapper">
        <div class="form-container fill">
            <h2 class="title-form">Bienvenido a la gestion de Pedidos de libros</h2>
            <form class="form-wrapper fill" method="get">
            <input type="select" name="title" class="title form-control name-book" type="text" placeholder="titulo">
            <input type="select" name="name" class="name form-control name-book" type="text" placeholder="nombre">
            <input type="select" name="card" class="card form-control" type="text" placeholder="ci">
                <select name="status" id="options" class="status form-control" placeholder="status">
                    <option value="" selected>Todos</option>
                    @foreach($orders_status as $option)
                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                    @endforeach
                </select>

                <div class="button-wrapper">
            <button name="found" class="found btn btn-primary" type="submit">filrar</button>
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

        </script>
    @endsection

