@extends('layouts.base')
@section('content')
    <header>
        <div class="username"></div>
    </header>
    <div class="main-container">
        <h2 class="title-form">Editar genero</h2>
        <form class="regist form-wrapper">
            <input name="gender" class="name form-control" type="text" placeholder="nombre" value="{{$gender->name}}">
            <div class="button-wrapper">
            <button name="edit" class="edit btn btn-primary">editar</button>
            </div>
        </form>
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

