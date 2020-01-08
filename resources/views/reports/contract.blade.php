<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="contract">
    <h1 class="title-contract">Contrato de prestamo</h1>
    <div class="content-contract">
        <p>El siguiente documento compromete al usuario del libro de nombre {{$user->name}}y cedula de identidad {{$user->card_id}} a la entrega del material de titulo {{$orders->inventory->book->title}} el dia {{$orders->date_limit}} de lo contrario sera sancionado con la cantidad de 3$ por semana de retraso.</p>
    </div>
    <div class="firma">
        ----------<br>
        firma de usuario<br>
        {{$user->name}}
    </div>
</div>
</body>
<script>
</script>
</html>