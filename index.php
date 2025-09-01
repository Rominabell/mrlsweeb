
    <!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Página</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    header {
      background-color: #743014;
    }
    .navbar-toggler {
      border: none;
    }
    .offcanvas-header {
      background-color: #743014;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Encabezado -->
  <header class="p-2">
    <nav class="navbar navbar-dark">
      <div class="container-fluid">
        
        <!-- Botón hamburguesa -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Barra buscadora -->
        <form class="d-flex mx-auto" method="GET" action="buscar.php">
          <input class="form-control me-2" type="search" name="q" placeholder="Buscar..." aria-label="Buscar">
          <button class="btn btn-light" type="submit">Buscar</button>
        </form>
      </div>
    </nav>
  </header>

  <!-- Menú lateral -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateral">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menú</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-unstyled">
        <li><a href="#" class="text-dark text-decoration-none">Inicio</a></li>
        <li><a href="#" class="text-dark text-decoration-none">Nosotros</a></li>
        <li><a href="#" class="text-dark text-decoration-none">Contacto</a></li>
      </ul>
    </div>
  </div>

    





  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    
</body>
</html>
