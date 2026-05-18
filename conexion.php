<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "gs_web_db";

$conn = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>