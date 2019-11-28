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
        <h1>edite el libro</h1>
        <form class="found form-wrapper">
            <input name="title" class="form-control title" type="text" placeholder="titulo" value="{{$book->title}}">
            <select name="gender" id="options" class="form-control gender">
                @foreach($genders as $option)
                    <option value="{{ $option->id }}" @if ($option->name==$book->genres_id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
            <input name="date_public" class="form-control date" type="text" placeholder="titulo" value="{{$book->date_public}}">
            <select name="author_id" id="options" class="form-control author">
                @foreach($authors as $option)
                    <option value="{{ $option->id }}" @if ($option->name==$book->author_id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
            <div class="button-wrapper">
            <button name="edit" class="edit btn btn-primary">editar</button>
            </div>
        </form>
    </div>
    <div class="reply"></div>
@endsection

@section('js')
    <script>
      $(document).ready(inicio);
      function inicio(){
          $('.edit').click(function (e){
              e.preventDefault();
          var datos = $('.found').serialize();
          console.log(datos);
          $.ajax({
              url: "http://librando.local/books/{{$book->id}}",
              method: 'PUT',
              data:datos,
          })
              .done(function (data) {
                  alert('el libro  sido modificado satisfactoriamente');
              });
      });
      }
    </script>
@endsection

