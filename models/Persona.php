<?php

class Persona
{
  private int $dniPer;
  private string $apePer;
  private string $nomPer;
  private DateTime $fecNacPer;
  private string $sexPer;
  private string $estCivPer;
  private string $ocuPer;
  private string $domPer;
  private string $telPer;
  private string $emailPer;

  // Constructor sin parámetros
  public function __construct() {}

  // Métodos getter y setter
  public function getDniPer(): int
  {
    return $this->dniPer;
  }

  public function setDniPer(int $dniPer): void
  {
    $this->dniPer = $dniPer;
  }

  public function getApePer(): string
  {
    return $this->apePer;
  }

  public function setApePer(string $apePer): void
  {
    $this->apePer = $apePer;
  }

  public function getNomPer(): string
  {
    return $this->nomPer;
  }

  public function setNomPer(string $nomPer): void
  {
    $this->nomPer = $nomPer;
  }

  public function getFecNacPer(): DateTime
  {
    return $this->fecNacPer;
  }

  public function setFecNacPer(DateTime $fecNacPer): void
  {
    $this->fecNacPer = $fecNacPer;
  }

  public function getSexPer(): string
  {
    return $this->sexPer;
  }

  public function setSexPer(string $sexPer): void
  {
    $this->sexPer = $sexPer;
  }

  public function getEstCivPer(): string
  {
    return $this->estCivPer;
  }

  public function setEstCivPer(string $estCivPer): void
  {
    $this->estCivPer = $estCivPer;
  }

  public function getOcuPer(): string
  {
    return $this->ocuPer;
  }

  public function setOcuPer(string $ocuPer): void
  {
    $this->ocuPer = $ocuPer;
  }

  public function getDomPer(): string
  {
    return $this->domPer;
  }

  public function setDomPer(string $domPer): void
  {
    $this->domPer = $domPer;
  }

  public function getTelPer(): string
  {
    return $this->telPer;
  }

  public function setTelPer(string $telPer): void
  {
    $this->telPer = $telPer;
  }

  public function getEmailPer(): string
  {
    return $this->emailPer;
  }

  public function setEmailPer(string $emailPer): void
  {
    $this->emailPer = $emailPer;
  }
}
