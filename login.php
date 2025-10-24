<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="css/styles.css" />
  
</head>

<body>
  <main class="auth-wrap" aria-labelledby="login-title">
    <section class="card" role="region" aria-label="Formulario de inicio de sesión">
      <div class="brand">
        <div class="logo" aria-hidden="true">S</div>
        <div>
          <h1 id="login-title">Iniciar Sesión</h1>
          <p>Ingresa con tu correo y contraseña para continuar</p>
        </div>
      </div>

      <form action="#" method="POST" novalidate>
        <div class="field">
          <label for="email">Correo electrónico</label>
          <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required autocomplete="email" />
        </div>

        <div class="field">
          <label for="password">Contraseña</label>
          <input id="password" name="password" type="password" placeholder="••••••••" required autocomplete="current-password" />
        </div>

        <div class="actions" aria-hidden="false">
          <label class="remember">
            <input type="checkbox" name="remember" id="remember" />
            <span>Recordarme</span>
          </label>
          <a href="#" style="font-size:0.9rem;color:var(--accent-blue);text-decoration:none;font-weight:600;">¿Olvidaste tu contraseña?</a>
        </div>

        <button class="cta-button" type="submit" aria-label="Iniciar sesión">Iniciar sesión</button>

        <div class="sign-up">
          ¿No tienes cuenta? <a href="#">Regístrate</a>
        </div>

        <div class="alt" aria-hidden="true">
          <span class="msg">Acceso seguro • Conexión cifrada</span>
        </div>
      </form>
    </section>
  </main>
</body>

</html>
