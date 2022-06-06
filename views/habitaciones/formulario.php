<div class="campo">
    <label for="numero">Numero</label>
    <input type="number" id="numero" placeholder="Numero de habitación" name="numero" value="<?php echo $habitacion->numero ?>" />
</div>

<div class="campo">
    <label for="tipo">Tipo</label>
    <input type="text" id="tipo" placeholder="Clásica / Superior / Suite" name="tipo" value="<?php echo $habitacion->tipo ?>" />
</div>

<div class="campo">
    <label for="precioTAlta">Precio tarifa alta</label>
    <input type="number" id="precioTAlta" placeholder="Precio tarifa alta" name="precioTAlta" value="<?php echo $habitacion->precioTAlta ?>" />
</div>

<div class="campo">
    <label for="precioTBaja">Precio tarifa baja</label>
    <input type="number" id="precioTBaja" placeholder="Precio tarifa baja" name="precioTBaja" value="<?php echo $habitacion->precioTBaja ?>" />
</div>

<div class="campo">
    <label for="estado">Estado</label>
    <input type="text" id="estado" placeholder="libre / ocupada" name="estado" value="<?php echo $habitacion->estado ?>" />
</div>

<div class="campo">
    <label for="descripcion">Descripción</label>
    <input type="text" id="descripcion" placeholder="Descripcion" name="descripcion" value="<?php echo $habitacion->descripcion ?>" />
</div>