<?php
    require_once 'componentes/conexion.php';
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])) {
        $errores = '';
        $email = $conexion->real_escape_string($_POST['nombre-usuario']);
        $contrasenia = $conexion->real_escape_string($_POST['contrasenia']);

        if(empty($email)||empty($contrasenia)){
            $errores .= "<div class='alert alert_danger'> Porfavor, completa todos los campos</div>";
        } else{
            $frase =$conexion->prepare("SELECT * FROM cliente WHERE cliente.email =?");
            $frase-> bind_param('s', $email);
            $frase->execute();

            //obtiene un usuario de la BBDD (en forma de array)
            $cliente = $frase->get_result()->fetch_assoc();

            if($cliente){
                if(password_verify($contrasenia, $cliente['contrasenia'])){
                    session_start();
                    $_SESSION["clienteid"] = $cliente['id_cliente'];
                    $_SESSION['nombre'] = $cliente['nombre'];

                    $conexion->close();

                    header('Location: index.php');
                    exit;
                } else {
                    $errores .= "<div class='alert alert_danger'> Correo o contraseña incorrectos</div>";
                }

            } else {
                $errores .= "<div class='alert alert_danger'> Correo o contraseña incorrectos</div>";

            }
        }
    }
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
  <a href="login.php"></a>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia de Viajes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


    <body>
   <form method= "POST" action="login.php">
     <?php require_once 'componentes/comp-form-login.php'; ?>


   </form>
       
   <div>
    <p>No tienes usuario? Registrate: <a href= "registro.php">Aqui</a></p>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>