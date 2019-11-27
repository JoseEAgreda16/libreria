@extends('layouts.base')
@section('content')
    <div class="main-container">
        <form class="regist">
            <div class="form-content">
                <h2 class="title-form">registro de autor</h2>
            <input name="author" class="author" type="text" placeholder="npmbre">
            <input name="apellido" class="apellido" type="text" placeholder="apellido">
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
            let authorsurname =$('.apellido').val();

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

