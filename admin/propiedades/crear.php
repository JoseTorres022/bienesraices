<?php
include '../../includes/config/database.php';
$db = conectarDB();
//mostrar los datos de los propiedades delsistema
// var_dump($db);

//mostrar datos del fomrulario en el navegador
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

//arreglo con mensaje de errores
$errores = [];

//Guardar valores previos del formulario cuando faltan datos.
$nombre = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';


//ejecutar el codigo despues de lo que hace el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];


    if (!$nombre) {
        $errores[] = "Titulo de la propiedad es obligatoria";
    }
    if (!$precio) {
        $errores[] = "Precio de la propiedad es obligatoria";
    }
    if (strlen($descripcion) < 10) {
        $errores[] = "Descripcion de la propiedad es obligatoria";
    }
    if (!$habitaciones) {
        $errores[] = "Habitaciones de la propiedad es obligatoria";
    }
    if (!$wc) {
        $errores[] = "La cantidad de baños es obligatoria";
    }
    if (!$estacionamiento) {
        $errores[] = "El/los estacionamiento(s) de la propiedad es obligatoria";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";


    // exit;

    //revisar que el arreglo de errores este vacio
    if (empty($errores)) {
        //insertar datos en la base de datos
        $query = "INSERT INTO propiedades (nombre, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId)
VALUES ('$nombre','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedorId')";

        // echo $query;

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            echo "datos correctos";
        }
    }


    //insertar datos en la base de datos
    // $query = "INSERT INTO propiedades (nombre, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId)
    //           VALUES ('$nombre','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedorId')";

    // // echo $query;

    // $resultado = mysqli_query($db, $query);
    // if ($resultado) {
    //     echo "datos correctos";
    // }
}

include '../../includes/templates/header.php';
?>

<main class="contenedor seccion">
    <h1>Registrar Propiedades</h1>
    <a href="/bienesraices/admin/" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php">
        <fieldset>
            <!-- CON LA PROPIEDAD VALUE, DEJAMOS ALMACENADO EL DATO EN EL FOMRULARIO, AUNQUE FALTEN DATOS -->
            <legend>Infomracion General</legend>
            <label for="nombre">Titulo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Titulo Propiedad" value="<?php echo $nombre ?>">

            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Iamgen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion" cols="30" rows="10" value="<?php echo $descripcion ?>"></textarea>
        </fieldset>

        <fieldset>

            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="10" value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="10" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="10" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value="">--- Seleccione ---</option>
                <option value="1">Juan</option>
                <option value="2">KAren</option>
            </select>
        </fieldset>
        <input type="submit" value="Registrar Propiedad" class="boton boton-verde">
    </form>
</main>


<?php
include '../../includes/templates/footer.php';
?>