<?php
$servidor = "localhost";
$usuario = "root";
$contrasenia = "";
$base = "m_viajes";

//conexion propia a la bbdd
$conexion = new mysqli($servidor,$usuario,$contrasenia,$base);

// chequear la conexion
if($conexion->connect_error){
    die("Error de conexion: ". $conexion->connect_error);
}