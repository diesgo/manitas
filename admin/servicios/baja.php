      <?php
      $titulo = 'Borrar categoria';
      include '../templates/header.php';
      include '../templates/header_title.php';
      require '../../config/conexion.php';
      $categoria = getCategoriasById($_GET['id']);
      if (isset($_POST['erase'])) {
        $id_categoria = $categoria['id_categoria'];
        $sql = "DELETE FROM categorias WHERE id_categoria='$id_categoria'";
        mysqli_query($conex, $sql);
        echo "<script>location.replace('index.php');</script>";
      }
      ?>

      <div class="w3-container w3-mobile" style="width: 40%; margin: 0 auto;">
        <form accept-charset="utf-8" action="#" method="POST" name="form" id="form" class="w3-theme-l4 w3-round w3-padding">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for="nombre" class="w3-text-theme-dark w3-medium">Nombre</label><br>
              <input class="w3-input w3-border w3-border-theme-light w3-round-large" name='nombre' type='text' value="<?php echo $categoria['nombre_categoria']; ?>">
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion_categoria" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="descripcion_categoria" id="descripcion_categoria" rows="5" placeholder="(Opcional)"><?php echo $categoria['descripcion_categoria']; ?></textarea>
            </div>

            <div class="w3-col w3-padding">
              <legend for="activo" class="w3-text-theme-dark w3-medium">Visible</legend>
              <label class="switch">
                <input class="activo custom" type="checkbox" name="activo" value="<?php echo $categoria['activo'] ?>">
                <span class="slider round"></span>
              </label>
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