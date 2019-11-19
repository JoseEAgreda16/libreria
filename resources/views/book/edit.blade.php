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
        <h1>edite el campo</h1>
        <form class="found">
            <input name="title" class="title" type="text" placeholder="titulo" value="{{book.title}}">
            <input name="genres_id" class="gender" type="text" placeholder="titulo" value="{{book.genres_id}}">
            <input name="date_public" class="date" type="text" placeholder="titulo" value="{{book.date_public}}">
            <input name="author_id" class="author" type="text" placeholder="titulo" value="{{book.author_id}}">
            <button name="edit" class="edit">editar</button>
        </form>
    </div>
    <div class="reply"></div>
@endsection

@section('js')
    <script>
      $(document).ready(inicio);
      function inicio(){
          let datos = $('.found').serialize();
          $.ajax({
              url: "ruta",
              method : 'PUT',
              data: {datos},
          })
              .done(function( data ) {
              });
      }
    </script>
@endsection

