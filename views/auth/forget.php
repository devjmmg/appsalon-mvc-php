<h1 class="titulo-login">¿Olvidaste la contraseña?</h1>
<p class="text-center"></p>

<?php

include_once __DIR__ . "/../templates/alertas.php";

?>

<form action="/forget" method="POST" class="formulario">

    <div class="campo">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" placeholder="Escriba su correo electrónico" name="email" value="<?php echo $auth->email ?>">
    </div>

    <input type="submit" class="boton-azul" value="Recuperar" >

</form>

<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/create_account">Crear cuenta nueva</a>
</div>