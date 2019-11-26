@extends('layouts.base')

@section('style')

@endsection

@section('content')
    <h1>libros</h1>
    <a class='registro' href="/books/create">registrar  libros </a>
    <a class='registro' href="/genders/create">registrar genero </a>
    <a class='registro' href="/authors/create">registrar autor </a>

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
                    <a href="/genders/{{$gender->id}}/edit"> editar</a>
                    <button class="delete" data-id="{{$gender->id}}">borrar</button>
                </td>
                <td>{{$gender->name}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $('.delete').click(function (){
            $.ajax({
                url: '/genders/{{$genders->id}}',
                type: 'DELETE',
                success: (result) => {
                    alert('genero borrado con exito');
                    $(this).parent().parent().detach();
                }
            });
        })
    </script>
@endsection