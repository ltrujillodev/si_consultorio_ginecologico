<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Pacientes</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilo personalizado -->
  <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4" style="color: var(--dorado);">Lista de Pacientes</h2>
    <!-- Botón para agregar un nuevo paciente -->
    <div class="mb-3 text-end">
      <a href="./create.php" class="btn btn-primary" style="background-color: var(--dorado);">Agregar Paciente</a>
    </div>
    <!-- Tabla de pacientes -->
    <div class="card shadow">
      <div class="card-body">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">DNI</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Email</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../../controllers/PacienteController.php';
            $pacienteController = new PacienteController();
            $pacientes = $pacienteController->listarPacientes();

            foreach ($pacientes as $paciente) {
              echo "<tr>
                      <td>{$paciente->getDniPer()}</td>
                      <td>{$paciente->getNomPer()}</td>
                      <td>{$paciente->getApePer()}</td>
                      <td>{$paciente->getTelPer()}</td>
                      <td>{$paciente->getEmailPer()}</td>
                      <td>
                        <a href='./edit.php?dni={$paciente->getDniPer()}' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='../../controllers/PacienteController.php?action=delete&dni={$paciente->getDniPer()}' class='btn btn-danger btn-sm'>Eliminar</a>
                      </td>
                    </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>