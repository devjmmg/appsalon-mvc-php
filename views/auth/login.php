<h1 class="titulo-login">Iniciar sesión</h1>
<p class="text-center"></p>

<?php include_once __DIR__ . "/../templates/alertas.php" ?>

<form action="/" method="POST" class="formulario">

    <div class="campo">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" placeholder="Escriba su correo electrónico" name="email" value=" <?php echo $usuario->email ?> ">
    </div>
    
    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" placeholder="Escriba su contraseña" name="password">
    </div>
    
    <input type="submit" class="boton-azul" value="Iniciar Sesión" >

</form>

<div class="acciones">
    <a href="/create_account">Crear cuenta nueva</a>
    <a href="/forget">¿Olvidaste tu contraseña?</a>
</div>