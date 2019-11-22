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
                    <a href="/authors/{{$author->id}}/edit"> editar</a>
                    <button class="delete" data-id="{{$author->id}}">borrar</button>
                </td>
                <td>{{$autor->name}}</td>

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