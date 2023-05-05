    <?php
    $titulo = "Nuevo Usuario";
    include('../templates/header.php');

    if (isset($_REQUEST['addnew'])) {
      $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
      $sql = "SELECT * FROM users WHERE email = '$_REQUEST[email]'";
      $registro = mysqli_query($conn, $sql) or die("problemas en el select" . mysqli_error($conn)); // Ejecutar la query
      if (mysqli_num_rows($registro) == 0) {
        $username = $_REQUEST['username'];
      $email = $_REQUEST['email'];
      $telefono = $_REQUEST['telefono'];
      $password = $_REQUEST['password'];
      $pass_hash = password_hash($password, PASSWORD_BCRYPT);
      $grupo = $_REQUEST['grupo'];
      $servicio = $_REQUEST['servicio'];
      $sql = "INSERT INTO users (username, email, telefono, password, grupo_id, servicio_id) VALUES ('$username', '$email', '$telefono', '$pass_hash', '$grupo', '$servicio')";
        mysqli_query($conn, $sql) or die('<p>Problemas en el insert' . mysqli_error($conn) . '</p>');
        mysqli_close($conn);
        echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
        echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
      } else {
        echo '<p class="error">Existe una cuenta registrada con este email.</p>';
        echo "<a class='w3-button' href='index.php'>Volver</a>";
      }
    }
    ?>
    <style>
      p.success,
      p.error {
        color: white;
        font-family: lato;
        background: yellowgreen;
        display: inline-block;
        padding: 2px 10px;
      }

      p.error {
        background: orangered;
      }
    </style>

    <div class="w3-container w3-padding-32">
      <div class="w3-content">
        <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
      </div>
    </div>

    <div class="frame">
      <form accept-charset="utf-8" method="POST" action="#" name="signup-form" style="width:300px;margin:auto;">
        <div class="w3-row">
          <div class="w3-col w3-padding">
            <label class="w3-text-theme w3-large">Username</label>
            <input class="w3-input w3-border w3-border-theme w3-round" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
          </div>
          <div class="w3-col w3-padding">
            <label class="w3-text-theme w3-large">Email</label>
            <input class="w3-input w3-border w3-border-theme w3-round" type="text" name="email" required />
          </div>
          <div class="w3-col w3-padding">
            <label class="w3-text-theme w3-large">Teléfono</label>
            <input class="w3-input w3-border w3-border-theme w3-round" type="text" name="telefono" required />
          </div>
          <div class="w3-col w3-padding">
            <label class="w3-text-theme w3-large">Password</label>
            <input class="w3-input w3-border w3-border-theme w3-round" type="text" name="password" required />
          </div>
          <div class="w3-col w3-padding">
            <label for="grupo" class="w3-text-theme w3-large">Grupo de usuarios</label>
            <select name="grupo" id="grupo" class="w3-select w3-border w3-border-theme w3-round w3-white" required>
              <option value="">Seleccionar...</option>
              <?php
              $grupos = getGrupoUsuarios();
              foreach ($grupos as $grupo) :
              ?>
                <option value=<?php echo $grupo['id_grupo']; ?>><?php echo $grupo['grupo'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w3-col w3-padding">
            <label for="servicio" class="w3-text-theme w3-large">servicios</label>
            <select name="servicio" id="servicio" class="w3-select w3-border w3-border-theme w3-round w3-white" required>
              <option value="">Seleccionar...</option>
              <?php
              $servicios = getServicios();
              foreach ($servicios as $servicio) :
              ?>
                <option value=<?php echo $servicio['id_servicio']; ?>><?php echo $servicio['servicio'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w3-row w3-center w3-padding-24">
            <div class="w3-col s6 w3-padding-24 w3-padding">
              <a href="index.php" class="w3-left w3-button w3-theme w3-round w3-hover-theme-light" style="width: 100px;">Volver</a>
            </div>
            <div class="w3-col s6 w3-padding-24 w3-padding">
              <input type='submit' value='Guardar' name='addnew' class='w3-right w3-button w3-border w3-border-theme w3-theme w3-round w3-hover-theme-light' style='width: 100px;'>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php
    include('../templates/footer.php');
    ?>