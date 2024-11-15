<?php

require_once 'Paciente.php'; // Asegúrate de que Paciente esté incluido
require_once 'config/database.php'; // Para la conexión a la base de datos

class PacienteServicio
{
  private $db;

  // Constructor para inicializar la conexión a la base de datos
  public function __construct()
  {
    $this->db = conectar(); // Llamada a la función conectar() de database.php
  }

  // Método para registrar un nuevo paciente
  public function registrarPaciente(Paciente $paciente)
  {
    $query = "INSERT INTO Pacientes (dni_pac, ape_pac, nom_pac, fec_nac_pac, sexo_pac, est_civ_pac, ocu_pac, dom_pac, tel_pac, email_pac, acom_pac, ant_per_pac, ant_fam_pac, ant_qui_pac, ant_obs_ges_pac, ant_obs_nat_pac, ant_obs_np_pac, ant_obs_a_pac, ant_obs_hv_pac, ant_obs_men_pac, ant_obs_irs_pac, gru_san_pac, act_pac) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param(
      "ssssssssssssssssssssssi",
      $paciente->getDniPer(),
      $paciente->getApePer(),
      $paciente->getNomPer(),
      $paciente->getFecNacPer()->format('Y-m-d'),
      $paciente->getSexPer(),
      $paciente->getEstCivPer(),
      $paciente->getOcuPer(),
      $paciente->getDomPer(),
      $paciente->getTelPer(),
      $paciente->getEmailPer(),
      $paciente->getAcomPer(),
      $paciente->getAntPerPac(),
      $paciente->getAntFamPac(),
      $paciente->getAntQuiPac(),
      $paciente->getAntObsGesPac(),
      $paciente->getAntObsNATPac(),
      $paciente->getAntObsNPPac(),
      $paciente->getAntObsAPac(),
      $paciente->getAntObsHVPac(),
      $paciente->getAntObsMenPac(),
      $paciente->getAntObsIRSPac(),
      $paciente->getAntGruSanPac(),
      $paciente->isActPac()
    );
    return $stmt->execute();
  }

  // Método para buscar un paciente por DNI
  public function buscarPaciente(string $dni): ?Paciente
  {
    $query = "SELECT * FROM Pacientes WHERE dni_pac = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
      $paciente = new Paciente();
      $paciente->setDniPer($row['dni_pac']);
      $paciente->setApePer($row['ape_pac']);
      $paciente->setNomPer($row['nom_pac']);
      $paciente->setFecNacPer(new DateTime($row['fec_nac_pac']));
      $paciente->setSexPer($row['sexo_pac']);
      $paciente->setEstCivPer($row['est_civ_pac']);
      $paciente->setOcuPer($row['ocu_pac']);
      $paciente->setDomPer($row['dom_pac']);
      $paciente->setTelPer($row['tel_pac']);
      $paciente->setEmailPer($row['email_pac']);
      $paciente->setAcomPer($row['acom_pac']);
      $paciente->setAntPerPac($row['ant_per_pac']);
      $paciente->setAntFamPac($row['ant_fam_pac']);
      $paciente->setAntQuiPac($row['ant_qui_pac']);
      $paciente->setAntObsGesPac($row['ant_obs_ges_pac']);
      $paciente->setAntObsNATPac($row['ant_obs_nat_pac']);
      $paciente->setAntObsNPPac($row['ant_obs_np_pac']);
      $paciente->setAntObsAPac($row['ant_obs_a_pac']);
      $paciente->setAntObsHVPac($row['ant_obs_hv_pac']);
      $paciente->setAntObsMenPac($row['ant_obs_men_pac']);
      $paciente->setAntObsIRSPac($row['ant_obs_irs_pac']);
      $paciente->setAntGruSanPac($row['gru_san_pac']);
      $paciente->setActPac($row['act_pac']);
      return $paciente;
    }
    return null;
  }

  // Método para modificar un paciente
  public function modificarPaciente(Paciente $paciente)
  {
    $query = "UPDATE Pacientes SET ape_pac = ?, nom_pac = ?, fec_nac_pac = ?, sexo_pac = ?, est_civ_pac = ?, ocu_pac = ?, dom_pac = ?, tel_pac = ?, email_pac = ?, acom_pac = ?, ant_per_pac = ?, ant_fam_pac = ?, ant_qui_pac = ?, ant_obs_ges_pac = ?, ant_obs_nat_pac = ?, ant_obs_np_pac = ?, ant_obs_a_pac = ?, ant_obs_hv_pac = ?, ant_obs_men_pac = ?, ant_obs_irs_pac = ?, gru_san_pac = ?, act_pac = ? WHERE dni_pac = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param(
      "ssssssssssssssssssssssi",
      $paciente->getApePer(),
      $paciente->getNomPer(),
      $paciente->getFecNacPer()->format('Y-m-d'),
      $paciente->getSexPer(),
      $paciente->getEstCivPer(),
      $paciente->getOcuPer(),
      $paciente->getDomPer(),
      $paciente->getTelPer(),
      $paciente->getEmailPer(),
      $paciente->getAcomPer(),
      $paciente->getAntPerPac(),
      $paciente->getAntFamPac(),
      $paciente->getAntQuiPac(),
      $paciente->getAntObsGesPac(),
      $paciente->getAntObsNATPac(),
      $paciente->getAntObsNPPac(),
      $paciente->getAntObsAPac(),
      $paciente->getAntObsHVPac(),
      $paciente->getAntObsMenPac(),
      $paciente->getAntObsIRSPac(),
      $paciente->getAntGruSanPac(),
      $paciente->isActPac(),
      $paciente->getDniPer()
    );
    return $stmt->execute();
  }

  // Método para desactivar un paciente
  public function desactivarPaciente(string $dni)
  {
    $query = "UPDATE Pacientes SET act_pac = 0 WHERE dni_pac = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("s", $dni);
    return $stmt->execute();
  }

  // Método para listar todos los pacientes
  public function listarPacientes(): array
  {
    $query = "SELECT * FROM Pacientes";
    $result = $this->db->query($query);
    $pacientes = [];

    while ($row = $result->fetch_assoc()) {
      $paciente = new Paciente();
      $paciente->setDniPer($row['dni_pac']);
      $paciente->setApePer($row['ape_pac']);
      $paciente->setNomPer($row['nom_pac']);
      $paciente->setFecNacPer(new DateTime($row['fec_nac_pac']));
      $paciente->setSexPer($row['sexo_pac']);
      $paciente->setEstCivPer($row['est_civ_pac']);
      $paciente->setOcuPer($row['ocu_pac']);
      $paciente->setDomPer($row['dom_pac']);
      $paciente->setTelPer($row['tel_pac']);
      $paciente->setEmailPer($row['email_pac']);
      $paciente->setAcomPer($row['acom_pac']);
      $paciente->setAntPerPac($row['ant_per_pac']);
      $paciente->setAntFamPac($row['ant_fam_pac']);
      $paciente->setAntQuiPac($row['ant_qui_pac']);
      $paciente->setAntObsGesPac($row['ant_obs_ges_pac']);
      $paciente->setAntObsNATPac($row['ant_obs_nat_pac']);
      $paciente->setAntObsNPPac($row['ant_obs_np_pac']);
      $paciente->setAntObsAPac($row['ant_obs_a_pac']);
      $paciente->setAntObsHVPac($row['ant_obs_hv_pac']);
      $paciente->setAntObsMenPac($row['ant_obs_men_pac']);
      $paciente->setAntObsIRSPac($row['ant_obs_irs_pac']);
      $paciente->setAntGruSanPac($row['gru_san_pac']);
      $paciente->setActPac($row['act_pac']);
      $pacientes[] = $paciente;
    }
    return $pacientes;
  }
}
