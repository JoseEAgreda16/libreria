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
        .replay{
            width:400px;
            height:400px;
        }
    </style>
    @endsection
    @section('content')
    <header>
        <div class="username"></div>
    </header>
    <div class="main-container">
        <h1>registro de libros</h1>
        <form class="found">
                <input class="title" type="text" placeholder="titulo">
                <input class="gender" type="text"placeholder="genero">
                <input class="date" type="text" placeholder="fecha">
                <input class="author" type="text" placeholder="autor">
                <input class="quantity" type="text" placeholder="cantidad">
                <button class="register">registrar</button>
        </form>
    </div>
    @
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{asset('js/request.js')}}"></script>

