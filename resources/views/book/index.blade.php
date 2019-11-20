@extends('layouts.base')

@section('style')

@endsection

@section('content')
<h1>libros</h1>
<a class='registro' href="/books/create">registrar  libros </a>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>titulo</th>
                <th>author</th>
                <th>fecha</th>
                <th>genero</th>
            </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
        <tr>
            <td>
                <a href="/books/{{$book->id}}/edit"> editar</a>
                <button class="delete" data-id="{{$book->id}}">borrar</button>
            </td>
            <td>{{$book->title}}</td>
            <td>{{$book->author_id}}</td>
            <td>{{$book->date_public}}</td>
            <td>{{$book->genres_id}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
$('')
    </script>
@endsection