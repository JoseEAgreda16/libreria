@extends('layouts.base')

@section('style')

@endsection

@section('content')
<h1>libros</h1>
<a class='registro' href="/book/add">registro de libros </a>

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
                <a href="/books/{{$book->id}}/edit"></a>
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

    </script>
@endsection

