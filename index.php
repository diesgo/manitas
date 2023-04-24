<?php
session_start();
require_once('config/config.php');
require "config/functions.php";
// Create connection
$conn = openConex();
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$setting = getSetingsById(1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MANITAS</title>
  <link rel="icon" href="img/manitas.ico" type="image/gif" sizes="16x16">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="stylesheet" href="fontawesome5/css/all.css">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/themes/w3-theme-<?php echo $setting['color']; ?>.css">
  <link rel="stylesheet" href="webfonts/stylesheet.css">

  <link rel="stylesheet" href="css/carrito.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: <?php echo $setting['titulos'];?>;
  }

  #text {
    display: none;
    color: red
  }
</style>

<body class="w3-theme-action w3-padding-64">

  <div class="w3-content">
    <div class="w3-row w3-center">
      <img src="img/manitas_logo.png" alt="Logotipo manitas system" width="150px">
    </div>

    <form style="width: 300px;margin: auto;" method="post" action="login/checklogin.php" name="signin-form" class="w3-border w3-round-large w3-padding-large w3-theme-l5 w3-text-theme">
      <h1 class="w3-center">Inicio de sesión</h1>

      <section class="w3-section">
        <label for="username">Usuario</label>
        <input class="w3-input w3-border w3-round" type="text" name="username" id="username" placeholder="username" required />
      </section>

      <section class="w3-section">
        <label for="password">Contraseña</label>
        <small class="w3-right"><a id="passShow" href="#" class="w3-text-blue" onclick="showPassword('passShow', 'password')">Mostrar</a></small>
        <input class="w3-input w3-border w3-round" id="password" type="password" placeholder="&#128273 Password" name="password" required />
        <p id="text" style="display: none;">¡CUIDADO! El bloqueo de mayúsculas está activado.</p>
      </section>

      <section class="w3-section">
        <input class="w3-button w3-blue w3-round w3-block" type="submit" name="submit" value="Acceder">
      </section>
      
    </form>
  </div>

  <p class="w3-center">dbold web 2023</p>

  <script src="js/scripts.js"></script>
  <script>
    pantalla()
  </script>
</body>

</html>