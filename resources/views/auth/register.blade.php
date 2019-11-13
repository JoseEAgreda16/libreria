@extends('layouts.base')

@section('content')
<form class="regist">
    <div class="form-content">
        <h2 class="title-form">Registrar</h2>
            <input  name="user" class="user" placeholder="ingrese el username"></input>
            <input  name="surname" class="surname" placeholder="ingrese el apellido"></input>
            <input  name="password" class="password" placeholder="ingrese el password"></input>
            <input  name="confirm" class="confirm" placeholder="confirmar contraseña"></input>
            <input  name="ci" class="ci" placeholder="ci"></input>
            <input  name="email" class="email" placeholder="email"></input>
        <button class="submit">registrar</button>
    </div>
</form>
@endsection
