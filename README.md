# GS Web - Sistema Web de Autenticación y Gestión de Usuarios

UNIVERSIDAD TÉCNICA PARTICULAR DE LOJA
MATERIA: DESARROLLO WEB
ALUMNO: LUIS SATIAN

---

## 1. Descripción general del proyecto

GS Web es un sistema web académico desarrollado con PHP y MySQL. El objetivo principal del proyecto es implementar un sistema de autenticación de usuarios que permita realizar registro, inicio de sesión, acceso a una zona privada, actualización de datos personales, cambio seguro de contraseña y cierre de sesión.

El proyecto fue desarrollado como práctica de la asignatura Desarrollo Web, aplicando conceptos relacionados con formularios HTML, conexión PHP con MySQL, sesiones PHP, validaciones básicas y almacenamiento seguro de contraseñas mediante hash.

---

# 2. Tecnologías utilizadas

Las herramientas utilizadas para el desarrollo del proyecto fueron:

- PHP
- MySQL
- phpMyAdmin
- XAMPP
- HTML
- CSS
- Visual Studio Code
- GitHub

---

# 3. Estructura del proyecto


gs_web/
│
├── css/
│   └── estilos.css
│
├── conexion.php
├── index.php
├── registro.php
├── login.php
├── perfil.php
├── actualizar.php
├── cambiar_password.php
├── logout.php
├── database.sql
└── README.md


---

# 4. Descripción de archivos principales

| Archivo | Función |
|---|---|
| index.php | Página principal del sistema |
| registro.php | Registro de usuarios |
| login.php | Inicio de sesión |
| perfil.php | Zona privada del usuario |
| actualizar.php | Actualización de datos |
| cambiar_password.php | Cambio de contraseña |
| logout.php | Cierre de sesión |
| conexion.php | Conexión a MySQL |
| estilos.css | Diseño visual del sistema |
| database.sql | Script de base de datos |
| README.md | Documentación del proyecto |

---

# 5. Requisitos del sistema

Para ejecutar el proyecto se requiere:

- XAMPP instalado
- Apache activo
- MySQL activo
- phpMyAdmin
- Navegador web
- Visual Studio Code o editor similar

---

# 6. Instalación de XAMPP

## Paso 1: Descargar XAMPP

Descargar XAMPP desde el sitio oficial de Apache Friends.

## Paso 2: Instalar XAMPP

Durante la instalación mantener seleccionados los siguientes componentes:


Apache
MySQL
PHP
phpMyAdmin


## Paso 3: Abrir XAMPP Control Panel

Una vez instalado abrir:


XAMPP Control Panel


## Paso 4: Iniciar servicios

Iniciar:


Apache
MySQL


Los servicios deben quedar activos.

---

# 7. Acceso a phpMyAdmin

Con Apache y MySQL activos abrir el navegador y acceder a:


http://localhost/phpmyadmin


Desde phpMyAdmin se administrará la base de datos del proyecto.

---

# 8. Usuario de base de datos utilizado

Para el proyecto se utiliza el usuario local predeterminado de XAMPP:


Servidor: localhost
Usuario: root
Contraseña: vacía
Base de datos: gs_web_db


Estos valores están configurados en el archivo:


conexion.php


Ejemplo:


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


---

# 9. Creación de la base de datos

## Paso 1: Abrir phpMyAdmin

Ingresar a:


http://localhost/phpmyadmin


## Paso 2: Abrir SQL

Seleccionar la opción:


SQL


## Paso 3: Ejecutar el script de creación


CREATE DATABASE gs_web_db
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;


## Paso 4: Seleccionar la base de datos


USE gs_web_db;


---

# 10. Creación de la tabla usuarios

Ejecutar el siguiente script:


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


---

# 11. Explicación de campos

| Campo | Descripción |
|---|---|
| id | Identificador único |
| cedula | Cédula del usuario |
| nombre | Nombre completo |
| correo | Correo electrónico |
| password | Contraseña cifrada |
| fecha_registro | Fecha de creación |

El campo `correo` utiliza `UNIQUE` para evitar duplicados.

El campo `password` usa `VARCHAR(255)` porque las contraseñas se almacenan mediante hash.

---

# 12. Script completo de base de datos


CREATE DATABASE gs_web_db
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

USE gs_web_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


Este contenido también se encuentra dentro del archivo:


database.sql


---

# 13. Instalación del proyecto en XAMPP

## Paso 1: Descargar el proyecto

Descargar o clonar el repositorio desde GitHub.

## Paso 2: Copiar el proyecto

Copiar la carpeta:


gs_web


Dentro de:


C:\xampp\htdocs\


La ruta final debe quedar así:


C:\xampp\htdocs\gs_web\


## Paso 3: Verificar servicios

En XAMPP verificar que estén activos:


Apache
MySQL


## Paso 4: Abrir el sistema

Desde el navegador acceder a:


http://localhost/gs_web


---

# 14. Flujo de prueba del sistema

1. Abrir la página principal.
2. Registrar un usuario.
3. Iniciar sesión.
4. Acceder al perfil privado.
5. Actualizar datos.
6. Cambiar contraseña.
7. Volver a iniciar sesión.
8. Cerrar sesión.

---

# 15. Manejo de sesiones en PHP

El sistema utiliza sesiones PHP para controlar el acceso a páginas privadas.

Cuando el usuario inicia sesión correctamente se crean variables de sesión:


$_SESSION['usuario'] = $fila['nombre'];
$_SESSION['correo'] = $fila['correo'];


Las páginas privadas validan la existencia de sesión mediante:


if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}


Esto evita accesos no autorizados.

---

# 16. Seguridad aplicada

## password_hash()

Las contraseñas se almacenan utilizando:


password_hash()


Esto evita guardar contraseñas en texto plano.

## password_verify()

Durante el login se utiliza:


password_verify()


Para validar la contraseña ingresada contra el hash almacenado.

## Validación de sesión

Las páginas privadas verifican si existe una sesión activa.

## Validación de correo

El sistema verifica que el correo no exista antes de registrar usuarios.

## Logout

El cierre de sesión se realiza mediante:


session_destroy();


---

# 17. Consideraciones finales

Este proyecto fue desarrollado para pruebas locales usando XAMPP.

En un entorno de producción se recomienda:

- usar usuarios MySQL personalizados,
- aplicar HTTPS,
- usar sentencias preparadas,
- fortalecer validaciones,
- y aplicar controles avanzados de seguridad.

---

# 18. Autor

Proyecto desarrollado como actividad académica de Desarrollo Web.

