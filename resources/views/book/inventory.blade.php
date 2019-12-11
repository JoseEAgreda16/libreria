@extends('layouts.base')

@section('style')

@endsection

@section('content')

    <ul class="table-wrapper lib">
        <li class="characterist"><strong>titulo:</strong> {{$currentBook->title}}</li>
        <li class="characterist"><strong>autor:</strong> {{$currentBook->author->name}}</li>
        <li class="characterist"><strong>genero:</strong> {{$currentBook->gender->name}}</li>
        <li class="characterist"><strong>fecha:</strong> {{$currentBook->date_public}}</li>
    </ul>


   <table class=" table-wrapper booklook book">
      <thead>
      <tr>
         <th>libro</th>
         <th>estatus</th>
      </tr>
      </thead>
      <tbody>
      @foreach($books as $book)
         <tr class="boook">
            <td>{{$book->id}}</td>
            @if($book->status_id==1)
               <td>disponible</td>
            @elseif($book->status_id==2)
               <td> no disponible</td>
            @elseif($book->status_id==3)
               <td> fuera de servicio</td>
         @endif
      @endforeach
      </tbody>
   </table>
@endsection

@section('js')
@endsection