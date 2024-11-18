<?php

require_once 'Usuario.php';
require_once '../config/database.php'; // Para incluir la conexión a la base de datos

class UsuarioServicio
{
  private $db;

  // Constructor para inicializar la conexión a la base de datos
  public function __construct()
  {
    $this->db = conectar(); // Llamada a la función conectar() de database.php
  }

  // Método para registrar un nuevo usuario
  public function registrarUsuario(Usuario $usuario)
  {
    $query = "INSERT INTO Usuarios (dni_usu, ape_usu, nom_usu, user_usu, pass_usu, act_usu, id_rol) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param(
      "isssssi",
      $usuario->getDniPer(),
      $usuario->getApePer(),
      $usuario->getNomPer(),
      $usuario->getUserUsu(),
      password_hash($usuario->getPassUsu(), PASSWORD_BCRYPT), // Encriptar la contraseña
      $usuario->isActUsu(),
      $usuario->getRolUsu()->getIdRol() // Suponiendo que Rol tiene un método getIdRol()
    );
    return $stmt->execute();
  }

  // Método para buscar un usuario por su DNI
  public function buscarUsuario(int $dni): ?Usuario
  {
    $query = "SELECT * FROM Usuarios WHERE dni_usu = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $dni);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
      $usuario = new Usuario();
      $usuario->setDniPer($row['dni_usu']);
      $usuario->setApePer($row['ape_usu']);
      $usuario->setNomPer($row['nom_usu']);
      $usuario->setUserUsu($row['user_usu']);
      $usuario->setPassUsu($row['pass_usu']); // Nota: La contraseña ya está encriptada
      $usuario->setActUsu($row['act_usu']);
      // Asignar rol aquí, asumiendo que tienes un método para crear un objeto Rol
      return $usuario;
    }

    return null;
  }

  public function buscarUsuarioPorUser(string $user): ?Usuario
  {
    $query = "SELECT * FROM Usuarios WHERE user_usu = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
      $usuario = new Usuario();
      $usuario->setDniPer($row['dni_usu']);
      $usuario->setApePer($row['ape_usu']);
      $usuario->setNomPer($row['nom_usu']);
      $usuario->setFecNacPer(new DateTime($row['fec_nac_per']));
      $usuario->setSexPer($row['sex_per']);
      $usuario->setEstCivPer($row['est_civ_per']);
      $usuario->setOcuPer($row['ocu_per']);
      $usuario->setDomPer($row['dom_per']);
      $usuario->setTelPer($row['tel_per']);
      $usuario->setEmailPer($row['email_per']);
      $usuario->setUserUsu($row['user_usu']);
      $usuario->setPassUsu($row['pass_usu']);
      $usuario->setActUsu($row['act_usu']);
      $usuario->setRolUsu(new Rol($row['id_rol'], $row['nom_rol'])); // Asignar rol

      return $usuario;
    }
    return null; // Si no se encuentra el usuario
  }


  // Método para modificar un usuario
  public function modificarUsuario(Usuario $usuario)
  {
    $query = "UPDATE Usuarios SET ape_usu = ?, nom_usu = ?, user_usu = ?, pass_usu = ?, act_usu = ?, id_rol = ? WHERE dni_usu = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param(
      "ssssisi",
      $usuario->getApePer(),
      $usuario->getNomPer(),
      $usuario->getUserUsu(),
      password_hash($usuario->getPassUsu(), PASSWORD_BCRYPT),
      $usuario->isActUsu(),
      $usuario->getRolUsu()->getIdRol(),
      $usuario->getDniPer()
    );
    return $stmt->execute();
  }

  // Método para desactivar un usuario por su DNI
  public function desactivarUsuario(int $dni)
  {
    $query = "UPDATE Usuarios SET act_usu = 0 WHERE dni_usu = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $dni);
    return $stmt->execute();
  }

  // Método para listar todos los usuarios
  public function listarUsuarios(): array
  {
    $usuarios = [];
    $query = "SELECT * FROM Usuarios";
    $result = $this->db->query($query);

    while ($row = $result->fetch_assoc()) {
      $usuario = new Usuario();
      $usuario->setDniPer($row['dni_usu']);
      $usuario->setApePer($row['ape_usu']);
      $usuario->setNomPer($row['nom_usu']);
      $usuario->setUserUsu($row['user_usu']);
      $usuario->setPassUsu($row['pass_usu']);
      $usuario->setActUsu($row['act_usu']);
      // Asignar rol aquí, asumiendo que tienes un método para crear un objeto Rol
      $usuarios[] = $usuario;
    }

    return $usuarios;
  }
}
