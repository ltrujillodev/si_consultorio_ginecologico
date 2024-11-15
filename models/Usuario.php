<?php

class Usuario
{
  // Atributos
  private string $userUsu;
  private string $passUsu;
  private bool $actUsu;
  private Rol $rolUsu;

  // Constructor sin parámetros
  public function __construct() {}

  // Métodos getter y setter
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
    // Hash de la contraseña para mayor seguridad
    $this->passUsu = password_hash($passUsu, PASSWORD_DEFAULT);
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

  // Método para activar el usuario
  public function activarUsuario(): void
  {
    $this->actUsu = true;
  }

  // Método para desactivar el usuario
  public function desactivarUsuario(): void
  {
    $this->actUsu = false;
  }

  // Método para verificar la contraseña
  public function verificarContrasena(string $pass): bool
  {
    return password_verify($pass, $this->passUsu);
  }
}
