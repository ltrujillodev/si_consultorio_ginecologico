<?php

require_once '../models/Rol.php'; // Incluir la clase Rol si es necesaria para trabajar con roles

class RolController
{
  private $roles;

  public function __construct()
  {
    // Inicializamos con roles predeterminados. Esto puede venir de la base de datos si es dinámico.
    $this->roles = [
      new Rol(1, "MEDICO"),
      new Rol(2, "ENFERMERA")
    ];
  }

  /**
   * Método para listar todos los roles.
   */
  public function listarRoles()
  {
    return $this->roles; // Devuelve la lista de roles
  }

  /**
   * Método para buscar un rol por su ID.
   */
  public function buscarRolPorId(int $idRol)
  {
    foreach ($this->roles as $rol) {
      if ($rol->getIdRol() === $idRol) {
        return $rol;
      }
    }
    return null; // Si no se encuentra, devolvemos null
  }

  /**
   * Método para registrar un nuevo rol (opcional si los roles son fijos).
   */
  public function registrarRol($idRol, $nomRol)
  {
    foreach ($this->roles as $rol) {
      if ($rol->getIdRol() === $idRol) {
        throw new Exception("El rol con ID $idRol ya existe.");
      }
    }
    $nuevoRol = new Rol($idRol, $nomRol);
    $this->roles[] = $nuevoRol;
    return $nuevoRol;
  }

  /**
   * Método para eliminar un rol por su ID (opcional si los roles son fijos).
   */
  public function eliminarRol(int $idRol)
  {
    foreach ($this->roles as $index => $rol) {
      if ($rol->getIdRol() === $idRol) {
        unset($this->roles[$index]);
        return true; // Eliminación exitosa
      }
    }
    return false; // No se encontró el rol
  }
}
