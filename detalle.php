<?php
require_once 'componentes/conexion.php';




// Recupero el ID del paquete desde la URL
$id_paquete = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_paquete > 0) {

    // Consulto el paquete por ID
    $paquete = $conexion->query("
        SELECT *
        FROM paquete
        WHERE id_paquete = $id_paquete 
        AND (estado = 'disponible' OR estado = 'proximamente')
    ")->fetch_assoc();

    

    // Calcular datos adicionales
    $fechaLimite = new DateTime($paquete['f_limite']);
    $fechaInicio = new DateTime($paquete['f_inicio']);
    $fechaFin = new DateTime($paquete['f_fin']);
    $hoy = new DateTime();

    $dias_restantes = $hoy->diff($fechaLimite)->format('%a');
    $dias_estadia = $fechaInicio->diff($fechaFin)->format('%a');
    $cupo_disponible = $paquete['cupo_total'] - $paquete['cupo_reservado'];

    // Consultar los servicios asociados
    $servicios = $conexion->query("
        SELECT s.nombre 
        FROM servicios s
        JOIN paquete_servicio ps ON s.id_servicio = ps.id_servicio
        WHERE ps.id_paquete = $id_paquete
    ");
} else {
    echo "<div class='alert alert-danger'>ID de paquete inválido.</div>";
    exit;
}
?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="<?= htmlspecialchars($paquete['url_imagen']) ?>" class="img-fluid rounded-start" alt="Imagen del paquete">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h3 class="card-title"><?= htmlspecialchars($paquete['nombre']) ?></h3>
          <p class="card-text"><?= htmlspecialchars($paquete['descripcion_larga']) ?></p>
          <p><strong>Días de estadía:</strong> <?= $dias_estadia ?></p>
          <p><strong>Días restantes para reservar:</strong> <?= $dias_restantes ?></p>
          <p><strong>Cupo disponible:</strong> <?= $cupo_disponible ?></p>
          <p><strong>Servicios incluidos:</strong></p>
          <ul>
            <?php while ($servicio = $servicios->fetch_assoc()) { ?>
              <li><?= htmlspecialchars($servicio['nombre']) ?></li>
            <?php } ?>
          </ul>
          <a href="index.php" class="btn btn-secondary mt-3">Volver al inicio</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
