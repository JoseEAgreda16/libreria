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
        <h1>registro de libros</h1>
        <form class="found">
            <input name="title" class="title" type="text" placeholder="titulo">
            <select name="generos" id="options" class="gender">
                @foreach($genres_id as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <input name="date" class="date" type="text" placeholder="fecha">
            <select name="authors" id="options" class="autor">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            <input name="quantity" class="quantity" type="text" placeholder="cantidad">
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
            let nombre =$('.title').val();
            let genero =$('.gender').val();
            let autor =$('.author').val();
            let fecha =$('.date').val();
            let cantidad =$('.quantity').val();

            $.post("http://librando.local/book/add", {
                title: nombre,
                genres_id: genero,
                date_public: fecha,
                author_id: autor,
                quantity: cantidad,
            })
                .done(function (books) {
                    alert(`el libro ${nombre} se ha registrado con exito`);
                });
        }
    </script>
@endsection

