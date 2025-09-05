<?php
require_once 'componentes/conexion.php';


$paquetes = $conexion-> query(query: "SELECT * FROM m_viajes WHERE paquete.estado = 'disponible';");

?>
  
  
  
  
  
  
  <!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Página</title>
  
</head>
<body>

  <?php
    foreach($paquete as $paquetes){
      echo $paquetes['nombre'];
    }
  ?>

</body>
</html>
