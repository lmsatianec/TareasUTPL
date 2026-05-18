<?php

session_start();
include("conexion.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}

$correo = $_SESSION['correo'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conn, $sql);

$datos = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

    <h1>Perfil de Usuario</h1>

    <p><strong>Nombre:</strong> <?php echo $datos['nombre']; ?></p>

    <p><strong>Correo:</strong> <?php echo $datos['correo']; ?></p>

    <a href="actualizar.php" class="boton">Actualizar Datos</a>

    <a href="cambiar_password.php" class="boton">Cambiar Contraseña</a>

    <a href="logout.php" class="boton">Cerrar Sesión</a>

</div>

</body>
</html>