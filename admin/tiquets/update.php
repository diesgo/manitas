      <?php
      $titulo = "Actualizar tiquet";
      include '../templates/header.php';
      require '../../config/conexion.php';
      $tiquet = getTiquetsById($_GET['id']);
      if (isset($_REQUEST['update'])) {
        $id = $tiquet['id_tiquet'];
        $estado = $_REQUEST['estado'];
        $actuacion = $_REQUEST['actuacion'];
        $servicio = $_REQUEST['servicio'];
        $sql = "UPDATE tiquets SET
        servicio_id = $servicio,
        estado_id = '$estado',
        actuacion = '$actuacion'
        WHERE id_tiquet = " . $id . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
        mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
      } else {
        if (!isset($_REQUEST['id_tiquet'])) {
          $sql = "SELECT min(id_tiquet) FROM tiquets";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_tiquet)'];
        } else {
          $id = $_REQUEST["id_tiquet"];
        }
        $sql = "SELECT * FROM tiquets WHERE id_tiquet = '$id'";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['id_tiquet'];
      }
      $sql = "SELECT * FROM tiquets";
      $result = mysqli_query($conex, $sql);
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b>Actualizar tiquet nº <?php echo $tiquet['id_tiquet'] ?></b></h2>
        </div>
      </div>

      <div class="w3-container">
        <div style="width: 60%; margin: 0 auto;" class="w3-mobile">
          <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l4 w3-round w3-padding w3-card">
            <h5 class="w3-text-theme w3-large">Cliente: <?php echo $tiquet['nombre_cliente'] . " " . $tiquet['apellidos_cliente'] ?></h5>
            <div class="w3-row">

              <div class="w3-col l6 m6">
                <label for="servicio" class="w3-text-theme w3-medium">Servicio</label>
                <select name="servicio" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round">
                  <option value=<?php echo $tiquet['servicio_id']; ?>><?php echo $tiquet['servicio'] ?></option>
                  <?php
                  $servicios = getServicios();
                  foreach ($servicios as $servicio) :
                  ?>
                    <option value=<?php echo $servicio['id_servicio']; ?>><?php echo $servicio['servicio'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="w3-col l6 m6">
                <label for="estado" class="w3-text-theme w3-medium">Estado</label>
                <select name="estado" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round" required>
                  <option value=<?php echo $tiquet['estado_id']; ?>><?php echo $tiquet['estado'] ?></option>
                  <?php
                  $estados = getEstados();
                  foreach ($estados as $estado) :
                  ?>
                    <option value=<?php echo $estado['id_estado']; ?>><?php echo $estado['estado'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="w3-row">

              <!-- Estado -->

              <section class="w3-section">
                <legend for="actuacion" class="w3-text-theme-dark w3-medium">Descripción</legend>
                <textarea class="w3-block w3-border w3-round" name="actuacion" id="actuacion" rows="5" placeholder="Descrive la actuacion" required><?php echo $tiquet['actuacion'] ?></textarea>
                <small id="info_actuacion"></small>
              </section>

              <div class="w3-col l6 m6">

              </div>
            </div>

            <div class="w3-row w3-padding">

              <?php
              include '../templates/nav_btn_upd.php';
              ?>
          </form>
        </div>
      </div>
      <?php
      include '../templates/footer.php';
      ?>