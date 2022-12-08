<?php
//Importar la base de datos
include 'includes/config/database.php';
$db = conectarDB();

//Crear la consulta  a la base de datos
$query = "SELECT * FROM propiedades";

//Leermos los resultados
$resultado = mysqli_query($db, $query);


?>
<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio1.webp" type="image/webp">
                <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa de Lujo en el Lago</h3>
                <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                <p class="precio">$3,0000,000</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p>4</p>
                    </li>
                </ul>

                <a href="anuncio.html" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
            <!--.contenido-anuncio-->
        </div>
        <!--anuncio-->

        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio2.webp" type="image/webp">
                <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa terminados de lujo</h3>
                <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                <p class="precio">$3,0000,000</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p>4</p>
                    </li>
                </ul>

                <a href="anuncio.html" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
            <!--.contenido-anuncio-->
        </div>
        <!--anuncio-->
    <?php endwhile; ?>
</div>
<!--.contenedor-anuncios-->
<?php
//Cerrando la conexiom
?>