@extends('layouts.base')

@section('style')
@endsection

@section('content')
    <header>
    </header>
    <div class="main-container">
        <form class="found">
            <input name="name" class="name" type="text" placeholder="titulo" value="{{$authors->name}}">
            <input name="surname" class="surname" type="text" placeholder="titulo" value="{{$authors->surname}}">
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
                let datos =$('.found').serialize();
                console.log(datos);

                $.ajax({
                    url: "http://librando.local/authors/{{$authors->id}}",
                    method: 'PUT',
                    data:datos,
                })
                    .done(function (data) {
                        alert('el autor a sido modificado satisfactoriamente');
                    });
            })
        }
    </script>
@endsection

