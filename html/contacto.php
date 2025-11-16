<?php
session_start();

// Si no hay sesión activa, redirigir al login
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login/formulario_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Contáctanos</title>
  <link rel="stylesheet" href="../css/styles.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="container">
      <h1>Reseñas</h1>
      <nav class="nav-container">
        <a href="../index.php">Inicio</a>
        <a href="libros.php">Libros</a>
        <a href="peliculas.php">Películas</a>
        <a href="videojuegos.php">Videojuegos</a>
      </nav>
      <a href="#" class="cta-button" id="btnLogout">Cerrar Sesión</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="section-header">
      <h2>¿Tienes una sugerencia?</h2>
    </section>

    <section class="form-section">
      <h3>Déjanos tus recomendaciones de libros, películas o videojuegos para reseñar. Estaremos encantados de leerte.</h3>
      <form class="contact-form form-grid">
        <div class="form-group">
          <h4><label for="nombre">Nombre:</label></h4>
          <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
          <h4><label for="correo">Correo electrónico:</label></h4>
          <input type="email" id="correo" name="correo" required>
        </div>

        <div class="form-group">
          <h4><label for="tipo">Tipo de recomendación:</label></h4>
          <select id="tipo" name="tipo" required>
            <option value="">Selecciona una opción</option>
            <option value="libro">Libro</option>
            <option value="pelicula">Película</option>
            <option value="videojuego">Videojuego</option>
          </select>
        </div>

        <div class="form-group-full">
          <textarea id="sugerencia" name="sugerencia" rows="5" cols="153" placeholder="Tu recomendación..." required></textarea>
        </div>
        
        <button type="submit" class="cta-button">Enviar sugerencia</button>
      </form>
    </section>
  </main>

  <footer>
    <div class="container">
      <section>
        <h3>Síguenos</h3>
        <nav>
          <a href="https://facebook.com" target="_blank" rel="noopener">
            <img src="../icons/facebook.png" alt="Facebook">
          </a>
          <a href="https://twitter.com" target="_blank" rel="noopener">
            <img src="../icons/x.png" alt="Twitter">
          </a>
          <a href="https://instagram.com" target="_blank" rel="noopener">
            <img src="../icons/instagram.png" alt="Instagram">
          </a>
          <a href="https://youtube.com" target="_blank" rel="noopener">
            <img src="../icons/youtube.png" alt="Youtube">
          </a>
        </nav>
      </section>
      <p>© 2025 Reseñas. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script src="../javascript/script.js"></script>

</body>
</html>