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
        <h1>Pide un libro libro</h1>
        <form class="found">
                <input class="title" type="text" placeholder="titulo">
                <input class="gender" type="text"placeholder="genero">
                <input class="date" type="text" placeholder="fecha">
                <input class="author" type="text" placeholder="autor">
                <input class="quantity" type="text" placeholder="cantidad">
                <button class="consult">consultar</button>
                <button class="pedir">pedir</button>
        </form>
    </div>
        <div class="reply"></div>
        @endsection

        @section('js')
    <script src="{{ asset('js/request.js') }}"></script>
    @endsection

