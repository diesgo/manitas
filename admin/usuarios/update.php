      <?php
      $titulo = "Cambiar contraseña";
      include '../templates/header.php';
      require "../../config/conexion.php";
      $user = getUsersById($_GET['id_user']);
      if (isset($_POST['update'])) {
        $id = $user['user_id'];
        $password = $user['password'];
        $check_password = $_POST['check_password'];
        $new_password = $_POST['new_password'];
        $re_password = $_POST['re_password'];
        $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
        $re_password_hash = password_hash($re_password, PASSWORD_BCRYPT);
        $verify_old = password_verify($check_password, $password);
        $verify_new = password_verify($new_password, $re_password_hash);

        // Print the result depending if they match
        if ($verify_old) {
          if ($verify_new) {
            $sql = "UPDATE users SET password = '" . $new_password_hash . "' WHERE id_user = " . $id . ";";
            echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
            echo "<script>location.replace('../home/index.php');</script>";
            mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
          } else {
            echo 'Las contraseñas no coinciden!';
          }
        } else {
          echo 'Contraseña incorrecta';
        }
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

      <!-- !PAGE CONTENT! -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-content w3-padding-32 w3-responsive">
        <div id="main-div" class="w3-padding">

          <form accept-charset="utf-8" action="<?php $PHP_SELF ?>" method="post" name="formulario" id="formulario" class="w3-theme-l4 w3-round w3-padding" style="width: 60%; margin:auto;">
            <div class="w3-content w3-padding">
              <div class="w3-row">
                <div class="w3-col w3-margin-bottom">
                  <label for="username" class="w3-text-theme">Nombre</label><br>
                  <input class='w3-input w3-border w3-round' name='username' id='username' type='text' value="<?php echo $user['username']; ?>" disabled>
                  <small id="info_username"></small>
                </div>
                <div class="w3-col w3-margin-bottom">
                  <label for="check_password" class="w3-text-theme">Contraseña actual</label><br>
                  <input class='w3-input w3-border w3-round' name='check_password' id='check_password' type='text' required>
                  <p id="check_password"></p>
                </div>
                <div class="w3-col w3-margin-bottom">
                  <label for="re_password" class="w3-text-theme">Nueva contraseña</label><br>
                  <input class='w3-input w3-border w3-round' name='re_password' id='re_password' type='text' required>
                  <small id="info_re_password"></small>
                </div>
                <div class="w3-col w3-margin-bottom">
                  <label for="new_password" class="w3-text-theme">Confirmar contraseña</label><br>
                  <input class='w3-input w3-border w3-round' name='new_password' id='new_password' type='text' required>
                  <small id="info_new_passwor"></small>
                </div>
              </div>
            </div>

            <!-- BOTONES NAVEGACIÓN -->

            <div class="w3-row w3-padding-24">
              <div class="w3-col l6 m6 s6 w3-right-align">
                <a href="profile.php" class="w3-button w3-margin w3-border w3-border-theme w3-round w3-text-theme w3-padding w3-hover-theme w3-small" style="width: 100px;">Volver</a>
              </div>
              <div class="w3-col l6 m6 s6 w3-left-align">
                <input type="submit" value="Actualizar" name="update" class="w3-button w3-margin w3-border w3-border-theme w3-round w3-text-theme w3-padding w3-hover-theme w3-small" style="width: 100px;">
              </div>
            </div>
        </div>
        </form>
        <!-- <?php
        print_r($_SESSION);
        ?> -->

      </div>
      </div>
      <!-- !End page content! -->
      <?php
      include '../templates/footer.php';
      ?>