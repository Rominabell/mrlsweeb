<?php
require_once 'componentes/conexion.php';

// Recuperar el ID del paquete desde la URL
$id_paquete = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_paquete > 0) {

    // Consultar el paquete
    $paquete = $conexion->query("
        SELECT *
        FROM paquete
        WHERE id_paquete = $id_paquete 
        AND (estado = 'disponible' OR estado = 'proximamente')
    ")->fetch_assoc();

    if (!$paquete) {
        echo "<div class='alert alert-danger text-center mt-5'>Paquete no encontrado o no disponible.</div>";
        exit;
    }

    $fechaLimite = new DateTime($paquete['f_limite']);
    $fechaInicio = new DateTime($paquete['f_inicio']);
    $fechaFin = new DateTime($paquete['f_fin']);
    $hoy = new DateTime();

    $dias_restantes = $hoy->diff($fechaLimite)->format('%a');
    $dias_estadia = $fechaInicio->diff($fechaFin)->format('%a');
    $cupo_disponible = $paquete['cupo_total'] - $paquete['cupo_reservado'];

  
    $servicios = $conexion->query("
       SELECT *
       FROM servicio JOIN paquete_servicio ON servicio.id_servicio = paquete_servicio.id_paquete
       Where paquete_servicio.id_paquete = $id_paquete;
    ");
} else {
    echo "<div class='alert alert-danger mt-5 text-center'>ID de paquete inválido.</div>";
    exit;
}
?>

<!-- ======== ESTILOS ======== -->
<style>
.card-horizontal {
  max-width: 900px;
  margin: 30px auto;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 0 15px rgba(0,0,0,0.2);
}


.card-horizontal img {
  width: 100%;
  height: 400px;
  object-fit: cover;
}


.card-info {
  padding: 25px;
  background-color: #E5D2B8;
}

.badge-custom {
  font-size: 0.85rem;
  margin-right: 8px;
  border-radius: 6px;
}

.btn-reservar {
  background-color: #155825;
  color: white;
  font-weight: bold;
  width: fit-content; /* o un ancho fijo, ej: 200px */
  border-radius: 20px;
  text-decoration: none;
  display: block; /* Para que el margin funcione correctamente */
  margin: 0 auto; /* Esto lo centra horizontalmente */
  padding: 10px 20px; /* Espaciado interno */
  text-align: center; /* Centra el texto dentro del botón */
  margin-bottom: 15px;
  display: block;
}

.btn-reservar:hover {
  background-color: #095519ff;
}

.btn-volver {
  background-color: #6c757d;
  color: white;
  border-radius: 20px;
  text-decoration: none;
  display: block;
  width: fit-content; /* ajusta el ancho al contenido */
  margin: 0 auto; /* centra el botón */
  padding: 10px 20px; /* da espacio interno */
  font-weight: bold;
  text-align: center;
  margin-top: 15px;
  display: block;
}

.precio {
  color: #175c27ff;
  font-weight: bold;
  font-size: 1.3rem;
  text-align: center;
}

/* Responsive */
@media (max-width: 768px) {
  .card-horizontal img {
    height: 250px;
  }
  .card-info {
    padding: 15px;
  }
}
</style>

<!-- ======== CONTENIDO ======== -->
<div class="container mt-5">
  <div class="card card-horizontal">
    <!-- Imagen del paquete -->
    <img src="<?= htmlspecialchars($paquete['url_imagen']) ?>" alt="Imagen del paquete">

    <!-- Información del paquete -->
    <div class="card-info">
      <h3 class="card-title text-center"><?= htmlspecialchars($paquete['nombre']) ?></h3>

      <div class="text-center mb-3">
        <span class="badge bg-primary badge-custom">Familia</span>
        <span class="badge bg-info text-dark badge-custom"><?= $dias_estadia ?> días</span>
        <span class="badge bg-danger badge-custom">Lugares: <?= $cupo_disponible ?></span>
      </div>

      <p class="text-muted text-center"><?= htmlspecialchars($paquete['descripcion_larga']) ?></p>

      <h5 class="mt-4">Servicios incluidos:</h5>
      <ul>
        <?php while ($servicio = $servicios->fetch_assoc()) { ?>
          <li>
            <strong><?= htmlspecialchars($servicio['nombre']) ?></strong>  
            (<?= htmlspecialchars($servicio['tipo']) ?>):  
            <?= htmlspecialchars($servicio['descripcion']) ?>
          </li>
        <?php } ?>
      </ul>

      <p class="precio mt-3">USD <?= number_format($paquete['precio'], 2) ?></p>

      <div class="mt-4">
        <a href="reservar.php?id=<?= $id_paquete ?>" class="btn btn-reservar mb-2">¡RESERVAR AHORA!</a>
        <a href="index.php" class="btn btn-volver">Volver</a>
      </div>
    </div>
  </div>
</div>