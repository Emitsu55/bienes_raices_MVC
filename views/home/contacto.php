<main class="contenedor">
        <h1>Contacto</h1>

        <?php if($mensaje) {
            echo '<p class= "alerta success">' . $mensaje . '</p>';
        }
        
        
        ?>

        <picture>
            <source srcset="/build/img/destacada3.webp" type="image/webp">
            <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="/build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>
        <h2>Llene el Formulario de Contacto</h2>
        <form action="" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input require name="contacto[nombre]" id="nombre" type="text" placeholder="Tu Nombre...">

                <label require for="mensaje">Mensaje</label>
                <textarea name="contacto[mensaje]" id="mensaje" cols="30" rows="10"></textarea>
            
            </fieldset>
            <fieldset>
                <legend>Información Sobre la Propiedad</legend>
                
                <label for="vende-compra">Vende o Compra:</label>
                <select require name="contacto[tipo]" id="vende-compra">
                    <option value="" disabled selected >--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                
                    <label for="precio">Precio o Presupuesto</label>
                    <input name="contacto[precio]" type="number" id="precio">
            
            </fieldset>
            <fieldset>
                <legend>Información de Contacto</legend>
            
                <p>Como desea ser Contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">TELÉFONO</label>
                    <input require name="contacto[contacto]" type="radio" id="contactar-telefono" name="contacto" value="Teléfono">
                
                    <label for="contactar-email">E-MAIL</label>
                    <input require name="contacto[contacto]" type="radio" id="contactar-email" name="contacto" value="Email">
                
                </div>

                <div id="contacto"></div>

            </fieldset>
            
            <input type="submit" class="btn-verde">
        
        </form>
    </main>