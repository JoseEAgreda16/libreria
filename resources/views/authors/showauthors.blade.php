@extends('layouts.base')

@section('style')

@endsection

@section('content')
    <h1>libros</h1>
    <a class='registro' href="/books/create">registrar  libros </a>
    <a class='registro' href="/genders/create">registrar genero </a>
    <a class='registro' href="/authors/edit">registrar autor </a>

    <table>
        <thead>
        <tr>
            <th></th>
            <th>autores</th>

        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>
                    <a href="/authors/{{$author->id}}/edit"> editar</a>
                    <button class="delete" data-id="{{$author->id}}">borrar</button>
                </td>
                <td class="name">{{$author->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $('.delete').click(function (){
            $.ajax({
                url: '/authors/{{$author->id}}',
                type: 'DELETE',
                success: (result) => {
                  alert('autor borrado con exito');
                    $(this).parent().parent().detach();
                }
            });
        })
    </script>
@endsection