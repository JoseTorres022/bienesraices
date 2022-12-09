<?php 
//cargando la sesion
session_start();

//cerrando la session
$_SESSION = [];

header('Location: /');