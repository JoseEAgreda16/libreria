$(document).ready(inicio);
// funciones iniciales el sistema
function inicio(){
    let login=$(".loging");
    login.click(formLogin);
    let regist=$(".regis");
    regist.click(formRegist);
}
// fucntiones de bindding de datos
// Registrar
function reg(e){
    e.preventDefault();
    if($(".password").val() != $(".confirm").val()){
        alert('la contraseña y la confirmacion no coinciden verifique e intenete nuevamente');
    }
            let usuario = $(".user").val();
            let apellido = $(".surname").val();
            let clave = $(".password").val();
            let email = $(".email").val();
            let ci = $(".ci").val();
            // hay que cambiar la ruta del post
        $.post("./register.php", {
                name: usuario,
                surmane: apellido,
                password: clave,
                email: email,
                id_card: ci,
            })
            .done(function (ladada) {
                alert("usuario registrado con exito ahora puede hacer login e ingresar");
            });   
 }
// login
 function logg(e){
    e.preventDefault();
            let usuario = $(".usuario").val();
            let clave = $(".clave").val();
            let ci = $(".ci").val();
            // hay que cambiar la ruta a la correcta
        $.post("./loger.php", {
                name: usuario,
                password: clave,
            })
            .done(function (ladada) {
                if(+ladada){
                alert("bienvenido");
                window.location='./librando/books.html'
                }
                else{
                    alert('datos incorrectos');
                }
            });   
        }

// activa el formulario login
function formLogin(e){
    e.preventDefault();
        $(".preview-content").detach();
        $(".regist").detach();
        $(".login").detach();
    $(".main-container").append(`<form class="login">
                                    <div class="form-content">
                                     <h2 class=title-form>Login</h2>
                                        <input class="user" placeholder="ingrese el nombre"></input>
                                        <input class="password" placeholder="ingrese el password"></input>
                                        <input class="ci" placeholder="ci"></input>
                                        <button class="submit">logear</button>
                                     </div>
                                 </form>`);
          let logear=$('.submit');
          logear.click(logg);                      
}
// activa el formulario de registro
function formRegist(e){
    e.preventDefault();
    $(".preview-content").detach();
    $(".regist").detach();
    $(".login").detach();
    $(".main-container").append(`<form class="regist">
                                    <div class="form-content">
                                    <h2 class="title-form">Registrar</h2>
                                    <input class="user" placeholder="ingrese el username"></input>
                                    <input class="surname" placeholder="ingrese el apellido"></input>
                                    <input class="password" placeholder="ingrese el password"></input>
                                    <input class="confirm" placeholder="confirmar contraseña"></input>
                                    <input class="ci" placeholder="ci"></input>
                                    <input class="email" placeholder="email"></input>
                                    <button class="submit">registrar</button>
                                    </div>
                                </form>`);
                                // activa las funciones del formulario register
    let registrar =$('.submit');
    registrar.click(reg)
}
