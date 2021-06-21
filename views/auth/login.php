<main class="contenedor seccion">
<h1>Iniciar Sesión</h1>
<?php foreach($errores as $error): ?>

<p class="alerta error txt-center">
<?php echo $error; ?>
</p>

<?php endforeach; ?>
<form method="POST" class="formulario contenido-centrado loginForm">

<fieldset>

<legend>Autenticación</legend>

<label for="email">E-Mail:</label>
<input id="email" name="email" type="email" placeholder="Tu E-Mail" >

<label for="password">Contraseña:</label>
<input id="password" name="password" type="password" placeholder="Tu Contraseña" require>

</fieldset>

<input type="submit" class="btn btn-verde" value="Ingresar">

</form>
</main>