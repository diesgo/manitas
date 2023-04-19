<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../admin/usuarios/profile.php?id_user=id_user");
  exit;
}

// Include config file
require "../config/functions.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Por favor ingrese su usuario.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Por favor ingrese su contraseña.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT id_user, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id_user"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: ../select.php");
            } else {
              // Display an error message if password is not valid
              $password_err = "La contraseña que has ingresado no es válida.";
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $username_err = "No existe cuenta registrada con ese nombre de usuario.";
        }
      } else {
        echo "Algo salió mal, por favor vuelve a intentarlo.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($link);
}

$setting = getSetingsById(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CCSM | Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/ccms.ico">
  <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
  <link rel="stylesheet" href="../fontawesome5/css/all.css">
  <link rel="stylesheet" href="../css/w3.css">
  <link rel="stylesheet" href="../css/themes/w3-theme-<?php echo $setting['color']; ?>.css">
  <link rel="stylesheet" href="../webfonts/stylesheet.css">
  <link rel="stylesheet" href="../css/style.css">
  <style type="text/css">
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: <?php echo $setting['titulos']; ?>;
    }
  </style>
</head>

<body class="w3-theme-light font-<?php echo $setting['fuente'] ?>">
  <div id="login">
    <div id="content">
      <div id="login-panel">
        <div id="shop-img">
          <img class="w3-image" src="../img/ccms_logo.png" alt="Club Name" />
        </div>
        <div class="flip-container w3-margin-bottom" style="margin-top: 265px;">
          <div class="front panel w3-white">
            <h4 id="shop_name" class="w3-center">pre-alfa 1.0</h4>

            <!-- Formulario de inicio de sesión -->

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

              <div class="w3-margin-bottom w3-row">
                <label for="username">Username</label>
                <input type="text" name="username" class="w3-block" autofocus="autofocus" pattern="[a-zA-Z0-9]+" placeholder="&#128100 Usuario" value="<?php echo $username; ?>" required />
                <span class="help-block"><?php echo $username_err; ?></span>
              </div>

              <div class="w3-margin-bottom">
                <label for="passwod">Contraseña</label>
                <input class="w3-block w3-margin-bottom" id="password" type="password" placeholder="&#128273 Contraseña" name="password" required />
                <span class="help-block"><?php echo $password_err; ?></span>
                <label class="w3-right" for="passwd" style="position: relative; top: -15px;">Show Password
                  <input class="w3-margin-top" type="checkbox" name="passwd" id="passwd" onclick="showPassword()">
                </label>
              </div>

              <button type="submit" value="Ingresar" class="w3-margin-top w3-button w3-theme w3-block w3-round w3-hover-theme"><span class="font-densia">Iniciar sesión</span></button>

            </form>

          </div>
          <script>
            function showPassword() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
          </script>
        </div>
      </div>
      <div id="login-footer">
        <p class="w3-center w3-margin-bottom">&copy; <span class="font-sweet-leaf">CCSM</span>&#8482; 2020-2021 - All rights reserved</p>
        <p class="w3-center" style="letter-spacing: 5px;">
          <a class="w3-xlarge w3-text-blue fab fa-twitter" href="#" title="Twitter"></a>
          <a class="w3-xlarge w3-text-indigo fab fa-facebook" href="#" title="Facebook"></a>
          <a class="w3-xlarge w3-text-darkgrey fab fa-github" href="#" title="Github"></a>
      </div>
    </div>
  </div>

  <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>

</body>

</html>