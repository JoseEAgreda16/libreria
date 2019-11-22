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
            <input name="author" class="author" type="text" placeholder="npmbre">
            <input name="author" class="author" type="text" placeholder="apellido">
            <button name="register" class="register">registrar</button>
        </form>
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
            let author =$('.author').val();
            let authorsurname =$('.gender').val();

            $.post("http://librando.local/authors", {
                name: author,
                surname: authorsurname,
            })
                .done(function (author) {
                    alert(`el libro ${author} se ha registrado con exito`);
                });
        }
    </script>
@endsection

