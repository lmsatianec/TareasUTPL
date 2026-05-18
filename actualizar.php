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

if($_POST){

    $nombre = $_POST['nombre'];

    $update = "UPDATE usuarios SET nombre='$nombre'
    WHERE correo='$correo'";

    $resultado_update = mysqli_query($conn, $update);

    if($resultado_update){

        $_SESSION['usuario'] = $nombre;

        echo "<script> alert('Datos actualizados'); window.location='perfil.php';
        </script>";

    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

    <h1>Actualizar Perfil</h1>

    <form action="" method="POST">

        <input type="text" name="nombre"
        value="<?php echo $datos['nombre']; ?>" required>

        <button type="submit" class="boton">Actualizar</button>

    </form>

</div>

</body>
</html>