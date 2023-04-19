      <?php
      $titulo = "Editar colaborador";
      include '../templates/header.php';
      require '../../config/conexion.php';
      $colaborador = getColaboradoresById($_GET['id']);
      if (isset($_POST['update'])) {
        $id = $colaborador['id_colaborador'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion_colaborador'];
        $sql = "UPDATE colaboradores SET
        colaborador = '" . $nombre . "',
        descripcion_colaborador = '" . $descripcion . "'
        WHERE id_colaborador = " . $id . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        echo $sql;
        echo "<script>location.replace('index.php');</script>";
        mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
      } else {
        if (!isset($_POST['id_colaborador'])) {
          $sql = "SELECT min(id_colaborador) FROM colaboradores";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_colaborador)'];
        } else {
          $id = $_POST["id_colaborador"];
        }
        $sql = "SELECT * FROM colaboradores WHERE id_colaborador = '$id'";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['colaborador'];
        $descripcion = $row['descripcion_colaborador'];
      }
      $sql = "SELECT * FROM colaboradores";
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
                <input class='w3-input w3-border w3-round' name='nombre' id='nombre' type='text' value="<?php echo $colaborador['colaborador']; ?>" pattern=[A-Z\sa-z]{3,20}>
                <small id="info_nombre"></small>
              </div>

              <div class="w3-col w3-padding">
                <legend for="descripcion_colaborador" class="w3-text-theme-dark w3-mediun">Descripción</legend>
                <textarea class="w3-block w3-border w3-border-theme-light" name="descripcion_colaborador" id="descripcion_colaborador" rows="5"><?php echo $colaborador['descripcion_colaborador'] ?></textarea>
                <small id="info_descripcion_colaborador"></small>
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