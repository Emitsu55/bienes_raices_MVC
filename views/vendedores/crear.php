<main class="contenedor seccion">
    <h1>Registrar un Vendedor</h1>

    <?php
    if (empty($errores) == false) { ?>
        <div class="alerta error">
            <?php echo '*Falta completar algunos campos'; ?>
        </div>
    <?php
    }
    ?>


    <form action="/vendedores/crear" class="formulario" method="POST">

        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" class="btn btn-verde" value="Crear Vendedor">

    </form>

    <a href="/admin" class="btn btn-verde">Volver</a>
</main>