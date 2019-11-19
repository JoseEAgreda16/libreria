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
            <td>{{$book->title}}</td><button><a href="/edit"></a></button>
            <td>{{$book->author_id}}</td><button><a href="/edit"></a></button>
            <td>{{$book->date_public}}</td><button><a href="/edit"></a></button>
            <td>{{$book->genres_id}}</td><button><a href="/edit"></a></button>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>

    </script>
@endsection