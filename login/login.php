<?php
session_start();
require_once "../conexion/conexion.php";

$msg_error = "";

// Si el usuario ya está logueado
if (isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // reCAPTCHA
    $recaptcha_secret = "6LdpSg4sAAAAAHYFkE-KC8ZexReDIm9e6aqscmoT";
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $recaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $recaptcha = json_decode($recaptcha);

    if (!$recaptcha->success) {
        $msg_error = "Por favor verifica que no eres un robot.";
    }
    elseif (!$email || !$password) {
        $msg_error = "Ingrese su correo y contraseña.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg_error = "Correo inválido.";
    } 
    else {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);

        if ($stmt->rowCount() === 0) {
            $msg_error = "El correo no está registrado.";
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user["estado"] !== "activo") {
                $msg_error = "Tu cuenta está inactiva.";
            }
            elseif (!password_verify($password, $user["user_password"])) {
                $msg_error = "Contraseña incorrecta.";
            } else {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["rol"] = $user["rol"];
                header("Location: ../index.php");
                exit;
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
    <title>Iniciar sesión</title>
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
                <div class="logo"><i class="fa-solid fa-user"></i></div>
                <div>
                    <h1>Iniciar Sesión</h1>
                    <p>Ingresa con tu correo y contraseña</p>
                </div>
            </div>

            <?php if ($msg_error): ?>
            <div class="alert error"><?= htmlspecialchars($msg_error) ?></div>
            <?php endif; ?>

            <form method="POST" novalidate>
                <div class="field">
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required>
                </div>

                <div class="input-icon-wrapper">
                    <label for="password">Contraseña</label>
                    <input class="password-input" name="password" type="password" placeholder="••••••••" required>
                    <i class="fa-solid fa-eye togglePassword"></i>
                </div>


                <!-- reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LdpSg4sAAAAAF3LaNAKXkBJU_idxThOCm5sxBkw"></div>

                <button class="cta-button" type="submit">Iniciar sesión</button>

                <div class="sign-up">¿No tienes cuenta? <a href="registro.php">Regístrate</a></div>
            </form>
        </section>
    </main>

    <script src="../javascript/script.js"></script>
</body>

</html>