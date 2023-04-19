      <?php
      $titulo = "Crear proveedor";
      include '../templates/header.php';
      if (isset($_POST['addnew'])) {
        $nombre_proveedor = $_POST['nombre_proveedor'];
        $descripcion_proveedor = $_POST['descripcion_proveedor'];
        // Create connection
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO proveedores (nombre_proveedor, descripcion_proveedor) VALUES ('$nombre_proveedor', '$descripcion_proveedor')";
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
          <h2 id="title" class="w3-center w3-text-theme text-shadow"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-mobile">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-content w3-theme-l4 w3-round w3-padding box-shadow">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='nombre_proveedor' class="w3-text-theme-dark w3-medium">Proveedor</label>
              <input class='w3-input w3-border w3-round-large' name='nombre_proveedor' id='nombre_proveedor' type='text' placeholder='nombre' pattern=[A-Z\sa-z]{3,20} required>
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion_proveedor" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="descripcion_proveedor" id="descripcion_proveedor" rows="5" placeholder="(Opcional)"></textarea>
            </div>

            <?php
            include '../templates/nav_btn_add.php';
            ?>

          </div>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>