<?php
$servidor = "localhost";
$usuario = "root";
$contrasenia = "";
$base = "m_viajes"; 

$conexion = new mysqli($servidor, $usuario, $contrasenia, $base);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
