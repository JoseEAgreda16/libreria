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
        .reply{
            width:500px;

        }
    </style>
@endsection

@section('content')
    <header>
    </header>
    <div class="main-container">
        <form class="found">
            <input name="title" class="name" type="text" placeholder="titulo" value="{{$authors->name}}">
            <input name="title" class="surname" type="text" placeholder="titulo" value="{{$authors->surname}}">
            <button name="edit" class="edit">editar</button>
        </form>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(inicio);
        function inicio() {
            $('.edit').click(function (e) {
                e.preventDefault();
                let nombre = $('.name').val();
                let apellido = $('.surname').val();
                console.log(nombre);

                $.ajax({
                    url: "http://librando.local/authors/{{$authors->id}}",
                    method: 'PUT',
                    data: {
                        name: nombre,
                        surname: apellido
                    },
                })
                    .done(function (data) {
                        alert('el autor a sido modificado satisfactoriamente');
                    });
            })
        }
    </script>
@endsection

