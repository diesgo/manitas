<?php
      $titulo = "EDITAR USUARIO";
      include '../templates/header.php';
      require "../../config/conexion.php";
      $user = getUsersById($_GET['id_user']);
      if (isset($_POST['update'])) {
        $id = $user['id_user'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = '" . $password_hash . "' WHERE id_user = " . $id . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        // echo "<script>location.replace('index.php');</script>";
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

      <!-- !PAGE CONTENT! -->

      <div class="w3-container w3-padding-32 w3-responsive" style="min-height: 616px; width: 40%">
        <div id="main-div" class="w3-padding">
          <div class="w3-container">
            <form accept-charset="utf-8" action="<?php $PHP_SELF ?>" method="post" name="formulario" id="formulario" class="w3-theme-l4 w3-round w3-padding">
              <div class="w3-content">
                <div class="w3-row">
                  <div class="w3-col w3-margin-bottom">
                    <label for="username" class="w3-text-theme">Nombre</label><br>
                    <input class='w3-input w3-border w3-round' name='username' id='username' type='text' value="<?php echo $user['username']; ?>" disabled>
                    <small id="info_username"></small>
                  </div>
                  <div class="w3-col w3-margin-bottom">
                    <label for="password" class="w3-text-theme">Nueva contraseña</label><br>
                    <input class='w3-input w3-border w3-round' name='password' id='password' type='text'>
                    <small id="info_password"><?php echo $user['password']; ?></small>
                  </div>
                </div>
              </div>
              <?php
              include('../templates/nav_btn_upd.php')
              ?>
          </div>
          </form>
        </div>
      </div>
      </div>
      <!-- !End page content! -->
      <?php
      include '../templates/footer.php';
      ?>