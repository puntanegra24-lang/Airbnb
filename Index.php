<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centro de ayuda — Airbnb EC3</title>
  <link rel="stylesheet" href="Estilos.css" />
</head>
<body>
  <div class="airbnb-help">

    
    <header class="navbar" style="display:flex; justify-content:space-between; align-items:center; padding:15px 25px; border-bottom:1px solid #ddd;">

   
    <div style="display:flex; align-items:center; gap:10px;">
        <img src="logo.jpg" alt="Airbnb EC3" class="logo" style="height:40px; border-radius:8px;">
        <span class="brand" style="font-size:20px; font-weight:600;">Centro de ayuda</span>
    </div>

  
    <nav>
        <ul style="display:flex; list-style:none; gap:25px; font-size:16px; margin:0;">
            <li><a href="#" style="text-decoration:none; color:#333;">Inicio</a></li>
            <li><a href="#" style="text-decoration:none; color:#333;">Reservaciones</a></li>
            <li><a href="#" style="text-decoration:none; color:#333;">Anfitriones</a></li>
        </ul>
    </nav>

  
    <div style="position:relative;">

        <?php if (isset($_SESSION['username'])): ?>

   
            <div id="userMenuBtn" 
              style="cursor:pointer; display:flex; align-items:center; gap:8px; padding:10px 15px;
                    border:1px solid #ddd; border-radius:20px; background:white;">
            <span style="font-size:16px;">👤</span>
            <span style="font-weight:600;"><?= htmlspecialchars($_SESSION['username']) ?></span>
            <span style="font-size:12px;">▼</span>
            </div>

       
            <div id="userDropdown"
              style="
                position:absolute;
                right:0;
                top:52px;
                background:white;
                border-radius:12px;
                box-shadow:0 4px 15px rgba(0,0,0,0.1);
                width:180px;
                display:none;
                overflow:hidden;">
            
            <a href="#" style="display:block; padding:12px; text-decoration:none; color:#333; font-size:15px;">
                Mi cuenta
            </a>

            <a href="#" style="display:block; padding:12px; text-decoration:none; color:#333; font-size:15px;">
                Mis reservas
            </a>

            <a href="logout.php"
                style="display:block; padding:12px; text-decoration:none; color:#ff5a5f; font-weight:600; font-size:15px;">
                Cerrar sesión
            </a>
            </div>

    <?php else: ?>

        <a href="login.php"
            style="padding:10px 18px; background:#ff5a5f; color:white; border-radius:20px;
                  text-decoration:none; font-weight:500;">
            Iniciar sesión
        </a>

    <?php endif; ?>

    </div>


