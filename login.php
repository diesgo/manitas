<?php
include('config/conexion.php');
if (!isset($_REQUEST['iniciar'])) {
  $sql = "SELECT * FROM users WHERE username = '$_REQUEST[username]'";
  $registros = mysqli_query($conex, $sql);
  $registro = mysqli_fetch_array($registros);
  if (mysqli_num_rows($registros) == 0) {
    echo "No existe usuario con este nombre";
    echo "<a class='w3-button' href='index.php'>Volver</a>";
    mysqli_close($conex);
    
  } else if ($registro['password'] != $_REQUEST['pwd']) {
      echo "La contraseña introducina no es correcta.";
      echo "<a class='w3-button' href='index.php'>Volver</a>";
      mysqli_close(($conn));
  } else {
    echo "Se ha iniciado la sesión.";
    header('location: ./admin/index.php');
  }
}
?>