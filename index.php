<?php
require_once 'componentes/conexion.php';
session_start();

// Consulta de los paquetes activos
$paquetes = $conexion->query("SELECT * FROM paquete WHERE estado = 'disponible'");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <a href="login.php"></a>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia de Viajes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-img-top-fixed {
      height: 200px; 
      object-fit: cover; 
    }

    .my-navbar {
    background-color: #463214ff;
    
    }

    .navbar-brand {
      color: #E8D1A7;
    }

    .offcanvas {
      color: #725C3A;
    }

    .card-body {
      background-color: #E8D1A7;
    }

    .text-center {
      font-family: 'Times New Roman', Times, serif;
      font-size: 50px;
      color: #725C3A;
    }

    .card_footer {
      background-color: #725C3A ;
    
    }
    




  
  </style>
</head>
<body class="bg-light">
  <?php
    if (isset($_SESSION['clienteid'])) {

      echo 'Hola' . $_SESSION['nombre'];
      echo '<a href="logout.php">INICIO DE SESION </a>';
    } else {
      echo '<a href="login.php">INICIO DE SESION </a>';
    }
  ?>
  <nav class="navbar my-navbar py-3 shadow-sm">
    <div class="container-fluid">
      <button 
        class="navbar-toggler border-0" 
        type="button" 
        data-bs-toggle="offcanvas" 
        data-bs-target="#offcanvasNavbar" 
        aria-controls="offcanvasNavbar"
        
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand ms-auto"  href="index.php" >
        MRLSWEEB
      </a>
    </div>
  </nav>

  <div 
    class="offcanvas offcanvas-start" 
    tabindex="-1" 
    id="offcanvasNavbar" 
    aria-labelledby="offcanvasNavbarLabel"
  >
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú de Opciones</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Destinos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
        </ul>
    </div>
  </div>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Nuestros Paquetes</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($paquetes as $paquete) { ?>
        <div class="col">
          <div class="card shadow-sm h-100">
            <img src="<?= htmlspecialchars($paquete['url_imagen']) ?>" class="card-img-top card-img-top-fixed" alt="Imagen del paquete">
            <div class="card-body" >
              <h5 class="card-title"><?= htmlspecialchars($paquete['nombre']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($paquete['descripcion']) ?></p>
            </div>
            <div class="card-footer text-center">
              <a href="detalle.php?id=<?= $paquete['id_paquete'] ?>" class="btn btn-success w-100">
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