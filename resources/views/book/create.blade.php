@extends('layouts.base')

@section('content')
    <div class="main-container">
        <h2 class="title-form">registrar libro</h2>
        <form class="regist-form form-wrapper">
                <input name="title" class="form-control title" type="text" placeholder="titulo">
                <select name="generos" id="options" class="form-control gender">
                    @foreach($genders as $option)
                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                    @endforeach
                </select>
                <input name="date" class="form-control date" type="text" placeholder="fecha">
                <select name="authors" id="options" class="form-control author">
                    @foreach($authors as $option)
                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                    @endforeach
                </select>
                <input name="quantity" class="form-control quantity" type="text" placeholder="cantidad">
                     <div class="button-wrapper">
                <button name="register" class=" register btn btn-primary">registrar</button>
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
            let nombre =$('.title').val();
            let genero =$('.gender').val();
            let autor =$('.author').val();
            let fecha =$('.date').val();
            let cantidad =$('.quantity').val();

            $.post("http://librando.local/books", {
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

