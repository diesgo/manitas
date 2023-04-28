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
  nombre = '" . $nombre . "',
  apellidos = '" . $apellido . "',
  email = '" . $email . "',
  grupo_id = '" . $grupo . "',
  tema_id = '" . $custom_color . "',
  fuente_id = '" . $fuente . "',
  titulo_id = '" . $titulos . "'
  WHERE id_user = " . $id . ";";
  mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
  echo "<script>alert('Los cambios se han guardado satisfactoriamente.');</script>";
  echo "<script>function returnIndex(){location.replace('index.php')}; returnIndex();</script>";
  
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