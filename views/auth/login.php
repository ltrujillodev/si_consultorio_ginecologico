<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilo personalizado -->
  <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="width: 25rem;">
      <h3 class="text-center mb-4">Iniciar Sesión</h3>
      <form id="loginForm" action="../../controllers/UsuarioController.php?action=login" method="POST">
        <!-- Campo Usuario -->
        <div class="mb-3">
          <label for="username" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" required>
        </div>
        <!-- Campo Contraseña -->
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
        </div>
        <!-- Botón Iniciar Sesión -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Validación Frontend -->
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value.trim();

      if (!username || !password) {
        e.preventDefault();
        alert('Por favor, complete todos los campos.');
      }
    });
  </script>
</body>

</html>