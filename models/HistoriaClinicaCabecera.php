<?php

class HistoriaClinicaCabecera
{
  private int $idHCC; // ID de la cabecera de la historia clínica
  private DateTime $fecConHCC; // Fecha de consulta
  private bool $actHCC; // Indica si está activa o no

  // Constructor vacío
  public function __construct() {}

  // Métodos Getters y Setters
  public function getIdHCC(): int
  {
    return $this->idHCC;
  }

  public function setIdHCC(int $idHCC): void
  {
    $this->idHCC = $idHCC;
  }

  public function getFecConHCC(): DateTime
  {
    return $this->fecConHCC;
  }

  public function setFecConHCC(DateTime $fecConHCC): void
  {
    $this->fecConHCC = $fecConHCC;
  }

  public function isActHCC(): bool
  {
    return $this->actHCC;
  }

  public function setActHCC(bool $actHCC): void
  {
    $this->actHCC = $actHCC;
  }

  // Métodos adicionales
  public function activarHistoria(): void
  {
    $this->actHCC = true;
  }

  public function desactivarHistoria(): void
  {
    $this->actHCC = false;
  }
}
