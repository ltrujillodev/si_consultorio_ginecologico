<?php

require_once '../models/HistoriaClinicaCabeceraServicio.php';
require_once '../models/HistoriaClinicaDetalleServicio.php';
require_once '../models/HistoriaClinicaCabecera.php';
require_once '../models/HistoriaClinicaDetalle.php';

class HistoriaClinicaController
{
  private $cabeceraServicio;
  private $detalleServicio;

  public function __construct()
  {
    $this->cabeceraServicio = new HistoriaClinicaCabeceraServicio();
    $this->detalleServicio = new HistoriaClinicaDetalleServicio();
  }

  // Método para registrar una nueva historia clínica
  public function registrarHistoriaClinica($datosCabecera, $detalles)
  {
    try {
      // Crear cabecera
      $cabecera = new HistoriaClinicaCabecera();
      $cabecera->setIdHCC($datosCabecera['idHCC']);
      $cabecera->setFecConHCC(new DateTime($datosCabecera['fecConHCC']));
      $cabecera->setActHCC(true);

      // Registrar la cabecera
      $this->cabeceraServicio->registrarHistoria($cabecera);

      // Registrar los detalles asociados
      foreach ($detalles as $detalleData) {
        $detalle = new HistoriaClinicaDetalle();
        $detalle->setIdHCC($cabecera->getIdHCC());
        $detalle->setFurHCD(new DateTime($detalleData['furHCD']));
        $detalle->setPapHCD($detalleData['papHCD']);
        $detalle->setMacHCD($detalleData['macHCD']);
        $detalle->setNpsHCD($detalleData['npsHCD']);
        $detalle->setTHCD($detalleData['tHCD']);
        $detalle->setPaHCD($detalleData['paHCD']);
        $detalle->setFcHCD($detalleData['fcHCD']);
        $detalle->setFrHCD($detalleData['frHCD']);
        $detalle->setPesoHCD($detalleData['pesoHCD']);
        $detalle->setTallaHCD($detalleData['tallaHCD']);
        $detalle->setSpo2HCD($detalleData['spo2HCD']);
        $detalle->setTeHCD($detalleData['teHCD']);
        $detalle->setFiHCD($detalleData['fiHCD']);
        $detalle->setCHCD($detalleData['cHCD']);
        $detalle->setMotConHCD($detalleData['motConHCD']);
        $detalle->setExaFisHCD($detalleData['exaFisHCD']);
        $detalle->setDiagHCD($detalleData['diagHCD']);
        $detalle->setTratHCD($detalleData['tratHCD']);
        $detalle->setActHCD(true);

        $this->detalleServicio->registrarDetalleHistoria($detalle);
      }

      return true; // Registro exitoso
    } catch (Exception $e) {
      return false; // Hubo un error
    }
  }

  // Método para listar todas las historias clínicas
  public function listarHistoriasClinicas()
  {
    return $this->cabeceraServicio->listarHistorias();
  }

  // Método para buscar una historia clínica por ID de cabecera
  public function buscarHistoriaClinicaPorId($idHCC)
  {
    return $this->cabeceraServicio->buscarHistoria($idHCC);
  }

  // Método para listar los detalles de una historia clínica
  public function listarDetallesHistoriaClinica($idHCC)
  {
    return $this->detalleServicio->listarDetallesHistoria($idHCC);
  }

  // Método para modificar una cabecera
  public function modificarHistoriaClinicaCabecera($datosCabecera)
  {
    $cabecera = new HistoriaClinicaCabecera();
    $cabecera->setIdHCC($datosCabecera['idHCC']);
    $cabecera->setFecConHCC(new DateTime($datosCabecera['fecConHCC']));
    $cabecera->setActHCC($datosCabecera['actHCC']);

    return $this->cabeceraServicio->modificarHistoria($cabecera);
  }

  // Método para modificar un detalle
  public function modificarDetalleHistoriaClinica($datosDetalle)
  {
    $detalle = new HistoriaClinicaDetalle();
    $detalle->setIdHCD($datosDetalle['idHCD']);
    $detalle->setFurHCD(new DateTime($datosDetalle['furHCD']));
    $detalle->setPapHCD($datosDetalle['papHCD']);
    $detalle->setMacHCD($datosDetalle['macHCD']);
    $detalle->setNpsHCD($datosDetalle['npsHCD']);
    $detalle->setTHCD($datosDetalle['tHCD']);
    $detalle->setPaHCD($datosDetalle['paHCD']);
    $detalle->setFcHCD($datosDetalle['fcHCD']);
    $detalle->setFrHCD($datosDetalle['frHCD']);
    $detalle->setPesoHCD($datosDetalle['pesoHCD']);
    $detalle->setTallaHCD($datosDetalle['tallaHCD']);
    $detalle->setSpo2HCD($datosDetalle['spo2HCD']);
    $detalle->setTeHCD($datosDetalle['teHCD']);
    $detalle->setFiHCD($datosDetalle['fiHCD']);
    $detalle->setCHCD($datosDetalle['cHCD']);
    $detalle->setMotConHCD($datosDetalle['motConHCD']);
    $detalle->setExaFisHCD($datosDetalle['exaFisHCD']);
    $detalle->setDiagHCD($datosDetalle['diagHCD']);
    $detalle->setTratHCD($datosDetalle['tratHCD']);
    $detalle->setActHCD($datosDetalle['actHCD']);

    return $this->detalleServicio->modificarDetalleHistoria($detalle);
  }

  // Método para desactivar una historia clínica
  public function desactivarHistoriaClinica($idHCC)
  {
    return $this->cabeceraServicio->desactivarHistoria($idHCC);
  }
}
