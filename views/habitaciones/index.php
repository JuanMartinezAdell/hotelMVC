<h1 class="nombre-pagina">Habitaciones</h1>
<p class="descripcion-pagina">Adminstración de Habitaciones</p>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="habitacion">
    <?php foreach ($habitaciones as $habitacion) { ?>
        <li>
            <p>Habitación Numero: <span><?php echo $habitacion->numero; ?></span></p>
            <p>Tipo: <span><?php echo $habitacion->tipo; ?></span></p>
            <p>Precio tarifa alta: <span><?php echo $habitacion->precioTAlta; ?>€</span></p>
            <p>Precio tarifa baja: <span><?php echo $habitacion->precioTBaja; ?>€</span></p>
            <p>Estado: <span><?php echo $habitacion->estado; ?></span></p>
            <p>Descripcion: <span><?php echo $habitacion->descripcion; ?></span></p>

            <div class="acciones">
                <a class="boton" href="/habitaciones/actualizar?id=<?php echo $habitacion->id; ?>"> Actualizar / Cancelar</a>

                <form action="/habitaciones/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $habitacion->id; ?>">

                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>