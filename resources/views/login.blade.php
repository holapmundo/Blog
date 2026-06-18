@extends('layout')
@section('title','Inicio de sesión')
@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Iniciar Sesión - InsightBlog</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

<style>
body {
    font-family: 'Work Sans', sans-serif;
    background-color: #f8f9fa;
}

.material-symbols-outlined {
    vertical-align: middle;
}

.btn-custom {
    background-color: #ba1a1a;
    color: #fff;
}

.btn-custom:hover {
    background-color: #a31616;
}

.navbar-brand span {
    color: #ba1a1a;
}
</style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="#">Insight<span>Blog</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="material-symbols-outlined">menu</span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="nav">
      <ul class="navbar-nav me-3">
        <li class="nav-item"><a class="nav-link" href="#">Articles</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Authors</a></li>
      </ul>
      <button class="btn btn-danger">Subscribe</button>
    </div>
  </div>
</nav> -->

<!-- Main -->
<main class="flex-grow-1 d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">

        <div class="card shadow-sm p-4">
          
          <div class="text-center mb-4">
            <h3 class="fw-bold">Welcome Back</h3>
            <p class="text-muted">Accede a tu cuenta de InsightBlog</p>
          </div>

          <form method="POST" action="" id="loginForm">
            
            <div class="mb-3">
              <label class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" placeholder="nombre@ejemplo.com" required>
            </div>

            <div class="mb-3">
              <div class="d-flex justify-content-between">
                <label class="form-label">Contraseña</label>
                <a href="#" class="small">¿Olvidaste tu contraseña?</a>
              </div>
              <div class="input-group">
                <input type="password" id="password" class="form-control" placeholder="••••••••" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePass">
                  <span class="material-symbols-outlined">visibility</span>
                </button>
              </div>
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox">
              <label class="form-check-label">Recordarme</label>
            </div>

            <button type="submit" class="btn btn-custom w-100 py-2">
              Iniciar Sesión
            </button>

          </form>

          <div class="text-center mt-4 border-top pt-3">
            <p class="mb-0">
              ¿No tienes cuenta?
              <a href="#" class="fw-semibold">Regístrate</a>
            </p>
          </div>

        </div>

        <!-- Social -->
        <div class="text-center text-muted my-3 small">O CONTINUAR CON</div>

        <div class="d-flex gap-2">
          <button class="btn btn-outline-secondary w-100">
            <span class="material-symbols-outlined">public</span> Google
          </button>
          <button class="btn btn-outline-secondary w-100">
            <span class="material-symbols-outlined">terminal</span> Github
          </button>
        </div>

      </div>
    </div>
  </div>
</main>
@stop()
<!-- Footer -->
<!-- <footer class="bg-light border-top py-3 mt-auto">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <strong>InsightBlog</strong>

    <div class="my-2 my-md-0">
      <a href="#" class="text-muted me-3">Privacy Policy</a>
      <a href="#" class="text-muted me-3">Terms of Service</a>
      <a href="#" class="text-muted">Contact Support</a>
    </div>

    <small class="text-muted">© 2024 InsightBlog</small>
  </div>
</footer> -->

@section('js')
<script>
// Form submit
const loginForm = document.getElementById('loginForm');
const submitBtn = loginForm.querySelector('button[type="submit"]');

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    submitBtn.innerHTML = 'Iniciando...';
    submitBtn.disabled = true;

    setTimeout(() => {
        alert('¡Bienvenido de nuevo!');
        submitBtn.innerHTML = 'Iniciar Sesión';
        submitBtn.disabled = false;
    }, 1500);
});

// Toggle password
const togglePass = document.getElementById('togglePass');
const passInput = document.getElementById('password');

togglePass.addEventListener('click', () => {
    const type = passInput.type === 'password' ? 'text' : 'password';
    passInput.type = type;
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop()