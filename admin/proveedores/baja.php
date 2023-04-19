      <?php
      $titulo = 'Borrar proveedor';
      include '../templates/header.php';
      require '../../config/conexion.php';
      $proveedor = getProveedoresById($_GET['id']);
      if (isset($_POST['erase'])) {
        $id_proveedor = $proveedor['id_proveedor'];
        $sql = "DELETE FROM proveedores WHERE id_proveedor='$id_proveedor'";
        mysqli_query($conex, $sql);
        echo "<script>location.replace('index.php');</script>";
      }
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-mobile" style="width: 40%; margin: 0 auto;">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l4 w3-round w3-padding">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='nombre_proveedor' class="w3-text-theme-dark w3-medium">Proveedor</label>
              <input class="w3-input w3-border w3-round" type="text" name="nombre_proveedor" placeholder="<?php echo $proveedor['nombre_proveedor']; ?>" value="<?php echo $proveedor['nombre_proveedor']; ?>">
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion_proveedor" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-round" name="descripcion_proveedor" id="descripcion_proveedor" rows="5" placeholder="(Opcional)"><?php echo $proveedor['nombre_proveedor']; ?></textarea>
            </div>

            <?php
            include '../templates/nav_btn_erase.php';
            ?>
          </div>
        </form>
      </div>
      <script>
        captarCheckbox();
      </script>
      <?php
      include '../templates/footer.php';
      ?>