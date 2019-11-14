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
        <div class="username">{{}}</div>
    </header>
    <div class="main-container">
        <h1>Pide un libro libro</h1>
        <form class="found">
                <input name="title" class="title" type="text" placeholder="titulo">
                <input name="gender" class="gender" type="text"placeholder="genero">
                <input name="date" class="date" type="text" placeholder="fecha">
                <input name="author" class="author" type="text" placeholder="autor">
                <input name="quantity" class="quantity" type="text" placeholder="cantidad">
                <button name="consult" class="consult">consultar</button>
                <button name="pedir" class="pedir">pedir</button>
        </form>
    </div>
        <div class="reply"></div>
        @endsection

        @section('js')
    <script src="{{ asset('js/request.js') }}"></script>
    @endsection

