<?php

require_once 'Persona.php';

class Paciente extends Persona
{
  private string $acomPer;
  private string $antPerPac;
  private string $antFamPac;
  private string $antQuiPac;
  private int $antObsGesPac;
  private int $antObsNATPac;
  private int $antObsNPPac;
  private int $antObsAPac;
  private int $antObsHVPac;
  private int $antObsMenPac;
  private int $antObsIRSPac;
  private string $antGruSanPac;
  private bool $actPac;

  // Constructor
  public function __construct()
  {
    parent::__construct();
  }

  // Getters and Setters
  public function getAcomPer(): string
  {
    return $this->acomPer;
  }

  public function setAcomPer(string $acomPer): void
  {
    $this->acomPer = $acomPer;
  }

  public function getAntPerPac(): string
  {
    return $this->antPerPac;
  }

  public function setAntPerPac(string $antPerPac): void
  {
    $this->antPerPac = $antPerPac;
  }

  public function getAntFamPac(): string
  {
    return $this->antFamPac;
  }

  public function setAntFamPac(string $antFamPac): void
  {
    $this->antFamPac = $antFamPac;
  }

  public function getAntQuiPac(): string
  {
    return $this->antQuiPac;
  }

  public function setAntQuiPac(string $antQuiPac): void
  {
    $this->antQuiPac = $antQuiPac;
  }

  public function getAntObsGesPac(): int
  {
    return $this->antObsGesPac;
  }

  public function setAntObsGesPac(int $antObsGesPac): void
  {
    $this->antObsGesPac = $antObsGesPac;
  }

  public function getAntObsNATPac(): int
  {
    return $this->antObsNATPac;
  }

  public function setAntObsNATPac(int $antObsNATPac): void
  {
    $this->antObsNATPac = $antObsNATPac;
  }

  public function getAntObsNPPac(): int
  {
    return $this->antObsNPPac;
  }

  public function setAntObsNPPac(int $antObsNPPac): void
  {
    $this->antObsNPPac = $antObsNPPac;
  }

  public function getAntObsAPac(): int
  {
    return $this->antObsAPac;
  }

  public function setAntObsAPac(int $antObsAPac): void
  {
    $this->antObsAPac = $antObsAPac;
  }

  public function getAntObsHVPac(): int
  {
    return $this->antObsHVPac;
  }

  public function setAntObsHVPac(int $antObsHVPac): void
  {
    $this->antObsHVPac = $antObsHVPac;
  }

  public function getAntObsMenPac(): int
  {
    return $this->antObsMenPac;
  }

  public function setAntObsMenPac(int $antObsMenPac): void
  {
    $this->antObsMenPac = $antObsMenPac;
  }

  public function getAntObsIRSPac(): int
  {
    return $this->antObsIRSPac;
  }

  public function setAntObsIRSPac(int $antObsIRSPac): void
  {
    $this->antObsIRSPac = $antObsIRSPac;
  }

  public function getAntGruSanPac(): string
  {
    return $this->antGruSanPac;
  }

  public function setAntGruSanPac(string $antGruSanPac): void
  {
    $this->antGruSanPac = $antGruSanPac;
  }

  public function isActPac(): bool
  {
    return $this->actPac;
  }

  public function setActPac(bool $actPac): void
  {
    $this->actPac = $actPac;
  }

  // Methods to activate/deactivate
  public function activarPaciente(): void
  {
    $this->actPac = true;
  }

  public function desactivarPaciente(): void
  {
    $this->actPac = false;
  }
}
