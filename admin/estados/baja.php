      <?php
      $titulo='Borrar rol';
      include '../templates/header.php';
      require '../../config/conexion.php';
      $rol = getRolesById($_GET['id']);
      if(isset($_POST['bajaButton'])){
        $id_rol = $rol['id_rol'];
        $sql = "DELETE FROM roles WHERE id_rol='$id_rol'";
        mysqli_query($conex, $sql);
        echo "<script>location.replace('index.php');</script>";
      }
      ?>
      
      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>                    

      <div class="w3-container w3-mobile" style="width: 40%; margin: 0 auto;">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l2 w3-round-xlarge w3-padding">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='nombre_rol' class="w3-text-theme-dark w3-medium">Servicio</label>
              <input class="w3-input w3-border w3-border-theme-light w3-round-large" type="text" name="nombre_rol" placeholder="<?php echo $rol['nombre_rol']; ?>" value="<?php echo $rol['nombre_rol']; ?>">
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion_rol" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="descripcion_rol" id="descripcion_rol" rows="5" placeholder="(Opcional)"><?php echo $rol['nombre_rol']; ?></textarea>
              <small id="info_descripcion_rol"></small>
            </div>

          </div>

          <?php
          include '../templates/nav_btn_erase.php';
          ?>

        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>