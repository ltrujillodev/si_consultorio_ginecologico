<?php

require_once 'HistoriaClinicaDetalle.php'; // Asegúrate de tener esta línea para incluir la clase
require_once '../config/database.php'; // Para la conexión a la base de datos

class HistoriaClinicaDetalleServicio
{
  private $db;

  // Constructor para inicializar la conexión a la base de datos
  public function __construct()
  {
    $this->db = conectar(); // Llamada a la función conectar() de database.php
  }

  // Método para registrar un detalle de historia clínica
  public function registrarDetalleHistoria(HistoriaClinicaDetalle $detalle): bool
  {
    $query = "INSERT INTO Historias_Clinicas_Detalle 
                    (id_hcc, fur_hcd, pap_hcd, mac_hcd, nps_hcd, t_hcd, pa_hcd, fc_hcd, fr_hcd, peso_hcd, talla_hcd, spo2_hcd, te_hcd, fi_hcd, c_hcd, mot_con_hcd, exa_fis_hcd, diag_hcd, trat_hcd, act_hcd)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($query);

    $stmt->bind_param(
      "isissdsssddisssssss",
      $detalle->getIdHCC(),
      $detalle->getFurHCD()->format('Y-m-d'),
      $detalle->getPapHCD(),
      $detalle->getMacHCD(),
      $detalle->getNpsHCD(),
      $detalle->getTHCD(),
      $detalle->getPaHCD(),
      $detalle->getFcHCD(),
      $detalle->getFrHCD(),
      $detalle->getPesoHCD(),
      $detalle->getTallaHCD(),
      $detalle->getSpo2HCD(),
      $detalle->getTeHCD(),
      $detalle->getFiHCD(),
      $detalle->getCHCD(),
      $detalle->getMotConHCD(),
      $detalle->getExaFisHCD(),
      $detalle->getDiagHCD(),
      $detalle->getTratHCD(),
      $detalle->isActHCD()
    );

    return $stmt->execute();
  }

  // Método para buscar un detalle de historia clínica por su ID
  public function buscarDetalleHistoria(int $id_detalle): ?HistoriaClinicaDetalle
  {
    $query = "SELECT * FROM Historias_Clinicas_Detalle WHERE id_hcd = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id_detalle);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
      $detalle = new HistoriaClinicaDetalle();
      $detalle->setIdHCD($row['id_hcd']);
      $detalle->setIdHCC($row['id_hcc']);
      $detalle->setFurHCD(new DateTime($row['fur_hcd']));
      $detalle->setPapHCD($row['pap_hcd']);
      $detalle->setMacHCD($row['mac_hcd']);
      $detalle->setNpsHCD($row['nps_hcd']);
      $detalle->setTHCD($row['t_hcd']);
      $detalle->setPaHCD($row['pa_hcd']);
      $detalle->setFcHCD($row['fc_hcd']);
      $detalle->setFrHCD($row['fr_hcd']);
      $detalle->setPesoHCD($row['peso_hcd']);
      $detalle->setTallaHCD($row['talla_hcd']);
      $detalle->setSpo2HCD($row['spo2_hcd']);
      $detalle->setTeHCD($row['te_hcd']);
      $detalle->setFiHCD($row['fi_hcd']);
      $detalle->setCHCD($row['c_hcd']);
      $detalle->setMotConHCD($row['mot_con_hcd']);
      $detalle->setExaFisHCD($row['exa_fis_hcd']);
      $detalle->setDiagHCD($row['diag_hcd']);
      $detalle->setTratHCD($row['trat_hcd']);
      $detalle->setActHCD($row['act_hcd']);

      return $detalle;
    }

    return null;
  }

  // Método para modificar un detalle de historia clínica
  public function modificarDetalleHistoria(HistoriaClinicaDetalle $detalle): bool
  {
    $query = "UPDATE Historias_Clinicas_Detalle 
                  SET fur_hcd = ?, pap_hcd = ?, mac_hcd = ?, nps_hcd = ?, t_hcd = ?, pa_hcd = ?, fc_hcd = ?, fr_hcd = ?, peso_hcd = ?, talla_hcd = ?, spo2_hcd = ?, te_hcd = ?, fi_hcd = ?, c_hcd = ?, mot_con_hcd = ?, exa_fis_hcd = ?, diag_hcd = ?, trat_hcd = ?, act_hcd = ?
                  WHERE id_hcd = ?";
    $stmt = $this->db->prepare($query);

    $stmt->bind_param(
      "sissdsssddisssssssi",
      $detalle->getFurHCD()->format('Y-m-d'),
      $detalle->getPapHCD(),
      $detalle->getMacHCD(),
      $detalle->getNpsHCD(),
      $detalle->getTHCD(),
      $detalle->getPaHCD(),
      $detalle->getFcHCD(),
      $detalle->getFrHCD(),
      $detalle->getPesoHCD(),
      $detalle->getTallaHCD(),
      $detalle->getSpo2HCD(),
      $detalle->getTeHCD(),
      $detalle->getFiHCD(),
      $detalle->getCHCD(),
      $detalle->getMotConHCD(),
      $detalle->getExaFisHCD(),
      $detalle->getDiagHCD(),
      $detalle->getTratHCD(),
      $detalle->isActHCD(),
      $detalle->getIdHCD()
    );

    return $stmt->execute();
  }

  // Método para desactivar un detalle de historia clínica
  public function desactivarDetalleHistoria(int $id_detalle): bool
  {
    $query = "UPDATE Historias_Clinicas_Detalle SET act_hcd = 0 WHERE id_hcd = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id_detalle);
    return $stmt->execute();
  }

  // Método para listar los detalles de una historia clínica
  public function listarDetallesHistoria(int $id_hcc): array
  {
    $query = "SELECT * FROM Historias_Clinicas_Detalle WHERE id_hcc = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id_hcc);
    $stmt->execute();
    $result = $stmt->get_result();

    $detalles = [];
    while ($row = $result->fetch_assoc()) {
      $detalle = new HistoriaClinicaDetalle();
      $detalle->setIdHCD($row['id_hcd']);
      $detalle->setIdHCC($row['id_hcc']);
      $detalle->setFurHCD(new DateTime($row['fur_hcd']));
      $detalle->setPapHCD($row['pap_hcd']);
      $detalle->setMacHCD($row['mac_hcd']);
      $detalle->setNpsHCD($row['nps_hcd']);
      $detalle->setTHCD($row['t_hcd']);
      $detalle->setPaHCD($row['pa_hcd']);
      $detalle->setFcHCD($row['fc_hcd']);
      $detalle->setFrHCD($row['fr_hcd']);
      $detalle->setPesoHCD($row['peso_hcd']);
      $detalle->setTallaHCD($row['talla_hcd']);
      $detalle->setSpo2HCD($row['spo2_hcd']);
      $detalle->setTeHCD($row['te_hcd']);
      $detalle->setFiHCD($row['fi_hcd']);
      $detalle->setCHCD($row['c_hcd']);
      $detalle->setMotConHCD($row['mot_con_hcd']);
      $detalle->setExaFisHCD($row['exa_fis_hcd']);
      $detalle->setDiagHCD($row['diag_hcd']);
      $detalle->setTratHCD($row['trat_hcd']);
      $detalle->setActHCD($row['act_hcd']);

      $detalles[] = $detalle;
    }

    return $detalles;
  }
}
