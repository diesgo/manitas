      <?php
      $titulo = "Editar estado";
      include '../templates/header.php';
      require '../../config/conexion.php';
      $estados = getEstadosById($_REQUEST['id']);
      if (isset($_POST['update'])) {
        $id_estado = $estado['id_estado'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        $sql = "UPDATE estados SET
        estado = '" . $estado . "',
        descripcion = '" . $descripcion ."',
        WHERE id_estado = " . $id_estado . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        echo "<script>location.replace('index.php');</script>";
        mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
      } else {
        if (!isset($_POST['id_estado'])) {
          $sql = "SELECT min(id_estado) FROM estados";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id_estado = $row['min(id_estado)'];
        } else {
          $id_estado = $_POST["id_estado"];
        }
        $sql = "SELECT * FROM estados WHERE id_estado = '$id_estado'";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $estado = $row['estado'];
        $descripcion = $row['descripcion'];
      }
      $sql = "SELECT * FROM estados";
      $result = mysqli_query($conex, $sql);
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-mobile" style="width: 40%; margin: 0 auto;">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l4 w3-round w3-padding">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for="estado" class="w3-text-theme-dark w3-medium">Estado</label><br>
              <input class='w3-input w3-border w3-round' name='estado' id='estado' type='text' value="<?php echo $estados['estado']; ?>">
            </div>

              <div class="w3-col w3-padding">
                <legend for="descripcion" class="w3-text-theme-dark w3-mediun">Descripción</legend>
                <textarea class="w3-block w3-border w3-border-theme-light" name="descripcion" id="descripcion" rows="5"><?php echo $estados['descripcion'] ?></textarea>
              </div>

            </div>

            <?php
            include '../templates/nav_btn_upd.php';
            ?>
          </form>

        </div>
      </div>
      <?php
      include '../templates/footer.php';
      ?>