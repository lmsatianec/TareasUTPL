<?php

session_start();
include("conexion.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}

$correo = $_SESSION['correo'];

if($_POST){

    $actual = $_POST['actual'];
    $nueva = password_hash($_POST['nueva'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conn, $sql);

    $datos = mysqli_fetch_assoc($resultado);

    if(password_verify($actual, $datos['password'])){

        $update = "UPDATE usuarios
        SET password='$nueva'
        WHERE correo='$correo'";

        $resultado_update = mysqli_query($conn, $update);

        if($resultado_update){

            session_destroy();

            echo "<script>
            alert('Contraseña actualizada. Inicie sesión nuevamente');
            window.location='login.php';
            </script>";

        }

    }else{

        echo "<script>alert('La contraseña actual es incorrecta');</script>";

    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

    <h1>Cambiar Contraseña</h1>

    <form action="" method="POST">

        <input type="password" name="actual"
        placeholder="Contraseña actual" required>

        <input type="password" name="nueva"
        placeholder="Nueva contraseña" required>

        <button type="submit" class="boton">
            Actualizar
        </button>

    </form>

</div>

</body>
</html>