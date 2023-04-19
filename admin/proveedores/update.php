      <?php
      $titulo = "Editar proveedor";
      include '../templates/header.php';
      require '../../config/conexion.php';
      $proveedor = getProveedoresById($_GET['id']);
      if (isset($_POST['update'])) {
        $id = $proveedor['id_proveedor'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion_proveedor'];
        $sql = "UPDATE proveedores SET
        nombre_proveedor = '" . $nombre . "',
        descripcion_proveedor = '" . $descripcion . "'
        WHERE id_proveedor = " . $id . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        echo $sql;
        echo "<script>location.replace('index.php');</script>";
        mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
      } else {
        if (!isset($_POST['id_proveedor'])) {
          $sql = "SELECT min(id_proveedor) FROM proveedores";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_proveedor)'];
        } else {
          $id = $_POST["id_proveedor"];
        }
        $sql = "SELECT * FROM proveedores WHERE id_proveedor = '$id'";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre_proveedor'];
        $descripcion = $row['descripcion_proveedor'];
      }
      $sql = "SELECT * FROM proveedores";
      $result = mysqli_query($conex, $sql);

      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme text-shadow"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-mobile">
        <form accept-charset="utf-8" action="#" method="post" class="w3-content w3-theme-l4 w3-round w3-padding box-shadow">
            <div class="w3-row">

              <div class="w3-col w3-padding">
                <label for="nombre" class="w3-text-theme-dark">Nombre</label><br>
                <input class='w3-input w3-border w3-round' name='nombre' id='nombre' type='text' value="<?php echo $proveedor['nombre_proveedor']; ?>" pattern=[A-Z\sa-z]{3,20}>
                <small id="info_nombre"></small>
              </div>

              <div class="w3-col w3-padding">
                <legend for="descripcion_proveedor" class="w3-text-theme-dark w3-mediun">Descripción</legend>
                <textarea class="w3-block w3-border w3-border-theme-light" name="descripcion_proveedor" id="descripcion_proveedor" rows="5"><?php echo $proveedor['descripcion_proveedor'] ?></textarea>
                <small id="info_descripcion_proveedor"></small>
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