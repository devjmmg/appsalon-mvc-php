<div class="barra">
    <p>Hola: <strong><?php echo $nombre ?></strong></p>
    <a class="boton-azul" href="/logout">Cerrar sesión</a>
</div>

<?php if(isset($_SESSION["admin"])): ?>

<div class="nav-admin">
    <a class="boton-azul" href="/servicios">Ver servicios</a>
    <a class="boton-azul" href="/admin">Ver citas</a>
</div>

<?php endif;?>