<?php
session_start();
require_once('../config/config.php');
require '../config/functions.php';
$user=getSetingsById(1);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset password | MANITAS</title>
  <link rel="icon" href="../../img/manitas.ico" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="../../webfonts/stylesheet.css">
  <link rel="stylesheet" href="../../fontawesome5/css/all.css">
  <link rel="stylesheet" href="../../css/w3.css">
  <link rel="stylesheet" href="../../css/checkbox.css">
  <link rel="stylesheet" href="../../css/themes/w3-theme-<?php echo $user['color']; ?>.css">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<style>
  label,
  legend,
  th,
  button,
  input[type="submit"],
  input[type="button"],
  a,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: <?php echo $user['titulo'] ?>;
  }
</style>

<body class="w3-theme-light font-<?php echo $user['fuente'] ?>">

  <!-- Top container -->

  <div class="w3-bar w3-top w3-theme w3-large" style="z-index:4; padding: 2px 32px">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-theme" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
    <span class="w3-bar-item w3-right"><img class="w3-image" src="../../img/manitas_logo.png" alt="logo" style="max-width:24px"></span>
  </div>

  <!-- Sidebar/menu -->

  <nav id="mySidebar" class="w3-sidebar w3-collapse w3-theme-d3" style="z-index:3;width:300px;"><br>

    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="../../img/admin/<?php echo $_SESSION['username'] ?>.png" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong><?php echo $_SESSION['username'] ?></strong></span><br>
        <a href="../mensajes/index.php" class="w3-bar-item w3-button w3-theme-d3 w3-hover-theme"><i class="fa fa-envelope"></i></a>
        <a href="../usuarios/profile.php" class="w3-bar-item w3-button w3-theme-d3 w3-hover-theme"><i class="fa fa-user"></i></a>
        <a href="../usuarios/exit.php" class="w3-bar-item w3-button w3-theme-d3 w3-hover-theme"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </div>

    <div class="w3-container w3-theme">
      <h5 class="w3-text-white"><i class="fas fa-tachometer-alt"></i> Panel de control</h5>
    </div>

    <div class="w3-bar-block">
      <a href="../home/index.php" class="w3-bar-item w3-button w3-padding w3-theme-l1 w3-hover-theme"><i class="fas fa-home"></i> Home</a>

      <button class="w3-button w3-block w3-left-align w3-theme-l1 w3-hover-theme" onclick="dropdown('clientes')"><i class="fa fa-users a-fw"></i> Clientes <i class="w3-right fa fa-caret-down"></i></button>
      <div id="clientes" class="w3-hide w3-white w3-theme-l2">
        <a href="../clientes/index.php" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">Clientes</a>
        <a href="../clientes/create.php" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">Nuevo Cliente</a>
        <a href="#" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">Tarifas</a>
      </div>

      <button class="w3-button w3-block w3-left-align w3-theme-l1 w3-hover-theme" onclick="dropdown('incidencias')"><i class="fa fa-users a-fw"></i> Incidencias <i class="w3-right fa fa-caret-down"></i></button>
      <div id="incidencias" class="w3-hide w3-white w3-theme-l2">
        <a href="../tiquets/index.php" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">tiquets</a>
        <a href="../clientes/create.php" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">Nuevo Cliente</a>
        <a href="#" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">Tarifas</a>
      </div>

      <button class="w3-button w3-block w3-left-align w3-theme-l1 w3-hover-theme" onclick="dropdown('catalogo')"><i class="fas fa-book"></i> Secciones <i class="w3-right fa fa-caret-down"></i></button>
      <div id="catalogo" class="w3-hide w3-white w3-theme-l2">
        <a href="../tiquets/index.php" class="w3-bar-item w3-button w3-hover-theme">Tiquets</a>
        <a href="../servicios/index.php" class="w3-bar-item w3-button w3-hover-theme">Servicios</a>
        <a href="../colaboradores/index.php" class="w3-bar-item w3-button w3-hover-theme">Colaboradores</a>
      </div>

      <button class="w3-button w3-block w3-left-align w3-theme-l1 w3-hover-theme" onclick="dropdown('servicios')"><i class="fas fa-boxes"></i> Servicios <i class="w3-right fa fa-caret-down"></i></button>
      <div id="servicios" class="w3-hide w3-white w3-theme-l2">
        <?php
        $servicios = getServicios();
        foreach ($servicios as $servicio) :
        ?>
          <a href="../servicios/show.php?id=<?php echo $servicio['id_servicio'] ?>" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme"><?php echo $servicio['servicio']; ?></a>
        <?php endforeach; ?>
        <a href="../tiquets/index.php" class="w3-bar-item w3-button w3-text-theme-dark w3-hover-theme">Todas</a>
      </div>

      <?php
      if ($user['grupo_id'] == 1) {
        include 'configuracion.php';
      }
      ?>

      <div class="w3-bar-block">
        <a href="../statics/index.php" class="w3-bar-item w3-button w3-padding w3-theme-l1 w3-hover-theme"><i class="fas fa-chart-line"></i> Statistics</a>
      </div>
    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->

  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <script src="../../js/header.js"></script>

  <div class='w3-main' style='margin-left:300px;margin-top:43px'>