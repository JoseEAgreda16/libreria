@extends('layouts.base')

@section('content')

    <div class="form-container">
        <h2 class="title-form">login</h2>
        <form class="regist-form form-wrapper" method="POST" action="/login">
            @csrf
            <input name="email" class="form-control email" placeholder="ingrese el e-mail">
            <input name="password" class="form-control password" type="password" placeholder="ingrese el password">
            <div class="button-wrapper">
                <button class="btn btn-second submit">log-in</button>
            </div>
        </form>
    </div>
@endsection

