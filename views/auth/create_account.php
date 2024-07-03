<h1 class="titulo-login">Crear cuenta</h1>
<p class="text-center"></p>

<?php include_once __DIR__ . "/../templates/alertas.php" ?>

<form action="/create_account" method="POST" class="formulario">

    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" placeholder="Escriba su nombre" name="nombre" value="<?php echo s($usuario->nombre); ?>">
    </div>

    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" placeholder="Escriba su apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>">
    </div>

    <div class="campo">
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" placeholder="Escriba su número de telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>">
    </div>

    <div class="campo">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" placeholder="Escriba su correo electrónico" name="email" value="<?php echo s($usuario->email); ?>">
    </div>

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" placeholder="Escriba su contraseña" name="password">
    </div>

    <input type="submit" class="boton-azul" value="Registrarte">

</form>

<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/forget">¿Olvidaste tu contraseña?</a>
</div>