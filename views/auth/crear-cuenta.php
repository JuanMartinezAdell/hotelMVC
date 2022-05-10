<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Introduce tus datos en el siguiente formulario para crear una cuenta</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/crear-cuenta">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="<?php echo s($usuario->nombre); ?>" />
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" value="<?php echo s($usuario->apellido); ?>" />
    </div>
    <div class="campo">
        <label for="nombre">DNI</label>
        <input type="text" id="dni" name="dni" placeholder="Tu Teléfono" value="<?php echo s($usuario->dni); ?>" />
    </div>
    <div class="campo">
        <label for="nombre">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Tu Teléfono" value="<?php echo s($usuario->telefono); ?>" />
    </div>
    <div class="campo">
        <label for="nombre">Direcciónn</label>
        <input type="text" id="direccion" name="direccion" placeholder="Tu Driección" value="<?php echo s($usuario->direccion); ?>" />
    </div>
    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Tu E-mail" value="<?php echo s($usuario->email); ?>" />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Tu Password" />
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Incia Sesion</a>
        <a href="/olvide">¿Olvidaste tu password?</a>
    </div>

</form>