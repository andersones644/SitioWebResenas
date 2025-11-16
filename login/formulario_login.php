<?php
require_once "login.php";
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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

                <div class="sign-up">¿No tienes cuenta? <a href="../registro_usuarios/formulario_registro.php">Regístrate</a></div>
            </form>
        </section>
    </main>

    <script src="../javascript/script.js"></script>
</body>

</html>
