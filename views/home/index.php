<main class="contenedor">
        <h1>Más sobre nosotros</h1>
        <?php include 'iconos.php'; ?>

    </main><!--Cierre del Main-->

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        
        <?php
        include 'listado.php';
        ?>


        <div class="alinear-derecha">
            <a href="/propiedades" class="btn-verde"> Ver Todas</a>
        </div>
    </section><!--cierre seccion anuncios-->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá 
            en contacto contigo a la brevedad</p>
        <a class="btn-amarillo" href="/contacto">
            Contáctanos
        </a>

    </section><!--Cierre seccion contacto-->

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h2>Nuestro Blog</h2>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/build/img/blog1.webp" type="image/webp">
                        <source srcset="/build/img/blog1.jpeg" type="image/jpeg">
                        <img loading="lazy" src="/build/img/blog1.jpg" alt="Entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>

                <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
                <p>Consejos para construir una terraza en el techo de tu casa con 
                    los mejores materiales y ahorrando dinero</p>

                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/build/img/blog2.webp" type="image/webp">
                        <source srcset="/build/img/blog2.jpeg" type="image/jpeg">
                        <img loading="lazy" src="/build/img/blog2.jpg" alt="Entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guia para la decoración de tu hogar</h4>

                <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
                <p>Maximiza el espacio en tu hogar con esta guia, aprende a 
                    combinar muebles y colores para darle vida a tu espacio</p>

                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h2>Testimoniales</h2>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente 
                    forma, muy buena atención y la casa que 
                    me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>-Emiliano Muñoz</p>
            </div>
        </section>

    </div><!--Cierre seccion inferior-->