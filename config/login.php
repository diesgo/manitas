<?php
require_once('functions.php');
echo "<style>a{
  text-decoration: none;
}
.button{
  width: 90px;
    padding: 8px;
    display: inline-block;
    border-radius: 5px;
    border: none;
    background-color:dodgerblue;
    color: aliceblue;}
    </style>";

$conn = openConex();

$sql = "SELECT * FROM users WHERE username = '$_REQUEST[user]'";
$registros = mysqli_query($conn, $sql);
$registro = mysqli_fetch_array($registros);
// if (password_verify('rasmuslerdorf', $hash)) {
//   echo 'La contraseña es válida!';
// } else {
//   echo 'La contraseña no es válida.';
// }

if (mysqli_num_rows($registros) == 0) {
  echo "<p>No existe usuario con este nombre</p>";
  echo "<a href='../login.html'><p class='button' style='text-align:center;'>Volver</p></a>";
  mysqli_close($conn);
}
if (password_verify($_REQUEST['pass'], $registro['password'])) {
  echo "<p style='text-align:center;'>La contraseña introducina no es correcta <span><a href='../index.php' class='button'>Volver</a></span></p>";
  mysqli_close(($conn));
} else {
  echo "<script>alert('Se ha iniciado sesión.')</script>";
  $nombre = $registro['nombre'];
  $apellidos = $registro['apellidos'];
  $mail = $registro['mail'];
  if (isset($_REQUEST['update'])) {
    echo "<p>Variable \$_REQUEST['update'] con datos (valor true)</p>";
  } else {
    echo "<p>Variable \$_REQUEST['update'] vacía (valor false)</p>";
    echo $registro['nombre'] . " ";
    echo $registro['apellidos'];
  }
}
