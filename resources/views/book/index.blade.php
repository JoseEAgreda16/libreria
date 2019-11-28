@extends('layouts.base')

@section('style')

@endsection

@section('content')
<h1>libros</h1>
<a class='registro' href="/books/create">registrar  libros </a>

    <table class="booklook book">
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
                <a href="/books/{{$book->id}}/edit" class="btn-icon"> <i class="fas fa-edit"></i></a>
                <button class="btn-icon delete" data-id="{{$book->id}}"><i class="fas fa-trash-alt"></i></button>
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
        $('.delete').click(function (){
            $.ajax({
                url: `/books/${$(this).data('id')}`,
                type: 'DELETE',
                success: (result) => {
                    alert('genero borrado con exito');
                    $(this).parent().parent().detach();
                }
            });
        })
    </script>
@endsection