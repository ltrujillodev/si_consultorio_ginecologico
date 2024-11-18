<?php

require_once dirname(__DIR__) . '/models/PacienteServicio.php';
require_once dirname(__DIR__) . '/models/Paciente.php';

class PacienteController
{
  private $pacienteServicio;

  public function __construct()
  {
    $this->pacienteServicio = new PacienteServicio();
  }

  // Método para registrar un paciente
  public function registrarPaciente($datos)
  {
    try {
      // Crear un objeto Paciente con los datos proporcionados
      $paciente = new Paciente(
        $datos['dniPac'],
        $datos['apePac'],
        $datos['nomPac'],
        new DateTime($datos['fecNacPac']),
        $datos['sexoPac'],
        $datos['estCivPac'],
        $datos['ocuPac'],
        $datos['domPac'],
        $datos['telPac'],
        $datos['emailPac'],
        $datos['acomPer'],
        $datos['antPerPac'],
        $datos['antFamPac'],
        $datos['antQuiPac'],
        $datos['antObsGesPac'],
        $datos['antObsNATPac'],
        $datos['antObsNPPac'],
        $datos['antObsAPac'],
        $datos['antObsHVPac'],
        $datos['antObsMenPac'],
        $datos['antObsIRSPac'],
        $datos['antGruSanPac'],
        true // Activo por defecto
      );

      // Llamar al servicio para registrar el paciente
      return $this->pacienteServicio->registrarPaciente($paciente);
    } catch (Exception $e) {
      // Manejar errores
      throw new Exception("Error al registrar el paciente: " . $e->getMessage());
    }
  }

  // Método para buscar un paciente por DNI
  public function buscarPaciente($dni)
  {
    try {
      return $this->pacienteServicio->buscarPaciente($dni);
    } catch (Exception $e) {
      throw new Exception("Error al buscar el paciente: " . $e->getMessage());
    }
  }

  // Método para modificar un paciente
  public function modificarPaciente($datos)
  {
    try {
      // Crear un objeto Paciente con los datos proporcionados
      $paciente = new Paciente(
        $datos['dniPac'],
        $datos['apePac'],
        $datos['nomPac'],
        new DateTime($datos['fecNacPac']),
        $datos['sexoPac'],
        $datos['estCivPac'],
        $datos['ocuPac'],
        $datos['domPac'],
        $datos['telPac'],
        $datos['emailPac'],
        $datos['acomPer'],
        $datos['antPerPac'],
        $datos['antFamPac'],
        $datos['antQuiPac'],
        $datos['antObsGesPac'],
        $datos['antObsNATPac'],
        $datos['antObsNPPac'],
        $datos['antObsAPac'],
        $datos['antObsHVPac'],
        $datos['antObsMenPac'],
        $datos['antObsIRSPac'],
        $datos['antGruSanPac'],
        $datos['actPac']
      );

      return $this->pacienteServicio->modificarPaciente($paciente);
    } catch (Exception $e) {
      throw new Exception("Error al modificar el paciente: " . $e->getMessage());
    }
  }

  // Método para desactivar un paciente
  public function desactivarPaciente($dni)
  {
    try {
      return $this->pacienteServicio->desactivarPaciente($dni);
    } catch (Exception $e) {
      throw new Exception("Error al desactivar el paciente: " . $e->getMessage());
    }
  }

  // Método para listar todos los pacientes
  public function listarPacientes()
  {
    try {
      return $this->pacienteServicio->listarPacientes();
    } catch (Exception $e) {
      throw new Exception("Error al listar los pacientes: " . $e->getMessage());
    }
  }
}
