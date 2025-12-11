<?php
require_once 'componentes/conexion.php';

$errores = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])){

   
    $email = $conexion->real_escape_string($_POST['email']);
    $contrasenia = $conexion->real_escape_string($_POST['contrasenia']);

    
    if(empty($email) || empty($contrasenia)){
        $errores .= "<div class='alert alert-danger'>Por favor completa todos los campos</div>";
    } else {

        
        $query = $conexion->prepare("SELECT id_cliente FROM cliente WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();

        if($query->get_result()->num_rows > 0){
            $errores .= "<div class='alert alert-danger'>El email ya está registrado</div>";
        }

       
        if(empty($errores)){

            $contra_hash = password_hash($contrasenia, PASSWORD_BCRYPT);

            $query = $conexion->prepare(
                "INSERT INTO cliente (email, contrasenia)
                 VALUES (?, ?)"
            );

            $query->bind_param("ss", $email, $contra_hash);

            if($query->execute()){
                header("Location: index.php");
                exit;
            } else {
                $errores .= "<div class='alert alert-danger'>
                                Error al guardar en la base de datos.
                             </div>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">

<<<<<<< HEAD
  <h2 class="mb-4">Crear cuenta</h2>
=======
    <body>
<form method="POST" action="registro.php">
    <?php require_once 'componentes/comp-form-registro.php'; ?>
</form>

<div class="text-center mt-3">
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</div>
>>>>>>> 5ea3c106396edf4a4ab284f986e3c8069b225190

  <?php if(!empty($errores)) echo $errores; ?>

  <form method="POST" action="registro.php">

      <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control">
      </div>

      <div class="mb-3">
          <label class="form-label">Contraseña</label>
          <input type="password" name="contrasenia" class="form-control">
      </div>

      <button type="submit" name="registrar" class="btn btn-primary">Registrarse</button>

  </form>

  <p class="mt-3">
    ¿Ya tienes usuario? <a href="index.php">Iniciar sesión</a>
  </p>

</body>
</html>
