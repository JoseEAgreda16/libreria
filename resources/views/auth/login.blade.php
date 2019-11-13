@extends('layouts.base')

@section('content')
<form class="login" method="POST" action="/login">
    @csrf
<div class="form-content">
    <h2 class=title-form>Login</h2>
    <input name="email" class="email" placeholder="ingrese el e-mail"></input>
    <input name="password" class="password" placeholder="ingrese el password"></input>
    <button class="submit">logear</button>
    </div>
</form>
@endsection
