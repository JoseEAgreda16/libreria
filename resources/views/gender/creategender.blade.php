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
    <div class="main-container">
        <h2 class="title-form">registro de genero</h2>
        <form class="regist form-wrapper">
            <input name="genres" class=" form-control gender" type="text" placeholder="titulo">
            <div class="button-wrapper">
            <button name="register" class="register btn btn-primary">registrar</button>
            </div>
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
            let genero =$('.gender').val();

            $.post("http://librando.local/genders", {
                name: genero,
            })
                .done(function (gender) {
                    alert(`el libro ${genero} se ha registrado con exito`);
                });
        }
    </script>
@endsection

