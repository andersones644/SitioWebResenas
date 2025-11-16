<?php
session_start();

// Si no hay sesión activa, redirigir al login
if (!isset($_SESSION["user_id"])) {
    header("Location: login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Reseñas</title>
  <link rel="stylesheet" href="css/styles.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  
</head>
<body>
  <header>
    <div class="container">
      <h1>Reseñas</h1>
      <nav class="nav-container">
        <a href="html/libros.php">Libros</a>
        <a href="html/peliculas.php">Películas</a>
        <a href="html/videojuegos.php">Videojuegos</a>
        <a href="html/contacto.php">Contáctanos</a>
      </nav>

      <a href="#" class="cta-button" id="btnLogout">Cerrar Sesión</a>
    </div>
  </header>

  <main class="container">   
      <div class="section-header">
        <h2>Bienvenidos</h2>
      </div>
      <section class="intro-section">      
        <div class="intro-content">
          <div class="justify-text">
            <h2 class="section-header">¿Quiénes somos?</h2>
            <p>
              Somos una plataforma independiente comprometida con ofrecer análisis y reseñas detalladas de libros, películas y videojuegos, pensada para todos aquellos que disfrutan sumergirse en nuevas historias y explorar diferentes formas de arte narrativo. 
              Nos apasiona descubrir obras que dejan huella y compartir nuestras impresiones con una comunidad que valora tanto la calidad como la diversidad de contenido. 
              Ya sea que busques tu próxima lectura cautivadora, una película que te haga reflexionar o un videojuego que te atrape por horas, nuestro objetivo es orientarte, inspirarte y ayudarte a encontrar esa próxima gran historia que te acompañe y te emocione.
            </p>
          </div>
          <div class="intro-video">
            <video controls>
              <source src="videos/AmvMovies.mp4" type="video/mp4" />
              Tu navegador no soporta la reproducción de video.
            </video>
          </div>
        </div>
      </section>
    </div>
  </main>

  <footer>
    <div class="container">
      <section>
        <h3>Síguenos</h3>
        <nav>
          <a href="https://facebook.com" target="_blank" rel="noopener">
            <img src="icons/facebook.png" alt="Facebook" />
          </a>
          <a href="https://twitter.com" target="_blank" rel="noopener">
            <img src="icons/x.png" alt="Twitter" />
          </a>
          <a href="https://instagram.com" target="_blank" rel="noopener">
            <img src="icons/instagram.png" alt="Instagram" />
          </a>
          <a href="https://youtube.com" target="_blank" rel="noopener">
            <img src="icons/youtube.png" alt="Youtube" />
          </a>
        </nav>
      </section>
      <p>© 2025 Reseñas. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script src="javascript/script.js"></script>

</body>
</html>
