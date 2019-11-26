@extends('layouts.base')

@section('style')

@endsection

@section('content')
<h1>libros</h1>
<a class='registro' href="/books/create">registrar  libros </a>
<a class='registro' href="/genders/create">registrar genero </a>
<a class='registro' href="/authors/create">registrar autor </a>
<a class='registro' href="/authors">autores </a>
<a class='registro' href="/genders">genero </a>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>titulo</th>
                <th>author</th>
                <th>fecha</th>
                <th>genero</th>
                <th>cantidad</th>
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
            <td>{{$book->author->name}}</td>
            <td>{{$book->date_public}}</td>
            <td>{{$book->gender->name}}</td>
            <td>{{$book->quantity}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
    </script>
@endsection