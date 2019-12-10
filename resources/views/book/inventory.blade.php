@extends('layouts.base')

@section('style')

@endsection

@section('content')
    <ul>
        <li><strong>titulo:</strong> {{$currentBook->title}}</li>
        <li><strong>autor:</strong> {{$currentBook->author->name}}</li>
        <li><strong>genero:</strong> {{$currentBook->gender->name}}</li>
        <li><strong>fecha:</strong> {{$currentBook->date_public}}</li>
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