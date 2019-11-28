@extends('layouts.base')

@section('style')
    <style>
        html,body{
            margin:0;
            padding:0;
        }
        .found{
            display:list-item;
            width:500px;
        }
    </style>
@endsection
@section('content')
    <header>
        <div class="username"></div>
    </header>
    <div class="main-container">
        <h1>editar genero</h1>
        <form class="found">
            <input name="gender" class="name" type="text" placeholder="nombre" value="{{$gender->name}}">
            <button name="edit" class="edit">editar</button>
        </form>
        <form action=""></form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(inicio);

        function inicio(){
            let registrar = $('.edit');
            registrar.click(save);
        }
        function save(e){
            e.preventDefault();
            let genero =$('.name').val();

            $.ajax({
                url: "http://librando.local/genders/{{$gender->id}}",
                method : 'PUT',
                data: {name:genero},
            })
                .done(function (gender) {
                    alert(`el genero ${genero} editado con exito`);
                });
        }
    </script>
@endsection

