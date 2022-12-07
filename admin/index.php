<?php
//importar la conexion hacia la base de datps
include '../includes/config/database.php';
$db = conectarDB();

//Definir el Query(Sentencia)
$query = "SELECT * FROM propiedades";

//Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

//mensaje condicional
$resultado = $_GET['resultado'] ?? null;

//mandamos a llanar al header
include '../includes/templates/header.php';
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Propiedad registrada correctamente</p>
    <?php elseif (intval($resultado) == 2) : ?>
        <p class="alerta exito">Propiedad actualizado correctamente</p>
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
        <!-- Listnado los datos -->
        <tbody>
            <!-- Iteramos los datos de la BD, con while -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <!-- Mostrando los datos de la BD en la tabla, haciendo dinamica la tabla -->
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['nombre']; ?> </td>
                    <td> <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"> </td>
                    <td> <?php echo $propiedad['precio']; ?> </td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id= <?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>


<?php
//Cerramos la conexion de la BD
mysqli_close($db);
include '../includes/templates/footer.php';
?>