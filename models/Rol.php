<?php
class Rol
{
  // Atributos
  private string $nomRol;

  // Constructor sin parámetros
  public function __construct() {}

  // Métodos getter y setter
  public function getNomRol(): string
  {
    return $this->nomRol;
  }

  public function setNomRol(string $nomRol): void
  {
    $this->nomRol = $nomRol;
  }
}
