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
            display:block;
            width:300px;
            height:500px;
            margin:auto;
        }
        .replay{
            width:400px;
            height:400px;
        }
        .main-container{
            display:block;
        }
        h1{
            display:block;
            margin:auto;
            text-align: center;

        }
        .found{
            margin:auto;
            justify-content: center;
            width:400px;
            border:none;
            border-radius: 5px;
            box-shadow: 1px 1px 1px 2px rgb(0,0,0,0.6);
            margin-top:0;
            /*IMPORTANTE*/
            align-items: center;
            }
            .surname,.email,.ci,.confirm,.user,.password{
            display:list-item;
            border-radius:2px;
            width:125px;
            height:35px;
            margin-bottom:15px;
            margin:auto;
        }
        .regist{

        }
    </style>
</head>
<body>
    <header>
        <div class="username"></div>
    </header>
    <div class="main-container">
        <h1>registro de administrador</h1>
        <form class="found">
                <input class="name" type="text" placeholder="nombre">
                <input class="surname" type="text"placeholder="apellido">
                <input class="password" type="text" placeholder="password">
                <input class="ci" type="text" placeholder="ci">
                <input class="email" type="text" placeholder="email">
                <button class="regist">registrar</button>
        </form>
    </div>
        <aside class="reply"></aside>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{asset('js/request.js')}}"></script>
</body>
</html>
