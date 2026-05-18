<?php

session_start();
include("conexion.php");

if($_POST){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $fila = mysqli_fetch_assoc($resultado);

        if(password_verify($password, $fila['password'])){

            $_SESSION['usuario'] = $fila['nombre'];
            $_SESSION['correo'] = $fila['correo'];

            header("Location: perfil.php");

        }else{

            echo "<script>alert('Contraseña incorrecta');</script>";

        }

    }else{

        echo "<script>alert('Usuario no encontrado');</script>";

    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

    <h1>Iniciar Sesión</h1>

    <form action="" method="POST">

        <input type="email" name="correo" placeholder="Correo electrónico" required>

        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit" class="boton">Ingresar</button>

    </form>

</div>

</body>
</html>