      <?php
      $titulo = "Nuevo colaborador";
      include '../templates/header.php';
      if (isset($_REQUEST['addnew'])) {
        $nombre_colaborador = $_REQUEST['nombre_colaborador'];
        $telefono_colaborador = $_REQUEST['telefono_colaborador'];
        $servicio = $_REQUEST['servicio'];
        $descripcion_colaborador = $_REQUEST['descripcion_colaborador'];
        // Create connection
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO colaboradores (colaborador, telefono_colaborador, servicio_id, descripcion_colaborador) VALUES ('$nombre_colaborador', '$telefono_colaborador', '$servicio', '$descripcion_colaborador')";
        if ($conn->query($sql) === TRUE) {
          echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
          echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
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
        <form accept-charset="utf-8" action="#" method="GET" name="form" id="form" class="w3-content w3-padding">
          <div class="w3-row">

            <div class="w3-col s4 w3-padding">
              <label for='nombre_colaborador' class="w3-text-theme w3-medium"><b>Colaborador</b></label>
              <input class='w3-input w3-border w3-round' name='nombre_colaborador' id='nombre_colaborador' type='text' placeholder='nombre' pattern=[A-Z\sa-z]{3,20} required>
            </div>

            <div class="w3-col s4 w3-padding">
              <label for='telefono_colaborador' class="w3-text-theme w3-medium"><b>Teléfono de contacto</b></label>
              <input class='w3-input w3-border w3-round' name='telefono_colaborador' id='telefono_colaborador' type='text' placeholder='000 000 000' required>
            </div>

            <div class="w3-col s4 w3-padding">
            <label for="servicio" class="w3-text-theme w3-medium"><b>Servicio</b></label>
                <select name="servicio" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round" required>
                  <option value="#">Selecciona una opción...</option>
                  <?php
                  $servicios = getServicios();
                  foreach ($servicios as $servicio) :
                  ?>
                    <option value=<?php echo $servicio['id_servicio']; ?>><?php echo $servicio['servicio'] ?></option>
                  <?php endforeach; ?>
                </select>
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion_colaborador" class="w3-text-theme w3-medium"><b>Descripción</b></legend>
              <textarea class="w3-block w3-border w3-border-theme-light w3-round" name="descripcion_colaborador" id="descripcion_colaborador" rows="5" placeholder="(Opcional)"></textarea>
            </div>

            <div class="w3-row w3-center w3-padding-24">
                <div class="w3-col l6 m6 s6 w3-padding-24">
                  <a href="index.php" class="w3-button w3-theme w3-round w3-hover-theme-light" style="width: 100px;">Volver</a>
                </div>
                <div class="w3-col l6 m6 s6 w3-padding-24">
                  <input type='submit' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-text-theme w3-round w3-hover-theme' style='width: 100px;'/>
                </div>
              </div>

          </div>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>