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
            <th>atores</th>

        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>
                    <form action="/authors/{{$author->id}}" method="DELETE">
                            <a href="/authors/{{$author->id}}/edit"> editar</a>
                            <button class="delete" data-id="{{$author->id}}">borrar</button>
                            <td>{{$author->name}}</td>
                    </form>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        // $('.delete').click(function (){
        //     $(this).parent().parent().parent().detach();
        // })
    </script>
@endsection