<?php
include '../../includes/config/database.php';
$db = conectarDB();
// var_dump($db);

include '../../includes/templates/header.php';
?>

<main class="contenedor seccion">
    <h1>Registrar Propiedades</h1>
    <a href="/bienesraices/admin/" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Infomracion General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" placeholder="Precio Propiedad">

            <label for="imagen">Iamgen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea name="" id="descripcion" name="descripcion" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>

            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="10">

            <label for="WC">Baños:</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1" max="10">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="10">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="" id="">
                <option value="1">Elige</option>
                <option value="2"></option>
            </select>
        </fieldset>
        <input type="submit" value="Registrar Propiedad" class="boton boton-verde">
    </form>
</main>


<?php
include '../../includes/templates/footer.php';
?>