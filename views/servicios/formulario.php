
<?php

include_once __DIR__ . "/../templates/alertas.php";

?>

<div class="campo">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" placeholder="Escriba el nombre del servicio" name="nombre" value="<?php echo s($servicio->nombre) ?>">
</div>

<div class="campo">
    <label for="precio">Precio:</label>
    <input type="number" id="precio" placeholder="Escriba el precio" name="precio" value="<?php echo s($servicio->precio) ?>">
</div>

<input type="submit" class="boton-verde" value="Guardar">