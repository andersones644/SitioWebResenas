<?php
session_start();
require_once "../conexion/conexion.php";

$msg_error = "";
$msg_success = "";

// Procesar registro
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $email = trim($_POST["email"]);
    $celular = trim($_POST["celular"]);
    $password = trim($_POST["password"]);

    // reCAPTCHA
    $recaptcha_secret = "6LdpSg4sAAAAAHYFkE-KC8ZexReDIm9e6aqscmoT";
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $recaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $recaptcha = json_decode($recaptcha);

    if (!$recaptcha->success) {
        $msg_error = "Por favor verifica que no eres un robot.";
    }
    elseif (!$username || !$nombre || !$apellido || !$email || !$celular || !$password) {
        $msg_error = "Complete todos los campos.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg_error = "Correo electrónico inválido.";
    }
    elseif (strlen($celular) != 10 || !ctype_digit($celular)) {
        $msg_error = "El celular debe contener 10 números.";
    }
    else {
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ? OR celular = ?");
        $stmt->execute([$email, $celular]);

        if ($stmt->rowCount() > 0) {
            $msg_error = "El correo o celular ya están registrados.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios(username, nombre, apellido, user_password, email, celular, rol, estado) VALUES (?, ?, ?, ?, ?, ?, 'usuario', 'activo')");
            if ($stmt->execute([$username, $nombre, $apellido, $passwordHash, $email, $celular])) {
                $msg_success = "¡Registro completado exitosamente!";
            } else {
                $msg_error = "Ocurrió un error al registrar.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <main class="auth-wrap">
        <section class="card">
            <div class="brand">
                <div class="logo"><i class="fa-solid fa-user-plus"></i></div>
                <div>
                    <h1>Crear Cuenta</h1>
                    <p>Regístrate para continuar</p>
                </div>
            </div>

            <?php if ($msg_error): ?>
            <div class="alert error"><?= htmlspecialchars($msg_error) ?></div>
            <?php endif; ?>
            <?php if ($msg_success): ?>
            <div class="alert success"><?= htmlspecialchars($msg_success) ?></div>
            <?php endif; ?>

            <form method="POST" novalidate>
                <div class="field">
                    <label for="username">Usuario</label>
                    <input id="username" name="username" type="text" placeholder="miusuario123" required>
                </div>

                <div class="field">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" required>
                </div>

                <div class="field">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Tus apellidos" required>
                </div>

                <div class="field">
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required>
                </div>

                <div class="field">
                    <label for="celular">Celular</label>
                    <input id="celular" name="celular" maxlength="10" placeholder="0999999999" required>
                </div>

                <div class="input-icon-wrapper">
                    <label for="password">Contraseña</label>
                    <input class="password-input" name="password" type="password" placeholder="••••••••" required>
                    <i class="fa-solid fa-eye togglePassword"></i>
                </div>

                <!-- reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LdpSg4sAAAAAF3LaNAKXkBJU_idxThOCm5sxBkw"></div>

                <button class="cta-button" type="submit">Registrarse</button>

                <div class="sign-up">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></div>
            </form>
        </section>
    </main>

    <script src="../javascript/script.js"></script>
</body>

</html>