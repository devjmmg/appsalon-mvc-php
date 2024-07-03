<h1 class="titulo-login">Restablecer contraseña</h1>
<p class="text-center"></p>

<?php 

include_once __DIR__ . "/../templates/alertas.php";

if($vacio) {
    return;
}

?>

<form method="POST" class="formulario">

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" placeholder="Escriba su nueva contraseña" name="password">
    </div>

    <div class="campo">
        <label for="confirm_password">Contraseña:</label>
        <input type="password" id="confirm_password" placeholder="Confirme su contraseña" name="confirm_password">
    </div>

    <input type="submit" class="boton-azul" value="Restablecer">

</form>

<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/create_account">Crear cuenta nueva</a>
</div>