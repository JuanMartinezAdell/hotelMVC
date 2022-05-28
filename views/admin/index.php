<h1 class="nombre-pagina">Panel de Adminstración</h1>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar Reservas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fechaEntrada">Fecha Entrada</label>
            <input type="date" id="fechaEntrada" name="fechaEntrada" />

        </div>
    </form>
</div>

<div id="citas-admin"></div>