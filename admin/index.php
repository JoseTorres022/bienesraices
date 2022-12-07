<?php

$resultado = $_GET['resultado'] ?? null;

include '../includes/templates/header.php';
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Propiedad registrada correctamente</p>
    <?php endif; ?>

    <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen de referencia</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Casas en la playa</td>
                <td> <img src="/bienesraices/imagenes/21cd53e0b28a1dd36d4a02ecb6d48c00.jpg" class="imagen-tabla" alt=""> </td>
                <td>120000</td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>


<?php
include '../includes/templates/footer.php';
?>