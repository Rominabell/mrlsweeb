<?php
require_once 'componentes/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])){
    
    $errores = '';
   $email = $conexion->real_escape_string($_POST['nombre-usuario']);
    $contrasenia = $conexion->real_escape_string($_POST['contrasenia']);                                                                       

    if(empty($email)||empty($contrasenia)){
        $errores .= "<div class='alert alert-danger'>Por favor completa todos los campos</div>";
    } else{

        // Verificar si existe
        $query = $conexion->prepare('SELECT * FROM cliente WHERE email = ?');
        $query->bind_param('s', $email);
        $query->execute();

        if($query->get_result()->num_rows > 0){
            $errores .= "<div class='alert alert-danger'>El email ya está registrado</div>";
        }

        if(empty($errores)){

            $contra_hash = password_hash($contrasenia, PASSWORD_BCRYPT);

           
            $query = $conexion->prepare(
                'INSERT INTO cliente (email, contrasenia)
                 VALUES (?, ?)'
            );

            $query->bind_param('ss', 
                $email, $contra_hash
            );

            if($query->execute()){
                header('Location: index.php');
                exit;
            } else {
                $errores .= "<div class='alert alert-danger'>Error al guardar</div>";
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
  <title>Agencia de Viajes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


    <body>
<form method="POST" action="registro.php">
    <?php require_once 'componentes/comp-form-registro.php'; ?>
</form>

<div class="text-center mt-3">
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
