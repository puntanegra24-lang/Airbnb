<?php
require_once 'conexion.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $mensaje = "<div class='alert alert-danger'>Por favor, completa todos los campos.</div>";
    } else {

        $sql = "SELECT * FROM usuario WHERE username = ?";
        $stmt = mysqli_prepare($cone, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user) {

            if (password_verify($password, $user['pasword'])) {
                
                session_start();
                $_SESSION['username'] = $user['username'];

                header("Location: Index.php");
                exit;

            } else {
                $mensaje = "<div class='alert alert-danger'>Contraseña incorrecta.</div>";
            }

        } else {
            $mensaje = "<div class='alert alert-danger'>El usuario no existe.</div>";
        }

        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">Iniciar Sesión</h2>

                <!-- Mostrar mensaje -->
                <?= $mensaje ?>

                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </form>

                <div class="text-center mt-3">
                    <a href="registro.php">¿No tienes cuenta? Registrarse</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
                    <a href="Index.html">Volver a la página</a>
        </div>
    </div>
</div>

</body>
</html>
