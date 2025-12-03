<?php

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">¡Cuenta Creada Exitosamente!</h2>

                        <?php if ($status == 'success'): ?>
                            <p class="text-center mb-4">Tu cuenta ha sido creada correctamente. Ahora puedes iniciar sesión con tu usuario y contraseña.</p>
                        <?php else: ?>
                            <p class="text-center mb-4">Algo salió mal. Intenta nuevamente.</p>
                        <?php endif; ?>

                        <div class="d-flex justify-content-around">
                            <a href="login.php" class="btn btn-success">Iniciar Sesión</a>
                            <a href="registro.php" class="btn btn-warning">Registrar Otro Usuario</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
