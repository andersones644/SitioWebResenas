<?php
require_once "registro.php";
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">


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

                <!-- Usuario -->
                <div class="field">
                    <label for="username">Usuario</label>
                    <input id="username" name="username" type="text" placeholder="miusuario123" required>
                </div>

                <!-- Nombre -->
                <div class="field">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" required>
                </div>

                <!-- Apellido -->
                <div class="field">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Tus apellidos" required>
                </div>

                <!-- Correo Electrónico -->
                <div class="field">
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required>
                </div>

                <!-- Celular -->
                <div class="field">
                    <label for="celular">Celular</label>
                    <input id="celular" name="celular" type="tel" maxlength="10" placeholder="0999999999" required>
                </div>

                <!-- Contraseña -->
                <div class="input-icon-wrapper">
                    <label for="password">Contraseña</label>
                    <input id="password" class="password-input" name="password" type="password" placeholder="••••••••" required>
                    <i class="fa-solid fa-eye togglePassword"></i>
                </div>

                <!-- reCaptcha -->
                <div class="g-recaptcha" data-sitekey="6LdpSg4sAAAAAF3LaNAKXkBJU_idxThOCm5sxBkw"></div>

                <button class="cta-button" type="submit">Registrarse</button>

                <div class="sign-up">
                    ¿Ya tienes cuenta?
                    <a href="../login/formulario_login.php">Inicia sesión</a>
                </div>

            </form>

        </section>
    </main>

    <script src="../javascript/script.js"></script>

</body>
</html>
