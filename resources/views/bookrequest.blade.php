<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</head>
<body>
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
        <aside class="reply"></aside>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/request.js') }}"></script>
</body>
</html>
