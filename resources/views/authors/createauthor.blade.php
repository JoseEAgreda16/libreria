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
        <h1>registra un nuevo autor</h1>
        <form class="found">
            <input name="genres" class="gender" type="text" placeholder="titulo">
            <button name="register" class="register">registrar</button>
        </form>
        <form action=""></form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(inicio);

        function inicio(){
            let registrar = $('.register');
            registrar.click(save);
        }
        function save(e){
            e.preventDefault();
            let genero =$('.gender').val();

            $.post("http://librando.local/authors/create", {
                name: genero,
            })
                .done(function (gender) {
                    alert(`el libro ${genero} se ha registrado con exito`);
                });
        }
    </script>
@endsection

