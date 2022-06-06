<h1 class="nombre-pagina">Panel de Adminstración</h1>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar Reservas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fechaEntrada">Fecha Entrada</label>
            <input type="date" id="fechaEntrada" name="fechaEntrada" value="<?php echo $fechaEntrada; ?>" />
        </div>
        <!-- <div class="campo">
            <label for="fechaSalida">Fecha Salida</label>
            <input type="date" id="fechaSalida" name="fechaSalida" value="<?php echo $fechaSalida;  ?>" />
        </div>-->
    </form>
</div>

<?php
if (count($reservas) === 0) {
    echo "<h2>No hay reservas en esta fecha</h2>";
}
?>



<div id="reservas-admin">
    <ul class="reservas">
        <?php
        $numReserva = 0;
        $totalAlta = 0;
        $totalBaja = 0;
        foreach ($reservas as $key => $reserva) {

            // debuguear($key);
        ?>
            <li>
                <h3>Reserva de habitación</h3>
                <p>ID: <span><?php echo $reserva->id; ?></span></p>
                <p>Numero habitación: <span><?php echo $reserva->numero; ?></span></p>
                <p>Tipo: <span><?php echo $reserva->tipo; ?></span></p>
                <p>Precio tarifa alta: <span><?php echo $reserva->precioTAlta; ?></span></p>
                <p>Precio tarifa baja: <span><?php echo $reserva->precioTBaja; ?></span></p>
                <p>Descripción: <span><?php echo $reserva->descripcion; ?></span></p>
                <p>Fecha Entrada: <span><?php echo $reserva->fechaEntrada; ?></span></p>
                <p>Fecha Salida: <span><?php echo $reserva->fechaSalida; ?></span></p>
                <p>Nombre: <span><?php echo $reserva->nombre; ?></span></p>
                <p>Email: <span><?php echo $reserva->email; ?></span></p>
                <p>Dni: <span><?php echo $reserva->dni; ?></span></p>
                <p>Dirección: <span><?php echo $reserva->direccion; ?></span></p>
                <p>Telefono: <span><?php echo $reserva->telefono; ?></span></p>

                <?php
                $totalAlta += $reserva->precioTAlta;
                $totalBaja += $reserva->precioTBaja;
                ?>

                <p class="total">Total a pagar temporada alta: <span><?php echo $totalAlta; ?>€</span></p>
                <p class="total">Total a pagar temporada baja: <span><?php echo $totalBaja; ?>€</span></p>
                <form action="/api/eliminar" method="POST">
                    <input type="hidden" name="id" value='<?php echo $reserva->id; ?>'>
                    <input type="submit" class="boton-eliminar" value="Eliminar">
                </form>
            </li>
        <?php
        }
        ?>

    </ul>
</div>

<?php
$script = "
        <script src='build/js/buscador.js'></script>
    ";
?>