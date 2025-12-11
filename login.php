<?php
require_once 'componentes/conexion.php';

$errores = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ingresar'])) {

        if(empty($email)||empty($contrasenia)){
            $errores .= "<div class='alert alert-danger'> Porfavor, completa todos los campos</div>";
        } else{
            $frase =$conexion->prepare("SELECT * FROM cliente WHERE cliente.email =?");
            $frase-> bind_param('s', $email);
            $frase->execute();


 
    $email = $conexion->real_escape_string($_POST['email']);
    $contrasenia = $conexion->real_escape_string($_POST['contrasenia']);

   
    if(empty($email) || empty($contrasenia)){
        $errores .= "<div class='alert alert-danger'>Por favor completa todos los campos</div>";
    } else {

        $frase = $conexion->prepare("SELECT * FROM cliente WHERE email = ?");
        $frase->bind_param("s", $email);
        $frase->execute();


        $cliente = $frase->get_result()->fetch_assoc();

        if($cliente){
            if(password_verify($contrasenia, $cliente['contrasenia'])){

                session_start();
                $_SESSION['clienteid'] = $cliente['id_cliente'];
                $_SESSION['email'] = $cliente['email'];

                header("Location: index.php");
                exit;

            } else {
                $errores .= "<div class='alert alert-danger'>Correo o contraseña incorrectos</div>";
                   header('Location: index.php');
                    exit;
                } else {
                    $errores .= "<div class='alert alert-danger'> Correo o contraseña incorrectos</div>";
                }

            } else {
                $errores .= "<div class='alert alert-danger'> Correo o contraseña incorrectos</div>";


            }

        } else {
            $errores .= "<div class='alert alert-danger'>Correo o contraseña incorrectos</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Iniciar Sesión</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body class='container py-5'>


    <h2 class='mb-4'>Iniciar Sesión</h2>

    <?php if(!empty($errores)) echo $errores; ?>

    <form method='POST' action='login.php'>

        <div class='mb-3'>
            <label class='form-label'>Email</label>
            <input type='email' name='email' class='form-control'>
        </div>

    <body>
<form method="POST" action="login.php">
    <?php require_once 'componentes/comp-form-login.php'; ?>
</form>

<div class="text-center mt-3">
    <p>¿No tienes usuario? <a href="registro.php">Regístrate aquí</a></p>
</div>


        <div class='mb-3'>
            <label class='form-label'>Contraseña</label>
            <input type='password' name='contrasenia' class='form-control'>
        </div>

        <button type='submit' name='ingresar' class='btn btn-primary'>Ingresar</button>

    </form>

    <p class='mt-3'>
        ¿No tienes usuario? <a href='registro.php'>Registrate aquí</a>
    </p>

</body>
</html>
