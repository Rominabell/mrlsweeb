
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <style>
        .login-card {
            max-width: 380px;
            background: #FFF8EE;
            padding: 25px;
            margin: 60px auto;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.15);
            border: 1px solid #E4D2B0;
        }

        .login-card h2 {
            color: #6E4C2F;
            font-family: "Georgia";
        }

        .btn-primary {
            background-color: #463214;
            border: none;
        }

        .btn-primary:hover {
            background-color: #725C3A;
        }

        input.form-control {
            border-radius: 10px;
            border: 1px solid #B9A88C;
        }
    </style>
</head>

<body>

<form action="" method="POST">

<div class="login-card">
    <h2 class="text-center mb-4">Crear Cuenta</h2>

    <?php if (!empty($errores)) echo $errores; ?>

    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu email">

    <label for="contrasenia" class="form-label mt-3">Contraseña</label>
    <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Ingresa una contraseña">

    <label for="contrasenia2" class="form-label mt-3">Repetir contraseña</label>
    <input type="password" name="contrasenia2" id="contrasenia2" class="form-control" placeholder="Repite la contraseña">

    <input type="submit" value="Registrarme" name="ingresar" class="btn btn-primary w-100 mt-4">
</div>

</form>

</body>
</html>