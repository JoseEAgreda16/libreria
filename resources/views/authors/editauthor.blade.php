@extends('layouts.base')

@section('style')
    <style>
        html,body{
            margin:0;
            padding:0;
        }
        .found{
            display:list-item;
        }
        .reply{
            width:500px;

        }
    </style>
@endsection

@section('content')
    <header>
    </header>
    <div class="main-container">
        <h1>edite el autor</h1>
        <form class="found">
            <input name="title" class="title" type="text" placeholder="titulo" value="{{$book->title}}">
            <select name="gender" id="options" class="gender">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}" @if ($option->name==$book->genres_id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
            <input name="date_public" class="date" type="text" placeholder="titulo" value="{{$book->date_public}}">
            <select name="author_id" id="options" class="author">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}" @if ($option->name==$book->author_id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
            <button name="edit" class="edit">editar</button>
        </form>
    </div>
    <div class="reply"></div>
@endsection

@section('js')
    <script>
        $(document).ready(inicio);
        function inicio(){
            $('.edit').click(
                let datos = $('.found').serialize();
            $.ajax({
                url: "http://librando.local/authors",
                method : 'PUT',
                data: {datos},
            })
                .done(function( data ) {
                });
        }
    </script>
@endsection

