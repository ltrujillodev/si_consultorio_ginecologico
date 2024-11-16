<?php

class HistoriaClinicaDetalle
{
  // Atributos
  private int $idHCD;
  private int $idHCC;
  private DateTime $furHCD;
  private int $papHCD;
  private string $macHCD;
  private int $npsHCD;
  private float $tHCD;
  private string $paHCD;
  private string $fcHCD; // Frecuencia cardíaca
  private string $frHCD;
  private float $pesoHCD;
  private float $tallaHCD;
  private int $spo2HCD;
  private string $teHCD;
  private string $fiHCD;
  private string $cHCD;
  private string $motConHCD;
  private string $exaFisHCD;
  private string $diagHCD;
  private string $tratHCD;
  private bool $actHCD;

  // Constructor
  public function __construct()
  {
    // Constructor vacío, se puede implementar según necesidades.
  }

  // Métodos Getters y Setters
  public function getIdHCD(): int
  {
    return $this->idHCD;
  }

  public function setIdHCD(int $idHCD): void
  {
    $this->idHCD = $idHCD;
  }

  public function getIdHCC(): int
  {
    return $this->idHCC;
  }

  public function setIdHCC(int $idHCC): void
  {
    $this->idHCC = $idHCC;
  }

  public function getFurHCD(): DateTime
  {
    return $this->furHCD;
  }

  public function setFurHCD(DateTime $furHCD): void
  {
    $this->furHCD = $furHCD;
  }

  public function getPapHCD(): int
  {
    return $this->papHCD;
  }

  public function setPapHCD(int $papHCD): void
  {
    $this->papHCD = $papHCD;
  }

  public function getMacHCD(): string
  {
    return $this->macHCD;
  }

  public function setMacHCD(string $macHCD): void
  {
    $this->macHCD = $macHCD;
  }

  public function getNpsHCD(): int
  {
    return $this->npsHCD;
  }

  public function setNpsHCD(int $npsHCD): void
  {
    $this->npsHCD = $npsHCD;
  }

  public function getTHCD(): float
  {
    return $this->tHCD;
  }

  public function setTHCD(float $tHCD): void
  {
    $this->tHCD = $tHCD;
  }

  public function getPaHCD(): string
  {
    return $this->paHCD;
  }

  public function setPaHCD(string $paHCD): void
  {
    $this->paHCD = $paHCD;
  }

  public function getFcHCD(): string
  {
    return $this->fcHCD;
  }

  public function setFcHCD(string $fcHCD): void
  {
    $this->fcHCD = $fcHCD;
  }

  public function getFrHCD(): string
  {
    return $this->frHCD;
  }

  public function setFrHCD(string $frHCD): void
  {
    $this->frHCD = $frHCD;
  }

  public function getPesoHCD(): float
  {
    return $this->pesoHCD;
  }

  public function setPesoHCD(float $pesoHCD): void
  {
    $this->pesoHCD = $pesoHCD;
  }

  public function getTallaHCD(): float
  {
    return $this->tallaHCD;
  }

  public function setTallaHCD(float $tallaHCD): void
  {
    $this->tallaHCD = $tallaHCD;
  }

  public function getSpo2HCD(): int
  {
    return $this->spo2HCD;
  }

  public function setSpo2HCD(int $spo2HCD): void
  {
    $this->spo2HCD = $spo2HCD;
  }

  public function getTeHCD(): string
  {
    return $this->teHCD;
  }

  public function setTeHCD(string $teHCD): void
  {
    $this->teHCD = $teHCD;
  }

  public function getFiHCD(): string
  {
    return $this->fiHCD;
  }

  public function setFiHCD(string $fiHCD): void
  {
    $this->fiHCD = $fiHCD;
  }

  public function getCHCD(): string
  {
    return $this->cHCD;
  }

  public function setCHCD(string $cHCD): void
  {
    $this->cHCD = $cHCD;
  }

  public function getMotConHCD(): string
  {
    return $this->motConHCD;
  }

  public function setMotConHCD(string $motConHCD): void
  {
    $this->motConHCD = $motConHCD;
  }

  public function getExaFisHCD(): string
  {
    return $this->exaFisHCD;
  }

  public function setExaFisHCD(string $exaFisHCD): void
  {
    $this->exaFisHCD = $exaFisHCD;
  }

  public function getDiagHCD(): string
  {
    return $this->diagHCD;
  }

  public function setDiagHCD(string $diagHCD): void
  {
    $this->diagHCD = $diagHCD;
  }

  public function getTratHCD(): string
  {
    return $this->tratHCD;
  }

  public function setTratHCD(string $tratHCD): void
  {
    $this->tratHCD = $tratHCD;
  }

  public function isActHCD(): bool
  {
    return $this->actHCD;
  }

  public function setActHCD(bool $actHCD): void
  {
    $this->actHCD = $actHCD;
  }

  public function activarHCD(): void
  {
    $this->actHCD = true;
  }

  public function desactivarHCD(): void
  {
    $this->actHCD = false;
  }
}
