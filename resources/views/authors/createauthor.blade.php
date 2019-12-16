@extends('layouts.base')
@section('content')
    <div class="main-container">
        <h2 class="title-form">registro de autor</h2>
        <form class="regist-form form-wrapper">
            <input name="author" class="form-control author" type="text" placeholder="npmbre">
            <input name="apellido" class="form-control apellido" type="text" placeholder="apellido">
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
            let author =$('.author').val();
            let authorsurname =$('.apellido').val();

            $.post("http://librando.local/authors", {
                name: author,
                surname: authorsurname,
            })
                .done(function (name) {
                    alert(`el autor ${author} se ha registrado con exito`);
                });
        }
    </script>
@endsection

