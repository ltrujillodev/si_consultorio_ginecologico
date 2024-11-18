<?php

require_once 'HistoriaClinicaCabecera.php';
require_once '../config/database.php';

class HistoriaClinicaCabeceraServicio
{
  private $db;

  public function __construct()
  {
    $this->db = conectar(); // Conexión a la base de datos
  }

  // Método para registrar una nueva historia clínica
  public function registrarHistoria(HistoriaClinicaCabecera $historia): bool
  {
    $query = "INSERT INTO Historias_Clinicas_Cabecera (fec_con_hcc, act_hcc) VALUES (?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param(
      "si",
      $historia->getFecConHCC()->format('Y-m-d H:i:s'), // Formatear DateTime
      $historia->isActHCC() ? 1 : 0                     // Convertir booleano a entero
    );
    return $stmt->execute();
  }

  // Método para buscar una historia clínica por ID
  public function buscarHistoria(int $idHCC): ?HistoriaClinicaCabecera
  {
    $query = "SELECT * FROM Historias_Clinicas_Cabecera WHERE id_hcc = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $idHCC);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
      $historia = new HistoriaClinicaCabecera();
      $historia->setIdHCC($row['id_hcc']);
      $historia->setFecConHCC(new DateTime($row['fec_con_hcc']));
      $historia->setActHCC($row['act_hcc'] == 1);
      return $historia;
    }
    return null; // Si no se encuentra
  }

  // Método para modificar una historia clínica
  public function modificarHistoria(HistoriaClinicaCabecera $historia): bool
  {
    $query = "UPDATE Historias_Clinicas_Cabecera SET fec_con_hcc = ?, act_hcc = ? WHERE id_hcc = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param(
      "sii",
      $historia->getFecConHCC()->format('Y-m-d H:i:s'),
      $historia->isActHCC() ? 1 : 0,
      $historia->getIdHCC()
    );
    return $stmt->execute();
  }

  // Método para desactivar una historia clínica
  public function desactivarHistoria(int $idHCC): bool
  {
    $query = "UPDATE Historias_Clinicas_Cabecera SET act_hcc = 0 WHERE id_hcc = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $idHCC);
    return $stmt->execute();
  }

  // Método para listar todas las historias clínicas
  public function listarHistorias(): array
  {
    $query = "SELECT * FROM Historias_Clinicas_Cabecera";
    $result = $this->db->query($query);
    $historias = [];

    while ($row = $result->fetch_assoc()) {
      $historia = new HistoriaClinicaCabecera();
      $historia->setIdHCC($row['id_hcc']);
      $historia->setFecConHCC(new DateTime($row['fec_con_hcc']));
      $historia->setActHCC($row['act_hcc'] == 1);
      $historias[] = $historia;
    }
    return $historias;
  }
}
