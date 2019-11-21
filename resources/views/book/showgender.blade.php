@extends('layouts.base')

@section('style')

@endsection

@section('content')
    <h1>libros</h1>
    <a class='registro' href="/books/create">registrar  libros </a>
    <a class='registro' href="/genders/create">registrar genero </a>
    <a class='registro' href="/genders/edit">editar genro </a>
    <a class='registro' href="/authors/edit">registrar autor </a>
    <a class='registro' href="/authors/edit">editar autor </a>

    <table>
        <thead>
        <tr>
            <th></th>
            <th>generos</th>

        </tr>
        </thead>
        <tbody>
        @foreach($genders as $gender)
            <tr>
                <td>
                    <a href="/books/{{$gender->id}}/edit"> editar</a>
                    <button class="delete" data-id="{{$gender->id}}">borrar</button>
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