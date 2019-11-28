@extends('layouts.base')

@section('content')
    <div class="main-container">
        <h2 class="title-form">Editar autor</h2>
        <form class="edit-form form-wrapper">
            <input name="name" class="form-control name" type="text" placeholder="titulo" value="{{$authors->name}}">
            <input name="surname" class="form-control surname" type="text" placeholder="titulo" value="{{$authors->surname}}">
                <div class="button-wrapper">
            <button name="edit" class="edit btn btn-primary">editar</button>
                </div>
        </form>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(inicio);
        function inicio() {
            $('.edit').click(function (e) {
                e.preventDefault();
                let datos =$('.edit-form').serialize();
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

