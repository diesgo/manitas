      <?php
      $titulo = 'Borrar producto';
      include '../templates/header.php';
      include '../templates/header_title.php';
      require '../../config/conexion.php';
      $producto = getProductsById($_REQUEST['id']);
      if (isset($_REQUEST['erase'])) {
        $id_producto = $producto['id_producto'];
        $nombre = $producto['nombre_producto'];
        $categoria = $producto['nombre_categoria'];
        $variedad = $producto['nombre_variedad'];
        $cantidad = $producto['cantidad'];
        $dispensario = $producto['dispensario'];

        // Create connection

        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

        // Check connection

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO delete_products (product_id, product, category, strain, quantity, shop) VALUES ('$id_producto', '$nombre', '$categoria', '$variedad', '$cantidad', '$dispensario')";

        if ($conn->query($sql) === TRUE) {
          echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
          // echo "<script>location.replace('index.php');</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "DELETE FROM productos WHERE id_producto='$id_producto'";
        mysqli_query($conex, $sql);
        echo "<script>location.replace('index.php');</script>";
      }
      ?>

      <div class="w3-container w3-padding-32 w3-center w3-theme-l4">
        <h2 class="w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $producto['nombre_producto']; ?></b></h2>
      </div>

      <div class="w3-container w3-padding-16 w3-responsive" style="min-height: 616px;">
        <div class="w3-content">
          <div class="w3-row-padding">
            <div class="w3-col l3 m3">
              <h4 class="w3-text-theme">Categoría: <span class="w3-text-dark-grey"><?php echo $producto['nombre_categoria']; ?></span></h4>
            </div>
            <div class="w3-col l3 m3">
              <h4 class="w3-text-theme">Genética: <span class="w3-text-dark-grey"><?php echo $producto['nombre_variedad']; ?></span></h4>
            </div>
            <div class="w3-col l3 m3">
              <h4 class="w3-text-theme">Stock actual: <span class="w3-text-dark-grey"><?php echo $producto['cantidad']; ?> gr.</span></h4>
            </div>
            <div class="w3-col l3 m3">
              <h4 class="w3-text-theme">Precio de venta: <span class="w3-text-dark-grey"><?php echo $producto['pvp']; ?> €</span></h4>
            </div>
          </div>

          <!-- FORMULARIO -->

          <div class="w3-container w3-padding w3-theme-l4 w3-margin-top w3-round" style="width: 35%; margin: 0 auto">
            <form accept-charset="utf-8" action="#" method="post" name="form" id="form">
              <div class="w3-row">

                <div class="w3-col w3-padding">
                  <label for='nombre_producto' class="w3-text-theme w3-medium">Servicio</label>
                  <input class="w3-input w3-border w3-border-theme-light" type="text" name="nombre_producto" placeholder="<?php echo $producto['nombre_servicio']; ?>" value="<?php echo $producto['nombre_servicio']; ?>">
                </div>

                <div class="w3-col w3-padding">
                  <label class="switch">
                    <input class="activo custom" type="checkbox" name="activo" value="<?php echo $producto['activo'] ?>">
                    <span class="slider round"></span>
                  </label>
                </div>

              </div>

              <?php
              include '../templates/nav_btn_erase.php';
              ?>
            </form>
          </div>
        </div>
      </div>
      <?php
      include '../templates/footer.php';
      ?>