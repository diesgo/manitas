<?php
session_start();
require "config/config.php";
require "config/functions.php";

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user = getUsersById($_SESSION['id_user']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MANITAS</title>
  <link rel="icon" href="img/manitas.ico" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/themes/w3-theme-<?php echo $user['color']; ?>.css">
  <link rel="stylesheet" href="webfonts/stylesheet.css">
  <link rel="stylesheet" href="fontawesome5/css/all.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: <?php echo $user['titulo']; ?>;
  }
</style>

<body class="w3-theme-light font-<?php echo $user['fuente']; ?>">
  <div>

    <div class="w3-cell-row w3-padding w3-center w3-margin-bottom">
      <div class="w3-content w3-theme w3-padding w3-margin-top w3-card w3-round">
        <div class="w3-container w3-padding w3-border w3-round w3-border-theme-light">
          <h1 class="font-sweet-leaf">MANITAS</h1>
          <small>Gestión de tíquets</small>
        </div>
      </div>
    </div>

    <div class="w3-content center">

      <div class="w3-row w3-padding-large">
        <div class="w3-col l4 m4 s12 w3-padding">
          <a class="w3-btn w3-white w3-border w3-border-theme w3-round w3-block w3-margin-top w3-margin-bottom w3-card" href="admin/clientes/index.php">
            <h4 class="w3-center w3-text-theme">Clientes</h4>
            <i class="fas fa-users w3-center w3-xxxlarge w3-margin-bottom w3-text-theme"></i>
          </a>
        </div>

        <div class="w3-col l4 m4 s12 w3-padding">
          <a class="w3-btn w3-white w3-border w3-border-theme w3-round w3-block w3-margin-top w3-margin-bottom w3-card" href="recepcion/index.php">
            <h4 class="w3-center w3-text-theme">Tiquets</h4>
            <i class="fas fa-concierge-bell w3-center w3-xxxlarge w3-margin-bottom w3-text-theme"></i>
          </a>
        </div>

        <div class="w3-col l4 m4 s12 w3-padding">
          <a class="w3-btn w3-white w3-border w3-border-theme w3-round w3-block w3-margin-top w3-margin-bottom w3-card" href="dispensario/home/index.php">
            <h4 class="w3-center w3-text-theme">Nuevo tiquet</h4>
            <i class="fas fa-store w3-center w3-xxxlarge w3-margin-bottom w3-text-theme"></i>
          </a>
        </div>

      </div>

      <div class="w3-row w3-padding-large">
        <div class="w3-col l4 m4 s12 w3-padding">
          <a class="w3-btn w3-white w3-border w3-border-theme w3-round w3-block w3-margin-top w3-margin-bottom w3-card" href="admin/home/index.php">
            <h4 class="w3-center w3-text-theme">Administración</h4>
            <i class="fas fa-cogs w3-center w3-xxxlarge w3-margin-bottom w3-text-theme"></i>
          </a>
        </div>

        <div class="w3-col l4 m4 s12 w3-padding">
          <a class="w3-btn w3-white w3-border w3-border-theme w3-round w3-block w3-margin-top w3-margin-bottom w3-card" href="recepcion/index.php">
            <h4 class="w3-center w3-text-theme">Recepción</h4>
            <i class="fas fa-concierge-bell w3-center w3-xxxlarge w3-margin-bottom w3-text-theme"></i>
          </a>
        </div>

        <div class="w3-col l4 m4 s12 w3-padding">
          <a class="w3-btn w3-white w3-border w3-border-theme w3-round w3-block w3-margin-top w3-margin-bottom w3-card" href="dispensario/home/index.php">
            <h4 class="w3-center w3-text-theme">Dispensario</h4>
            <i class="fas fa-store w3-center w3-xxxlarge w3-margin-bottom w3-text-theme"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</body>

</html>