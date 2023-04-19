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
    font-family: <?php echo $setting['titulos'];
    ?>;
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
        <!-- Inicio de sesión -->
        <form style="width: 300px;margin: auto;" method="post" action="login/checklogin.php" name="signin-form"
            class="w3-border w3-round-large w3-padding w3-theme-l5 w3-text-theme">
            <h1 class="w3-center">Inicio de sesión</h1>

            <section class="w3-section">
                <label for="username">Usuario</label>
                <input class="w3-input w3-border w3-round" type="text" name="username" id="username"
                    placeholder="username" required />
            </section>

            <section class="w3-section">
                <label for="password">Contraseña</label>
                <small class="w3-right"><a id="passShow" href="#" class="w3-text-blue"
                        onclick="showPassword('passShow', 'password')">Mostrar</a></small>
                <input class="w3-input w3-border w3-round" id="password" type="password"
                    placeholder="&#128273 Contraseña" name="password" required />
                <p id="text" style="display: none;">¡CUIDADO! El bloqueo de mayúsculas está activado.</p>
            </section>

            <section class="w3-section">
                <input class="w3-button w3-blue w3-round w3-block" type="submit" name="submit">
            </section>

            <!-- <section class="w3-section">
                <small><a class="w3-text-blue" href="login/passLost.php">Olvidé la contraseña</a></small>
            </section> -->

        </form>
    </div>

    <p class="w3-center">dbold web 2023</p>

    <script src="js/scripts.js"></script>
    <script>
    pantalla()
    </script>
</body>

<!-- <body class="w3-theme-light font-<?php echo $setting['color'] ?>">
  <div id="login">
    <div id="content">
      <div id="login-panel" style="margin-top: 10%;">
        <div class="flip-container w3-margin-bottom">
          <div id="shop-img">
            <img class="w3-image" src="img/ccms_logo.png" alt="Club Name" />
          </div>
          <div class="front panel w3-white">
            <h4 id="shop_name" class="w3-center">pre-alfa 1.0</h4>
            <form method="post" action="login/checklogin.php" name="signin-form">
              <div class="w3-margin-bottom w3-row">
                <label>Username</label>
                <input type="text" name="username" class="w3-block" autofocus="autofocus" pattern="[a-zA-Z0-9]+" placeholder="&#128100 Usuario" required />
              </div>
              <div class="w3-margin-bottom">
                <label for="passwod">Contraseña</label>
                <input class="w3-block w3-margin-bottom" id="password" type="password" placeholder="&#128273 Contraseña" name="password" required />
                <p id="text">¡CUIDADO! El bloqueo de mayúsculas está activado.</p>
                <label class="w3-right" for="passwd" style="position: relative; top: -15px;">Show Password
                  <input class="w3-margin-top" type="checkbox" name="passwd" id="passwd" onclick="showPassword()">
                </label>
              </div>
              <button type="submit" name="login" value="login" class="w3-margin-top w3-button w3-theme w3-block w3-round w3-hover-theme">Iniciar sesión</button>
            </form>
          </div>
          <script>
            function showPassword() {
              var x = document.getElementById("passwd");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
            var input = document.getElementById("passwd");
            var text = document.getElementById("text");
            input.addEventListener("keyup", function(event) {

              if (event.getModifierState("CapsLock")) {
                text.style.display = "block";
              } else {
                text.style.display = "none"
              }
            });
          </script>
        </div>
      </div>
      <div id="login-footer">
        <p class="w3-center w3-margin-bottom">&copy; <span class="font-sweet-leaf">Manitas</span>&#8482; 2023-<?php echo date("Y"); ?> - All rights reserved</p>
      </div>
    </div>
    <script>
      function tipoDeUsuario() {
        var kindOfUser = document.getElementById('rol').selectedIndex;
        switch (kindOfUser) {
          case 1:
            document.getElementById("login_form").setAttribute("action", "select.php")
            break;
          case 2:
            document.getElementById("login_form").setAttribute("action", "dispensario/index.php")
            break;
          default:
            break;
        }
      }
    </script>
  </div>
</body> -->

</html>