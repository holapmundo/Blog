@extends('layout')

@section('title', 'Categorías')
@section('contenido')

<div class="row">
    <div class="text-end mb-3">
        <a href="{{ route('categorias.create') }}"
           class="btn btn-outline-#E9D8A6">
            NUEVA CATEGORÍA
        </a>
    </div>
</div>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog Elegante</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Cormorant+Garamond:wght@300;400;500&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --rosa: #D4A373;
    --vino: #5A1827;
    --crema: #FAEDCD;
    --oro: #E9D8A6;
    --vino-light: #7a2336;
    --vino-dark: #3d0f1a;
    --sombra: rgba(90,24,39,0.12);
  }

  body {
    font-family: 'Jost', sans-serif;
    background: var(--crema);
    color: var(--vino);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  /* HEADER */
  header {
    background: var(--vino);
    padding: 0 2.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 64px;
    position: sticky;
    top: 0;
    z-index: 100;
    border-bottom: 2px solid var(--oro);
  }
  .logo {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--oro);
    letter-spacing: 0.04em;
  }
  .logo span { color: var(--rosa); font-style: italic; }
  .header-tagline {
    font-size: 12px;
    color: var(--oro);
    opacity: 0.6;
    font-weight: 300;
    letter-spacing: 0.12em;
    text-transform: uppercase;
  }

  /* LAYOUT */
  .layout {
    display: flex;
    flex: 1;
    max-width: 1280px;
    margin: 0 auto;
    width: 100%;
    padding: 2rem 1.5rem;
    gap: 2rem;
  }

  /* SIDEBAR */
  aside {
    width: 220px;
    flex-shrink: 0;
  }
  .sidebar-title {
    font-family: 'Playfair Display', serif;
    font-size: 11px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--rosa);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid var(--rosa);
    opacity: 0.9;
  }
  .nav-menu {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 4px;
  }
  .nav-item {
    cursor: pointer;
    border-radius: 6px;
    transition: all 0.2s ease;
    overflow: hidden;
  }
  .nav-item-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    transition: background 0.2s;
  }
  .nav-item:hover .nav-item-header {
    background: rgba(90,24,39,0.07);
  }
  .nav-item.active .nav-item-header {
    background: var(--vino);
  }
  .nav-icon {
    font-size: 17px;
    width: 22px;
    text-align: center;
    flex-shrink: 0;
  }
  .nav-label {
    font-size: 13.5px;
    font-weight: 500;
    color: var(--vino);
    line-height: 1.2;
  }
  .nav-item.active .nav-label {
    color: var(--oro);
  }
  .nav-desc {
    font-size: 11px;
    color: var(--vino);
    opacity: 0.55;
    padding: 0 14px 10px 46px;
    font-weight: 300;
    line-height: 1.4;
    display: none;
  }
  .nav-item.active .nav-desc {
    display: block;
    color: var(--oro);
    opacity: 0.7;
  }

  /* MAIN CONTENT */
  main {
    flex: 1;
    min-width: 0;
  }

  .category-view { display: none; }
  .category-view.visible { display: block; animation: fadeIn 0.4s ease; }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* HERO IMAGE */
  .hero {
    width: 100%;
    height: 420px;
    border-radius: 14px;
    overflow: hidden;
    position: relative;
    margin-bottom: 1.5rem;
    background: var(--vino-dark);
  }
  .hero img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.85;
    transition: opacity 0.3s;
  }
  .hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(58,10,20,0.75) 0%, transparent 55%);
    border-radius: 14px;
  }
  .hero-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: var(--oro);
    color: var(--vino-dark);
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 99px;
  }
  .hero-title {
    position: absolute;
    bottom: 24px;
    left: 24px;
    right: 24px;
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 700;
    color: var(--crema);
    line-height: 1.25;
    text-shadow: 0 2px 12px rgba(0,0,0,0.3);
  }

  /* INFO CARDS BELOW HERO */
  .info-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
  }
  .info-card {
    background: white;
    border-radius: 10px;
    padding: 1.1rem 1.2rem;
    border: 1px solid rgba(212,163,115,0.25);
    transition: box-shadow 0.2s, transform 0.2s;
    cursor: pointer;
  }
  .info-card:hover {
    box-shadow: 0 6px 24px var(--sombra);
    transform: translateY(-2px);
  }
  .info-card-icon {
    font-size: 22px;
    margin-bottom: 8px;
  }
  .info-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 14px;
    font-weight: 600;
    color: var(--vino);
    margin-bottom: 5px;
  }
  .info-card-text {
    font-size: 12.5px;
    color: var(--vino);
    opacity: 0.6;
    line-height: 1.5;
    font-weight: 300;
  }
  .info-card-link {
    display: inline-block;
    margin-top: 10px;
    font-size: 11px;
    font-weight: 500;
    color: var(--rosa);
    letter-spacing: 0.06em;
    text-transform: uppercase;
    text-decoration: none;
    border-bottom: 1px solid var(--oro);
    padding-bottom: 1px;
  }
  .info-card-link:hover { color: var(--vino); }

  /* WELCOME STATE */
  .welcome {
    text-align: center;
    padding: 5rem 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
  }
  .welcome-icon { font-size: 52px; opacity: 0.35; }
  .welcome h2 {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    color: var(--vino);
    opacity: 0.6;
  }
  .welcome p {
    font-size: 14px;
    color: var(--vino);
    opacity: 0.45;
    max-width: 340px;
    line-height: 1.7;
  }

  /* FOOTER */
  footer {
    background: var(--vino-dark);
    color: var(--oro);
    text-align: center;
    font-size: 12px;
    padding: 1rem;
    opacity: 0.85;
    letter-spacing: 0.06em;
  }
