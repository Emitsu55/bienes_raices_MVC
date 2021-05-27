
<main class="contenedor seccion">
    <h1>Registrar una Propiedad</h1>

     <?php
   if (empty($errores) == false) { ?>
        <div class="alerta error">
            <?php echo '*Falta completar algunos campos'; ?>
        </div>
    <?php
    }
    ?> 


    <form action="./crear" class="formulario" method="POST" enctype="multipart/form-data">

        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" class="btn btn-verde" value="Crear Propiedad">

    </form>

    <a href="./admin" class="btn btn-verde">Volver</a>
</main>

