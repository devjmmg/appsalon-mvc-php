<h1 class="titulo-login">Servicios</h1>
<p class="text-center"></p>

<?php include_once __DIR__ . "/../templates/barra.php"; ?>

<div class="servicio_agregar">
    <a class="boton-verde " href="/servicios/crear">Agregar servicio</a>
</div>

<table class="table-servicio">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($servicios as $servicio): ?>
        <tr>
            <td><?php echo s($servicio->nombre); ?></td>
            <td><?php echo s($servicio->precio); ?></td>
            <td>
                <a href="/servicios/actualizar?id=<?php echo s($servicio->id);?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="30"
                        height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                        <path d="M16 5l3 3" />
                    </svg>
                </a>

                <form action="/servicios/eliminar" method="POST">

                    <input type="hidden" name="id" id="id" value="<?php echo s($servicio->id);?>">

                    <button type="submit" style="all: unset;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="30"
                            height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </button>

                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>