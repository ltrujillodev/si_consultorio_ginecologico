<?php

class Rol
{
  private int $idRol;
  private string $nomRol;

  public function __construct(int $idRol, string $nomRol)
  {
    $this->idRol = $idRol;
    $this->nomRol = $nomRol;
  }

  public function getIdRol(): int
  {
    return $this->idRol;
  }

  public function setIdRol(int $idRol)
  {
    $this->idRol = $idRol;
  }

  public function getNomRol(): string
  {
    return $this->nomRol;
  }

  public function setNomRol(string $nomRol)
  {
    $this->nomRol = $nomRol;
  }
}