</style>
</head>
<body>

<header>
  <div class="logo">BLOG</div>
  <div class="header-tagline">Tu espacio de expresión</div>
</header>

<div class="layout">

  <!-- SIDEBAR -->
  <aside>
    <div class="sidebar-title">Categorías</div>
    <ul class="nav-menu" id="navMenu">

      <li class="nav-item" data-cat="tech" onclick="showCat('tech', this)">
        <div class="nav-item-header">
          <span class="nav-icon">💻</span>
          <span class="nav-label">Tecnología</span>
        </div>
        <div class="nav-desc">Desarrollo de software y más.</div>
      </li>

      <li class="nav-item" data-cat="makeup" onclick="showCat('makeup', this)">
        <div class="nav-item-header">
          <span class="nav-icon">💄</span>
          <span class="nav-label">Maquillaje</span>
        </div>
        <div class="nav-desc">El maravilloso mundo del maquillaje.</div>
      </li>

      <li class="nav-item" data-cat="design" onclick="showCat('design', this)">
        <div class="nav-item-header">
          <span class="nav-icon">🎨</span>
          <span class="nav-label">Diseño Gráfico</span>
        </div>
        <div class="nav-desc">El mundo del Color y el Diseño.</div>
      </li>

      <li class="nav-item" data-cat="cocina" onclick="showCat('cocina', this)">
        <div class="nav-item-header">
          <span class="nav-icon">🍳</span>
          <span class="nav-label">Cocina</span>
        </div>
        <div class="nav-desc">Recetas y experiencias culinarias.</div>
      </li>

      <li class="nav-item" data-cat="viajes" onclick="showCat('viajes', this)">
        <div class="nav-item-header">
          <span class="nav-icon">✈️</span>
          <span class="nav-label">Viajes</span>
        </div>
        <div class="nav-desc">Recorridos y experiencias en el mundo.</div>
      </li>

      <li class="nav-item" data-cat="deportes" onclick="showCat('deportes', this)">
        <div class="nav-item-header">
          <span class="nav-icon">⚽</span>
          <span class="nav-label">Deportes</span>
        </div>
        <div class="nav-desc">Juegos y deportes favoritos.</div>
      </li>

    </ul>
  </aside>

  <!-- MAIN -->
  <main>

    <!-- Bienvenida -->
    <div id="welcome" class="welcome">
      <div class="welcome-icon">📖</div>
      <h2>Selecciona una categoría</h2>
      <p>Elige un tema del menú izquierdo para explorar publicaciones, inspiración y mucho más.</p>
    </div>

    <!-- TECNOLOGÍA -->
    <div class="category-view" id="cat-tech">
      <div class="hero">
        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&q=80" alt="Tecnología">
        <div class="hero-overlay"></div>
        <span class="hero-badge">Tecnología</span>
        <div class="hero-title">El futuro del software comienza hoy</div>
      </div>
      <div class="info-row">
        <div class="info-card">
          <div class="info-card-icon">🧑‍💻</div>
          <div class="info-card-title">Desarrollo Web</div>
          <div class="info-card-text">Explora los frameworks más modernos y las mejores prácticas del desarrollo frontend y backend.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">🤖</div>
          <div class="info-card-title">Inteligencia Artificial</div>
          <div class="info-card-text">Descubre cómo la IA está transformando industrias y creando nuevas oportunidades.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">☁️</div>
          <div class="info-card-title">Cloud & DevOps</div>
          <div class="info-card-text">Todo sobre infraestructura moderna, contenedores y despliegues en la nube.</div>
        </div>
      </div>
    </div>

    <!-- MAQUILLAJE -->
    <div class="category-view" id="cat-makeup">
      <div class="hero">
        <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200&q=80" alt="Maquillaje">
        <div class="hero-overlay"></div>
        <span class="hero-badge">Maquillaje</span>
        <div class="hero-title">Arte en tu rostro, belleza sin límites</div>
      </div>
      <div class="info-row">
        <div class="info-card">
          <div class="info-card-icon">🌸</div>
          <div class="info-card-title">Base & Cobertura</div>
          <div class="info-card-text">Guía para encontrar tu base perfecta y lograr un acabado natural o dramático.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">👁️</div>
          <div class="info-card-title">Ojos expresivos</div>
          <div class="info-card-text">Técnicas para delinear, difuminar y crear looks de día y de noche.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">💋</div>
          <div class="info-card-title">Labios perfectos</div>
          <div class="info-card-text">Colores, texturas y trucos para que tus labios sean el centro de atención.</div>
        </div>
      </div>
    </div>

    <!-- DISEÑO GRÁFICO -->
    <div class="category-view" id="cat-design">
      <div class="hero">
        <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=1200&q=80" alt="Diseño Gráfico">
        <div class="hero-overlay"></div>
        <span class="hero-badge">Diseño Gráfico</span>
        <div class="hero-title">Color, forma y emoción en cada trazo</div>
      </div>
      <div class="info-row">
        <div class="info-card">
          <div class="info-card-icon">🎭</div>
          <div class="info-card-title">Teoría del Color</div>
          <div class="info-card-text">Aprende a combinar paletas que comuniquen emociones y fortalezcan marcas.</div>
          <a class="info-card-link" href="#">Leer más →</a>
        </div>
        <div class="info-card">
          <div class="info-card-icon">✏️</div>
          <div class="info-card-title">Tipografía</div>
          <div class="info-card-text">El poder de las letras: cómo elegir fuentes que hablen por sí solas.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">📐</div>
          <div class="info-card-title">Composición</div>
          <div class="info-card-text">Principios de layout, grillas y jerarquía visual para diseños impactantes.</div>
        </div>
      </div>
    </div>

    <!-- COCINA -->
    <div class="category-view" id="cat-cocina">
      <div class="hero">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1200&q=80" alt="Cocina">
        <div class="hero-overlay"></div>
        <span class="hero-badge">Cocina</span>
        <div class="hero-title">Sabores que cuentan historias</div>
      </div>
      <div class="info-row">
        <div class="info-card">
          <div class="info-card-icon">🥘</div>
          <div class="info-card-title">Recetas del Día</div>
          <div class="info-card-text">Descubre platos sencillos y deliciosos para preparar en casa cualquier día.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">🍰</div>
          <div class="info-card-title">Repostería</div>
          <div class="info-card-text">Desde bizcochos esponjosos hasta tartas elaboradas, dulces para todos.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">🌿</div>
          <div class="info-card-title">Cocina Saludable</div>
          <div class="info-card-text">Recetas nutritivas y balanceadas sin sacrificar el sabor ni el placer.</div>
        </div>
      </div>
    </div>

    <!-- VIAJES -->
    <div class="category-view" id="cat-viajes">
      <div class="hero">
        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&q=80" alt="Viajes">
        <div class="hero-overlay"></div>
        <span class="hero-badge">Viajes</span>
        <div class="hero-title">El mundo es tu historia por escribir</div>
      </div>
      <div class="info-row">
        <div class="info-card">
          <div class="info-card-icon">🗺️</div>
          <div class="info-card-title">Destinos Únicos</div>
          <div class="info-card-text">Lugares fuera de lo común que te cambiarán la perspectiva del mundo.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">🎒</div>
          <div class="info-card-title">Consejos de Viaje</div>
          <div class="info-card-text">Qué empacar, cómo planear y cómo viajar con presupuesto ajustado.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">📸</div>
          <div class="info-card-title">Fotografía de Viaje</div>
          <div class="info-card-text">Captura momentos que duran para siempre con tips y técnicas de fotografía.</div>
        </div>
      </div>
    </div>

    <!-- DEPORTES -->
    <div class="category-view" id="cat-deportes">
      <div class="hero">
        <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?w=1200&q=80" alt="Deportes">
        <div class="hero-overlay"></div>
        <span class="hero-badge">Deportes</span>
        <div class="hero-title">Pasión, esfuerzo y gloria en cada juego</div>
      </div>
      <div class="info-row">
        <div class="info-card">
          <div class="info-card-icon">⚽</div>
          <div class="info-card-title">Fútbol</div>
          <div class="info-card-text">Análisis de partidos, jugadores destacados y lo mejor de las ligas mundiales.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">🏋️</div>
          <div class="info-card-title">Fitness & Entrenamiento</div>
          <div class="info-card-text">Rutinas, nutrición deportiva y consejos para mejorar tu rendimiento físico.</div>
        </div>
        <div class="info-card">
          <div class="info-card-icon">🏆</div>
          <div class="info-card-title">Competencias</div>
          <div class="info-card-text">Cobertura de torneos, campeonatos y los momentos más emocionantes del deporte.</div>
        </div>
      </div>
    </div>

  </main>
</div>


<script>
  function showCat(id, el) {
    document.getElementById('welcome').style.display = 'none';
    document.querySelectorAll('.category-view').forEach(v => v.classList.remove('visible'));
    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
    document.getElementById('cat-' + id).classList.add('visible');
    el.classList.add('active');
  }
</script>
</body>
</html>
@endsection


