<?php

require_once 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : ''; // Añadido el campo email

    if (empty($username) || empty($password) || empty($confirm_password) || empty($email)) {
        $error = "Por favor, ingresa todos los campos.";
    } elseif ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden.";
    } else {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

       
        $sql = "SELECT * FROM usuario WHERE username = ? OR email = ?";
        if ($stmt = mysqli_prepare($cone, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $error = "El nombre de usuario o el correo electrónico ya están registrados.";
            } else {
                
                $insert_sql = "INSERT INTO usuario (username, email, pasword) VALUES (?, ?, ?)";
                if ($insert_stmt = mysqli_prepare($cone, $insert_sql)) {
                    mysqli_stmt_bind_param($insert_stmt, "sss", $username, $email, $hashedPassword);
                    if (mysqli_stmt_execute($insert_stmt)) {
                       
                        header("Location: confirmacion.php?status=success");
                        exit;
                    } else {
                        $error = "Error al registrar el usuario. Intenta nuevamente.";
                    }
                }
            }
            mysqli_stmt_close($stmt);
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
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4">
               
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Crear Cuenta</h2>

                       
                        <form action="registro.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirmar Contraseña" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                            </div>

                           
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>

                       
                            <div class="text-center mt-3">
                                <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
