@extends('layouts.base')

@section('style')

@endsection

@section('content')
    <div class="table-wrapper genders">
    <h1 class="title-form">Generos</h1>
    <a class='registro btn btn-second' href="/genders/create">registrar genero </a>

    <table class="booklook gender">
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
                    <a href="/genders/{{$gender->id}}/edit"class="btn-icon"> <i class="fas fa-edit"></i></a>
                    <button class="delete btn-icon" data-id="{{$gender->id}}"><i class="fas fa-trash-alt"></i></button>
                </td>
                <td>{{$gender->name}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection

@section('js')
    <script>
        $('.delete').click(function (){
            $.ajax({
                url: `/genders/${$(this).data('id')}`,
                type: 'DELETE',
                success: (result) => {
                    alert('genero borrado con exito');
                    $(this).parent().parent().detach();
                }
            });
        })
    </script>
@endsection