<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if (isset($_SESSION['admin'])) { ?>
    <div class="barra-reservas">
        <a class="boton" href="/admin">Ver Reservas</a>
        <a class="boton" href="/habitaciones">Actualizar Habitaciones</a>
        <a class="boton" href="/habitaciones/crear">Nueva habitacion</a>
    </div>
<?php } ?>