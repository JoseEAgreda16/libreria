<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .filter{
            text-align:center;
            display:flex;
            height:40px;
        }
        .filter > input{
            width:20%;
            height:30px;
            margin-right:10px;
        }
        .registro{
            margin-right:15px;
            text-decoration: none;
        }
        .registadmin{
            margin-left:15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h2>bienvenido a la gestion de libros</h2>
        <nav>
        <a class='registro' href="bookregist.html">registro de libros </a>
        <a class='registadmin' href="adminregist.html">registro de administrador</a>
        </nav>
        <div class="filter">
            <input class="name-book" type="text" placeholder="nombre">
            <input class="genero" type="text" placeholder="genero">
            <input class="autor" type="text" placeholder="autor">
            <input class="fecha" type="text" placeholder="fecha">
            <button class="found">filrar</button>
       </div>
       <div class="main-container">

      </div>
    </header>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/book.js') }}"></script>
</body>
</html>
