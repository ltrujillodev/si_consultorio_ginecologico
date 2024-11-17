<?php

require_once '../models/UsuarioServicio.php'; // Incluimos el servicio de usuario para acceder a la lógica de negocio
require_once '../models/Usuario.php'; // Incluimos la clase Usuario

class UsuarioController
{
  private $usuarioServicio;

  public function __construct()
  {
    $this->usuarioServicio = new UsuarioServicio(); // Instanciamos el servicio de usuario
  }

  // Método para iniciar sesión
  public function login($user, $pass)
  {
    $usuario = $this->usuarioServicio->buscarUsuarioPorUser($user);
    if ($usuario && $usuario->verificarContrasena($pass)) {
      // Iniciar sesión
      session_start();
      $_SESSION['usuario'] = [
        'dni' => $usuario->getDniPer(),
        'nombre' => $usuario->getNomPer(),
        'apellido' => $usuario->getApePer(),
        'rol' => $usuario->getRolUsu()->getNomRol()
      ];
      return true; // Login exitoso
    }
    return false; // Credenciales incorrectas
  }

  // Método para registrar un nuevo usuario
  public function registrarUsuario($datos)
  {
    // Validar que el índice rolUsu exista y sea válido
    if (!isset($datos['rolUsu']) || !is_int((int)$datos['rolUsu'])) {
      throw new Exception("El rol del usuario no es válido");
    }

    // Crear un objeto Usuario con los datos proporcionados
    $usuario = new Usuario(
      $datos['dniPer'],
      $datos['apePer'],
      $datos['nomPer'],
      new DateTime($datos['fecNacPer']),
      $datos['sexPer'],
      $datos['estCivPer'],
      $datos['ocuPer'],
      $datos['domPer'],
      $datos['telPer'],
      $datos['emailPer'],
      $datos['userUsu'],
      $datos['passUsu'],
      true, // Activo por defecto
      new Rol((int)$datos['rolUsu']) // Creamos un objeto Rol con el ID
    );

    // Registrar el usuario a través del servicio
    return $this->usuarioServicio->registrarUsuario($usuario);
  }

  // Método para listar todos los usuarios
  public function listarUsuarios()
  {
    return $this->usuarioServicio->listarUsuarios();
  }

  // Método para buscar un usuario por su DNI
  public function buscarUsuario($dni)
  {
    return $this->usuarioServicio->buscarUsuario($dni);
  }

  // Método para modificar un usuario
  public function modificarUsuario($datos)
  {
    // Validar que el índice rolUsu exista y sea válido
    if (!isset($datos['rolUsu']) || !is_int((int)$datos['rolUsu'])) {
      throw new Exception("El rol del usuario no es válido");
    }

    // Crear un objeto Usuario con los datos proporcionados
    $usuario = new Usuario(
      $datos['dniPer'],
      $datos['apePer'],
      $datos['nomPer'],
      new DateTime($datos['fecNacPer']),
      $datos['sexPer'],
      $datos['estCivPer'],
      $datos['ocuPer'],
      $datos['domPer'],
      $datos['telPer'],
      $datos['emailPer'],
      $datos['userUsu'],
      $datos['passUsu'],
      $datos['actUsu'],
      new Rol((int)$datos['rolUsu']) // Creamos un objeto Rol con el ID
    );

    // Modificar el usuario a través del servicio
    return $this->usuarioServicio->modificarUsuario($usuario);
  }

  // Método para desactivar un usuario
  public function desactivarUsuario($dni)
  {
    return $this->usuarioServicio->desactivarUsuario($dni);
  }
}
