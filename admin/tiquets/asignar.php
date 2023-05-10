      <?php
      $titulo = "Asignar";
      include '../templates/header.php';
      include '../templates/header_title.php';
      require '../../config/conexion.php';
      $tiquet = getTiquetsById($_REQUEST['id']);
      $titulo = $titulo . " " . $tiquet['id_tiquet'];
      $sql = "SELECT * FROM tiquets";
      $result = mysqli_query($conex, $sql);
      if (isset($_REQUEST['update'])) {
        if ($tiquet['servicio_id'] == 1) {
          echo "<script>alert('Antes de asignar un tiquet, debes especificar el servicio')</script>";
        } else {
          $id = $tiquet['id_tiquet'];
          $user = $_REQUEST['id_user'];
          $comentario = $_REQUEST['comentario'];
          $sql = "UPDATE tiquets SET estado_id = 2, user_id =  '$user' WHERE id_tiquet = '$id'";
          mysqli_query(openConex(), $sql);

          $tiquet = "tiquet_" . $_REQUEST['id'];          
          if (file_exists('../xml/' . $tiquet . '.xml')) {
            $xml = simplexml_load_file('../xml/' . $tiquet . '.xml');
          } else {
            exit('Error al abrir el archivo ' . $tiquet . '.xml.');
          }

          if ($conn->query($sql) === TRUE) {
            echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
            echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close() or die("Error al ejecutar la consulta");
          //? echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
        }
      } else {
        if (!isset($_POST['id'])) {
          $sql = "SELECT min(id_tiquet) FROM tiquets";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_tiquet)'];
        } else {
          $id = $_POST["id"];
        }
      }
      ?>

      <div class="w3-container w3-padding-32">

        <div class="w3-content w3-padding">
          <h2>Nº de tiquet: <?php echo $tiquet['id_tiquet'] ?></h2>
          <form accept-charset="utf-8" action="<?php $PHP_SELF ?>" method="POST" name="chargeProduct" id="chargeProduct">
            <div class="w3-content">

              <div class="w3-row">
                <div class="w3-half">
                  <label class="w3-text-theme" for="id_user">user</label>
                  <select name="id_user" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round">
                    <?php
                    $users = getUsers();
                    foreach ($users as $user) :
                    ?>
                      <option value=<?php echo $user['id_user']; ?>><?php echo $user['username'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="w3-row">
                <legend for="comentario" class="w3-text-theme-dark w3-medium">Comentario</legend>
                <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="comentario" id="comentario" rows="5" placeholder="(Obligatorio)" required></textarea>
              </div>
              <div class="w3-row">
                <div class="w3-row w3-padding-24">
                  <div class="w3-col l6 m6 s6 w3-right-align">
                    <a href="index.php" class="w3-button w3-margin w3-border w3-border-theme w3-round w3-theme w3-padding w3-small" style="width: 100px;">Volver</a>
                  </div>
                  <div class="w3-col l6 m6 s6 w3-left-align">
                    <input type='submit' value='Actualizar' name='update' class='w3-button w3-margin w3-border w3-border-theme w3-round w3-theme w3-padding w3-small' style='width: 100px;'>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>

      </div>
      <?php
      include '../templates/footer.php';
      ?>