      <?php
      $titulo = "Editar Servicio";
      include '../templates/header.php';
      include '../templates/header_title.php';
      require '../../config/conexion.php';
      $servicio = getServiciosById($_GET['id']);
      if (isset($_REQUEST['update'])) {
        $id = $servicio['id_servicio'];
        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion_servicio'];
        $sql = "UPDATE servicios SET
        nombre_servicio = '" . $nombre . "',
        descripcion_servicio = '" . $descripcion . "'
        WHERE id_servicio = " . $id . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        echo '<script>window.location="index.php"</script>';
        mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
      } else {
        if (!isset($_REQUEST['id_servicio'])) {
          $sql = "SELECT min(id_servicio) FROM servicios";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_servicio)'];
        } else {
          $id = $_REQUEST["id_servicio"];
        }
        $sql = "SELECT * FROM servicios WHERE id_servicio = '$id'";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre_servicio'];
        $descripcion = $row['descripcion_servicio'];
      }
      $sql = "SELECT * FROM servicios";
      $result = mysqli_query($conex, $sql);
      ?>

      <div class="w3-container w3-mobile" style="width: 40%; margin: 0 auto;">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l4 w3-round w3-padding w3-card">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for="nombre" class="w3-text-theme-dark w3-medium">Nombre</label><br>
              <input class='w3-input w3-border w3-round' name='nombre' id='nombre' type='text' value="<?php echo $servicio['nombre_servicio']; ?>" pattern=[A-Za-z\d\W].{3,30}>
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion_servicio" class="w3-text-theme-dark w3-mediun">Descripción</legend>
              <textarea class="w3-block w3-border w3-border-theme-light w3-round" name="descripcion_servicio" id="descripcion_servicio" rows="5"><?php echo $servicio['descripcion_servicio'] ?></textarea>
            </div>

          </div>

          <?php
          include '../templates/nav_btn_upd.php';
          ?>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>