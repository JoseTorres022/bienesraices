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


//Fucion de eliminar en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //Eliminar tambien el archivo
        $queryD = "SELECT imagen FROM propiedades WHERE id=${id}";
        $resultado = mysqli_query($db, $queryD);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('/bienesraices/imagenes/' . $propiedad['imagen']);

        //Eliminar en la base de datos
        $query = "DELETE FROM propiedades WHERE id=${id}";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=3');
        }

        // echo $query;
    }
}


//mandamos a llanar al header
include '../includes/templates/header.php';
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Propiedad Registrada correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Propiedad Actualizado correctamente</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Propiedad Eliminada correctamente</p>
    <?php endif; ?>

    <a href="/bienesraices/" class="boton boton-verde">Pag. Principal</a>
    <a href="/bienesraices/admin/" class="boton boton-verde">&#10227; Refrescar</a>
    <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">+ Nueva Propiedad</a>
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
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value=" <?php echo $propiedad['id']; ?> ">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

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