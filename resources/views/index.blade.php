@extends('layouts.base')

@section('content')

     <div class="main-container index">
         <div class="preview-content">
             <h2 class="content-title">Librando</h2>
                <p class="intruccions">buenvenido al sistema Librando labiblioteca en linea que te permitira de forma gratuita aceder a contenido de tu interes gratis para acceder a contenido registrate</p>

                <h3>¿eres administrador?</h3>
                <p class="intruccions"> ingresa como admin  colabora con nosotros en la aplicacion para que podamos ampliar nuestrar barreras a la informacion gratuita</p>
         </div>
         <div class="image">
             <div class="libro a"><div class="perarator"></div><div class="letra">L</div><div class="perarator"></div></div>
             <div class="libro b"><div class="perarator"></div><div class="letra">I</div><div class="perarator"></div></div>
             <div class="libro e"><div class="perarator"></div><div class="letra">B</div><div class="perarator"></div></div>
             <div class="libro d"><div class="perarator"></div><div class="letra">R</div><div class="perarator"></div></div>
             <div class="libro b"><div class="perarator"></div><div class="letra">A</div><div class="perarator"></div></div>
             <div class="libro a"><div class="perarator"></div><div class="letra">N</div><div class="perarator"></div></div>
             <div class="libro c"><div class="perarator"></div><div class="letra">D</div><div class="perarator"></div></div>
             <div class="libro e"><div class="perarator"></div><div class="letra">O</div><div class="perarator"></div></div>
             <div class="libro d"><div class="perarator"></div><div class="letra">L</div><div class="perarator"></div></div>
             <div class="libro b"><div class="perarator"></div><div class="letra">L</div><div class="perarator"></div></div>

         </div>
     </div>
@endsection

@section('js')
<script src="{{ asset('js/users.js') }}"></script>
@endsection
