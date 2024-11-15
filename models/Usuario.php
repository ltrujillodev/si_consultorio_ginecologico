<?php

require_once 'Persona.php'; // Incluye la clase Persona
require_once 'Rol.php'; // Incluye la clase Rol para gestionar el rol del usuario

class Usuario extends Persona
{
  private string $userUsu;
  private string $passUsu;
  private bool $actUsu;
  private Rol $rolUsu;

  // Constructor vacío
  public function __construct()
  {
    parent::__construct(); // Llama al constructor vacío de Persona
  }

  // Constructor con parámetros
  public function __constructFull(
    int $dniPer,
    string $apePer,
    string $nomPer,
    DateTime $fecNacPer,
    string $sexPer,
    string $estCivPer,
    string $ocuPer,
    string $domPer,
    string $telPer,
    string $emailPer,
    string $userUsu,
    string $passUsu,
    bool $actUsu,
    Rol $rolUsu
  ) {
    // Llamamos al constructor de Persona (superclase) con parámetros
    parent::__construct($dniPer, $apePer, $nomPer, $fecNacPer, $sexPer, $estCivPer, $ocuPer, $domPer, $telPer, $emailPer);

    $this->userUsu = $userUsu;
    $this->passUsu = $passUsu;
    $this->actUsu = $actUsu;
    $this->rolUsu = $rolUsu;
  }

  // Getters and Setters
  public function getUserUsu(): string
  {
    return $this->userUsu;
  }

  public function setUserUsu(string $userUsu): void
  {
    $this->userUsu = $userUsu;
  }

  public function getPassUsu(): string
  {
    return $this->passUsu;
  }

  public function setPassUsu(string $passUsu): void
  {
    $this->passUsu = $passUsu;
  }

  public function isActUsu(): bool
  {
    return $this->actUsu;
  }

  public function setActUsu(bool $actUsu): void
  {
    $this->actUsu = $actUsu;
  }

  public function getRolUsu(): Rol
  {
    return $this->rolUsu;
  }

  public function setRolUsu(Rol $rolUsu): void
  {
    $this->rolUsu = $rolUsu;
  }

  // Métodos adicionales
  public function activarUsuario(): void
  {
    $this->actUsu = true;
  }

  public function desactivarUsuario(): void
  {
    $this->actUsu = false;
  }

  // Método para verificar la contraseña en base a un hash seguro
  public function verificarContrasena(string $pass): bool
  {
    return password_verify($pass, $this->passUsu);
  }
}
