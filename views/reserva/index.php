<h1 class="nombre-pagina">Reserva De Habitaciones</h1>
<p class="descripcion-pagina">Indica las fechas de tu estancia y alojamiento</p>

<?php
//include_once __DIR__ . '/../templates/barra.php';
?>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Información Reserva</button>
        <button type="button" data-paso="2">Habitaciones</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
    <div id="paso-1" class="seccion">
        <h2>Tus Datos y Reserva</h2>
        <p class="text-center">Coloca tus datos y fecha de tu reserva</p>
        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu Nombre" value="<?php echo $nombre; ?>" disabled />
            </div>
            <div class="campo">
                <label for="fecha">Fecha Entrada</label>
                <input id="fechaEntrada" type="date" min="<?php echo date('Y-m-d', strtotime('day')); ?>" />
            </div>
            <div class="campo">
                <label for="fecha">Fecha Salida</label>
                <input id="fechaSalida" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" />
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>">

        </form>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Reservas</h2>
        <p class="text-center">Elige habitación</p>
        <div id="habitaciones" class="listado-habitaciones"></div>
    </div>

    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button id="anterior" class="boton">&laquo; Anterior</button>

        <button id="siguiente" class="boton">Siguiente &raquo;</button>
    </div>
</div>

<?php
$script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>