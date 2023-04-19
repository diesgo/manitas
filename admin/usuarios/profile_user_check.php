<?php
include '../../config/config.php';
include '../../config/conexion.php';
include '../../config/functions.php';
session_start();
$user = getUsersById($_GET['id_user']);
if (isset($_POST['update'])) {
  $id = $user['id_user'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellidos'];
  $grupo = $_POST['grupo'];
  $custom_color = $_POST['custom_color'];
  $fuente = $_POST['fuente'];
  $titulos = $_POST['titulos'];
  $sql = "UPDATE users SET
  username = '" . $username . "',
  email = '" . $email . "',
  nombre = '" . $nombre . "',
  apellidos = '" . $apellido . "',
  grupo_id = '" . $grupo . "',
  color_id = '" . $custom_color . "',
  fuente_id = '" . $fuente . "',
  titulos_id = '" . $titulos . "'
  WHERE id_user = " . $id . ";";
  echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
  echo "<script>location.replace('./index.php');</script>";
  mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
} else {
  if (!isset($_POST['id_user'])) {
    $sql = "SELECT min(id_user) FROM users";
    $result = mysqli_query($conex, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['min(id_user)'];
  } else {
    $id = $_POST["id_user"];
  }
  $sql = "SELECT * FROM users WHERE id_user = '$id'";
  $result = mysqli_query($conex, $sql);
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
}
$sql = "SELECT * FROM users";
$result = mysqli_query($conex, $sql);
?>