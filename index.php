<?php
require_once 'componentes/conexion.php';


$paquetes = $conexion->query("SELECT * FROM paquete WHERE paquete.estado = 'activo';");


?>






<!-- index.php -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Mi Página</title>

</head>

<body>
  <div class="row row-cols-2 row-cols-md-3 g-3">
    <?php foreach ($paquetes as $paquete) { ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="d-flex flex-column">
          <div class="card">
            <div class="card-title">
              <h3><?= $paquete['nombre'] ?></h3>
            </div>
            <div class="card-body">
              <img class="card-img-top" src="<?=$paquete['url_imagen']?>" alt="">
              <p><?= $paquete['descripcion'] ?></p>
            </div>
            <div class="card-footer"></div> 
          </div>
        </div>
      </div>

    <main class="flex_shrink-0">
      <section id="ofertas" class="mt-4">
        <div class="container">
          <div class="row row-cols-2 row-cols-md-3 g-4">
              if ($paquete->num-rows> 0) {
                  <span class="badge bg-danger">
                    <i class="bi bi-people-fill me-1"></i><?= $cupo_disponible?>
                    <span class=""d-none d-md-inline>lugares disponibles</span>
                    
                  </span>
            }
          </div>
        </div>
      </section>
    </main>

    <shrink-0">
    <!-- agregar boton aca -->
     



    <?php } ?>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>