<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Paciente</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilo personalizado -->
  <link rel="stylesheet" href="../../public/css/style.css">
  <style>
    /* Evitar resize en textareas */
    textarea {
      resize: none;
    }

    /* Centrar botones */
    .button-group {
      display: flex;
      justify-content: center;
      gap: 1rem;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <h3 class="text-center mb-4">Registrar Paciente</h3>
    <form action="../../controllers/PacienteController.php?action=registrar" method="POST">
      <!-- Sección Datos Generales -->
      <div class="card p-4 mb-4">
        <h5 class="mb-3">Datos Generales</h5>
        <div class="row g-3">
          <!-- Primera fila -->
          <div class="col-md-2">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dniPac" maxlength="8" pattern="\d{8}" placeholder="12345678" required>
          </div>
          <div class="col-md-4">
            <label for="apellido" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellido" name="apePac" maxlength="100" placeholder="Apellidos" required>
          </div>
          <div class="col-md-4">
            <label for="nombre" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombre" name="nomPac" maxlength="100" placeholder="Nombres" required>
          </div>
          <div class="col-md-2">
            <label for="fechaNac" class="form-label">Fec. Nac.</label>
            <input type="date" class="form-control" id="fechaNac" name="fecNacPac" required>
          </div>

          <!-- Segunda fila -->
          <div class="col-md-2">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexoPac" required>
              <option value="">Seleccionar</option>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="estadoCivil" class="form-label">Estado Civil</label>
            <select class="form-select" id="estadoCivil" name="estCivPac" required>
              <option value="">Seleccionar</option>
              <option value="Soltero">Soltero</option>
              <option value="Casado">Casado</option>
              <option value="Divorciado">Divorciado</option>
              <option value="Viudo">Viudo</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="ocupacion" class="form-label">Ocupación</label>
            <input type="text" class="form-control" id="ocupacion" name="ocuPac" maxlength="100" placeholder="Ocupación" required>
          </div>

          <!-- Tercera fila -->
          <div class="col-md-6">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="domicilio" name="domPac" maxlength="150" placeholder="Domicilio" required>
          </div>
          <div class="col-md-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telPac" maxlength="9" pattern="\d{9}" placeholder="987654321" required>
          </div>
          <div class="col-md-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="emailPac" maxlength="100" placeholder="correo@ejemplo.com" required>
          </div>
        </div>
      </div>

      <!-- Sección Antecedentes -->
      <div class="card p-4">
        <h5 class="mb-3">Antecedentes</h5>
        <div class="row g-3">
          <!-- Primera fila -->
          <div class="col-md-6">
            <label for="antPersonales" class="form-label">Antecedentes Personales</label>
            <textarea class="form-control" id="antPersonales" name="antPerPac" rows="2"></textarea>
          </div>
          <div class="col-md-6">
            <label for="antFamiliares" class="form-label">Antecedentes Familiares</label>
            <textarea class="form-control" id="antFamiliares" name="antFamPac" rows="2"></textarea>
          </div>

          <!-- Segunda fila -->
          <div class="col-md-6">
            <label for="antQuirurgicos" class="form-label">Antecedentes Quirúrgicos</label>
            <textarea class="form-control" id="antQuirurgicos" name="antQuiPac" rows="2"></textarea>
          </div>
          <div class="col-md-3">
            <label for="grupoSang" class="form-label">Grupo Sanguíneo</label>
            <input type="text" class="form-control" id="grupoSang" name="antGruSanPac" maxlength="5" placeholder="A+">
          </div>
          <div class="col-md-3">
            <label for="acompanante" class="form-label">Acompañante</label>
            <input type="text" class="form-control" id="acompanante" name="acomPer" maxlength="100" placeholder="Nombre del acompañante">
          </div>

          <!-- Tercera fila -->
          <div class="col-md-1">
            <label for="gestas" class="form-label">Gestas</label>
            <input type="number" class="form-control" id="gestas" name="antObsGesPac" min="0">
          </div>
          <div class="col-md-1">
            <label for="nat" class="form-label">NAT</label>
            <input type="number" class="form-control" id="nat" name="antObsNATPac" min="0">
          </div>
          <div class="col-md-1">
            <label for="np" class="form-label">NP</label>
            <input type="number" class="form-control" id="np" name="antObsNPPac" min="0">
          </div>
          <div class="col-md-1">
            <label for="abortos" class="form-label">Abortos</label>
            <input type="number" class="form-control" id="abortos" name="antObsAPac" min="0">
          </div>
          <div class="col-md-1">
            <label for="hv" class="form-label">HV</label>
            <input type="number" class="form-control" id="hv" name="antObsHVPac" min="0">
          </div>
          <div class="col-md-2">
            <label for="menarquia" class="form-label">Menarquia</label>
            <input type="number" class="form-control" id="menarquia" name="antObsMenPac" min="0">
          </div>
          <div class="col-md-2">
            <label for="irs" class="form-label">I.R.S</label>
            <input type="number" class="form-control" id="irs" name="antObsIRSPac" min="0">
          </div>
        </div>
      </div>

      <!-- Botones -->
      <div class="button-group mt-4">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>