<?php
require_once 'componentes/conexion.php';

// Consulta de los paquetes activos
$paquetes = $conexion->query("SELECT * FROM paquete WHERE estado = 'activo'");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia de Viajes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h1 class="text-center mb-4">Nuestros Paquetes</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($paquetes as $paquete) { ?>
        <div class="col">
          <div class="card shadow-sm h-100">
            <img src="<?= htmlspecialchars($paquete['url_imagen']) ?>" class="card-img-top" alt="Imagen del paquete">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($paquete['nombre']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($paquete['descripcion']) ?></p>
            </div>
            <div class="card-footer text-center">
              <a href="detalle.php?id=<?= $paquete['id_paquete'] ?>" class="btn btn-primary w-100">
                Ver detalle
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
