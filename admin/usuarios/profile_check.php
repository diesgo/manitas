<?php
session_start();
include '../../config/config.php';
include '../../config/conexion.php';
if (isset($_POST['update'])) {
  $id = $_SESSION['id_user'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $grupo = $_POST['grupo'];
  $tema_id = $_POST['custom_color'];
  $fuente_id = $_POST['fuente'];
  $titulo_id = $_POST['titulos'];
  $sql = "UPDATE users SET
  username = '" . $username . "',
  email = '" . $email . "',
  nombre = '" . $nombre . "',
  apellidos = '" . $apellidos . "',
  grupo_id = '" . $grupo . "',
  tema_id = '" . $tema_id . "',
  fuente_id = '" . $fuente_id . "',
  titulo_id = '" . $titulo_id . "'
  WHERE id_user = " . $id . ";";
  echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
  echo "<script>function backProfile() {location.replace('profile.php')};setTimeout(backProfile, 1000);</script>";
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