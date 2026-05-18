<?php

include("conexion.php");

if($_POST){

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $verificar = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado_verificar = mysqli_query($conn, $verificar);

    if(mysqli_num_rows($resultado_verificar) > 0){

        echo "<script>alert('El correo ya se encuentra registrado');</script>";

    }else{

        $sql = "INSERT INTO usuarios(cedula,nombre,correo,password)
        VALUES('$cedula','$nombre','$correo','$password')";

        $resultado = mysqli_query($conn, $sql);

        if($resultado){
            echo "<script>alert('Usuario registrado correctamente');</script>";
        }else{
            echo "<script>alert('Error al registrar');</script>";
        }

    }

}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

    <h1>Registro</h1>

    <form action="" method="POST">

        <input type="text" name="cedula" placeholder="Cédula" required>

        <input type="text" name="nombre" placeholder="Nombre completo" required>

        <input type="email" name="correo" placeholder="Correo electrónico" required>

        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit" class="boton">Guardar</button>

    </form>

</div>

</body>
</html>