<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>www.librando.com</title>
    <style>
        body,html{
            width:100%;
            display:inline-block;
            align-content: center;
            margin:0;
            padding:0;
        }
        .login,.regist{
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
        .submit{
            width:125px;
            height:35px;
            border:none;
            border-radius: 5px;
            box-shadow: 1px 1px 1px 2px rgb(0,0,0,0.6);
            display:block;
            margin-bottom:10px;
            margin: auto;
        }
        .form-content{
            margin:auto;
            align-content:center;
            list-style:none;
            padding:none;
        }
        .preview-content{
            width:800px;
            height:300px;
            display:block;
            align-content: center;
            margin:auto;
        }
        .main-container{
            display:flex;
            align-items: center;
            align-content: center;
            display:block;
            margin:auto;
        }
        header{
            align-items: center;
        }
        .title{
            text-align: center;
            border-bottom-color: solid rgba(82, 79, 79, 0.6)
        }
        .options{
            width:900px;
            margin:auto;
        }
        .title-form{
            display:block;
            margin:auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
         <div class="title"><h1>Librando<h1></div>
            <nav class="options">
                <button class="loging">iniciar sesion usuario</button>
                <button class="regis">registrar nuevo usuario</button>
            </nav>
    </header>
     <div class="main-container">
         <div class="preview-content">
             <h2 class="content-title">Librando</h2>
                <p class="intruccions">buenvenido al sistema Librando labiblioteca en linea que te permitira de forma gratuita aceder a contenido de tu interes gratis para acceder a contenido registrate</p>

                <h3>¿eres administrador?</h3>
                <p class="intruccions"> ingresa como admin  colabora con nosotros en la aplicacion para que podamos ampliar nuestrar barreras a la informacion gratuita</p>
         </div>
     </div>
     </body>
     <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/users.js') }}"></script>
</body>
</html>
