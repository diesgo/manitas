      <?php
      $titulo = "Nuevo Estado";
      include '../templates/header.php';

      if (isset($_POST['addnew'])) {
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO estados (estado, descripcion) VALUES ('$estado', '$descripcion')";
        if ($conn->query($sql) === TRUE) {
          echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
          echo "<script>location.replace('index.php');</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-mobile">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l3 w3-round w3-padding w3-card" style="width: 60%; margin: 0 auto;">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='estado' class="w3-text-theme-dark w3-medium">Estado</label>
              <input class='w3-input w3-border w3-round-large' name='estado' id='estado' type='text' placeholder='nombre' pattern=[A-Z\sa-z]{3,20} required>
              <small id="info_estado"></small>
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="descripcion" id="descripcion" rows="5" placeholder="(Opcional)"></textarea>
              <small id="info_descripcion"></small>
            </div>

          </div>
          "<input type='submit' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-text-theme w3-round w3-hover-theme' style='width: 100px;'>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>