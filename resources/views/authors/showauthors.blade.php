@extends('layouts.base')

@section('style')

@endsection

@section('content')
    <h1>libros</h1>
    <a class='registro' href="/authors/create">registrar autor </a>

    <table class="booklook authors">
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
                    <a href="/authors/{{$author->id}}/edit"class="btn-icon"><i class="fas fa-edit"></i></a>
                    <button class="delete btn-icon" data-id="{{$author->id}}"><i class="fas fa-trash-alt"></i></button>
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
                url: `/authors/${$(this).data('id')}`,
                type: 'DELETE',
                success: (result) => {
                    alert('genero borrado con exito');
                    $(this).parent().parent().detach();
                }
            });
        })
    </script>
@endsection