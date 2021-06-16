<?php 


if($resultado) { ?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
    
        <?php 
        
         $mensaje = mostrarNotificaion(intval($resultado));
    
         if($mensaje) { ?>
          <p class="alerta success"><?php echo s($mensaje); ?></p>
        <?php } 

} ?>

<main class="contenedor">

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- 4- Mostrar los resultados-->
            
        <?php foreach ($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="<?php echo "/imagenes/" . $propiedad->imagen; ?>" class="imagen-tabla" alt=""></td>
                <td><?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="./eliminar">
                    <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                    <input type="hidden" name="tipo" value="propiedad">
                    <input type="submit" class="btn-rojo-block" value="Eliminar Registro">
                    </form>
                    <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="btn-verde-block">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>    
        </tbody>
    </table>
    <a href="/propiedades/crear" class="btn btn-verde">Nueva Propiedad</a>

    <table class="propiedades">

    <h2>Vendedores</h2>

        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- 4- Mostrar los resultados-->
            
        <?php foreach ($vendedores as $vendedor): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                    <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                    <input type="hidden" name="tipo" value="vendedor">
                    <input type="submit" class="btn-rojo-block" value="Eliminar">
                    </form>
                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="btn-verde-block">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>    
        </tbody>
    </table>
    <a href="/vendedores/crear" class="btn btn-verde">Nuevo Vendedor</a>

</main>


