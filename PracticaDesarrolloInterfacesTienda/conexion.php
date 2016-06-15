<?php

//variables definidas para el uso de la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "tienda";
$conexion = mysqli_connect($host, $user, $password, $database) or die("No se pudo conectar a la base de datos especificada: .$database");
?>