</header>


    <main>

      <section class="hero">
        <h1 class="hero__title">Hola, ¿cómo podemos ayudarte?</h1>
        <form class="search">
          <input type="search" placeholder="Buscar temas de ayuda..." />
          <button type="submit" class="btn btn-primary">🔍</button>
        </form>

        <div class="roles-login">
          <nav class="roles">
            <ul class="roles__list">
              <li><a class="role active" href="#">Huésped</a></li>
              <li><a class="role" href="#">Anfitrión del alojamiento</a></li>
              <li><a class="role" href="#">Anfitrión de experiencia</a></li>
              <li><a class="role" href="#">Anfitrión de servicios</a></li>
              <li><a class="role" href="#">Administrador de viajes</a></li>
            </ul>
          </nav>
          <div class="login">
              <?php if (!isset($_SESSION['username'])): ?>
                  <form action="login.php" method="post">
                      <button type="submit" class="btn btn-primary">Iniciar sesión o registrarse</button>
                  </form>
              <?php endif; ?>
          </div>
        </div>
      </section>

    
      <section class="section">
        <h2 class="section__title">Guías para comenzar</h2>
        <div class="cards cards--4">
          <article class="card">
            <img src="Gestiona-cuenta.png" alt="Gestiona tu cuenta" />
            <h3 class="card__title">Accede y gestiona tu cuenta</h3>
          </article>
          <article class="card">
            <img src="Pagos - Anfitrión.png" alt="Pagos anfitrión" />
            <h3 class="card__title">Recibir pagos como nuevo anfitrión</h3>
          </article>
          <article class="card">
            <img src="reservación.png" alt="Recursos básicos" />
            <h3 class="card__title">Recursos básicos para nuevos anfitriones</h3>
          </article>
          <article class="card">
            <img src="Aircover - Anfitriones.png" alt="AirCover anfitrión" />
            <h3 class="card__title">Cómo acogerse a AirCover para anfitriones</h3>
          </article>
        </div>
      </section>
            <!-- Artículos destacados -->
      <section class="section">
        <h2 class="section__title">Artículos destacados</h2>
        <div class="articles">
          <a class="article" href="#">
            <h3 class="article__title">Si el huésped cancela la reservación</h3>
            <p class="article__desc">Puede pasar que los planes cambien. Si un huésped tiene que cancelar la reservación...</p>
          </a>
          <a class="article" href="#">
            <h3 class="article__title">Cómo acogerse a AirCover para anfitriones</h3>
            <p class="article__desc">A veces ocurren accidentes y, para esos casos, existe AirCover para anfitriones...</p>
          </a>
          <a class="article" href="#">
            <h3 class="article__title">Reembolsa a tu huésped</h3>
            <p class="article__desc">Puede pasarle a los mejores anfitriones: los planes salen mal y no puedes ofrecer todo lo...</p>
          </a>
          <a class="article" href="#">
            <h3 class="article__title">Cancela una reservación como anfitrión</h3>
            <p class="article__desc">Los huéspedes están emocionados de disfrutar su estadía, Servicio o Experiencia...</p>
          </a>
          <a class="article" href="#">
            <h3 class="article__title">Prepara tu alojamiento con dispositivos básicos de seguridad</h3>
            <p class="article__desc">Según los CDC, el monóxido de carbono (CO) es la principal causa de muertes por...</p>
          </a>
          <a class="article" href="#">
            <h3 class="article__title">Cómo optimizar tu anuncio</h3>
            <p class="article__desc">Crear un anuncio destacado en Airbnb es mucho más que mostrar tu espacio. Los...</p>
          </a>
        </div>
      </section>


      
      <section class="section">
        <h2 class="section__title">Descubre más</h2>
        <div class="discover">
          <article class="discover__item">
            <img src="Comunidad.png" alt="Políticas de la comunidad" />
            <h3>Nuestras políticas de la comunidad</h3>
            <p>Cómo construimos una base de confianza.</p>
          </article>
          <article class="discover__item">
            <img src="Inspiracion.png" alt="Inspiración para anfitriones" />
            <h3>Recursos e inspiración para anfitriones</h3>
            <p>Encuentra consejos, recomendaciones y noticias.</p>
          </article>
          <article class="discover__item discover__contact">
            <h3>¿Necesitas contactarnos?</h3>
            <p>Comenzaremos con algunas preguntas y te llevaremos al lugar adecuado.</p>
            <button class="btn btn-primary">Contáctanos</button>
            <p class="muted">Si quieres, también puedes <a href="#">enviarnos comentarios</a>.</p>
          </article>
        </div>
      </section>
    </main>

    <section class="footer-nav">
      <div class="footer-nav__grid">
        <div class="footer-col">
          <h3>Asistencia</h3>
          <ul>
            <li><a href="#">Centro de ayuda</a></li>
            <li><a href="#">AirCover</a></li>
            <li><a href="#">Antidiscriminación</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Modo anfitrión</h3>
          <ul>
            <li><a href="#">Pon tu espacio en Airbnb</a></li>
            <li><a href="#">Recursos para anfitrionar</a></li>
            <li><a href="#">Buscar un coanfitrión</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Airbnb</h3>
          <ul>
            <li><a href="#">Sala de prensa</a></li>
            <li><a href="#">Carreras</a></li>
            <li><a href="#">Airbnb.org</a></li>
          </ul>
        </div>
      </div>
    </section>

    <footer class="legal">
      <div class="legal__inner">
        <div class="locale">
          <button class="locale__btn">Español (PE)</button>
          <button class="locale__btn">S/. PEN</button>
        </div>
        <div class="legal__copy">
          © 2025 Airbnb · <a href="#">Privacidad</a> · <a href="#">Términos</a>
        </div>
      </div>
    </footer>
  </div>

  <script src="app.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", () => {
      const btn = document.getElementById("userMenuBtn");
      const menu = document.getElementById("userDropdown");

      if (btn) {
          btn.addEventListener("click", () => {
              menu.style.display = menu.style.display === "block" ? "none" : "block";
          });

          // Cerrar al hacer click fuera
          document.addEventListener("click", (e) => {
              if (!btn.contains(e.target) && !menu.contains(e.target)) {
                  menu.style.display = "none";
              }
          });
      }
  });
  </script>

</body>
</html>
