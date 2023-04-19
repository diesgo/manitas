      <?php
      $titulo = "Traspasar";
      include '../templates/header.php';
      require '../../config/conexion.php';
      $productos = getProductsById($_REQUEST['id']);
      $titulo = $titulo . " " . $productos['nombre_producto'];
      $sql = "SELECT * FROM productos";
      $result = mysqli_query($conex, $sql);
      if (isset($_REQUEST['update'])) {
        $id = $productos['id_producto'];
        $stock = $productos['cantidad'];
        $dispensario = $productos['dispensario'];
        $destino = $_REQUEST['destino'];
        $retirada = $_REQUEST['retirada'];
        $stock_total = $stock - $retirada;
        $stock_dispensario = $dispensario + $retirada;
        $sql = "UPDATE productos SET cantidad ='" . $stock_total . "' WHERE id_producto = " . $id . ";";
        echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        mysqli_query($conex, $sql);
        $sql = "INSERT INTO movimientos_stock (destino_id, producto_id, stock_antes, retirada, stock_despues)
        VALUES ('$destino', '$id', '$stock', '$retirada', '$stock_total')";
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if ($conn->query($sql) === TRUE) {
          if ($destino === "2") {
            $sql = "INSERT INTO dispensario (producto_id, cantidad) VALUES ('$id', '$stock_dispensario')";
            if ($conn->query($sql) === TRUE) {
              echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $sql = "UPDATE productos SET dispensario ='" . $stock_dispensario . "' WHERE id_producto = " . $id . ";";
            if ($conn->query($sql) === TRUE) {
              echo "<h4 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Registro actualizado</h4>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
          echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Hecho</h3>";
          echo "<script>location.replace('index.php')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close() or die("Error al ejecutar la consulta");
      } else {
        if (!isset($_REQUEST['id'])) {
          $sql = "SELECT min(id_producto) FROM productos";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_producto)'];
        } else {
          $id = $_REQUEST["id"];
        }
        $sql = "SELECT * FROM productos WHERE id_producto = '$id'";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id_producto'];
        $dispensario = $row['dispensario'];
      }
      ?>

      <!-- Header -->

      <div class='w3-container w3-padding-32'>
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-padding-32">

        <div class="w3-content w3-padding">

          <form accept-charset="utf-8" action="<?php $PHP_SELF ?>" method="post" name="chargeProduct" id="chargeProduct" class="w3-theme-l4 w3-round">
            <div class="w3-content">

              <div class="w3-row w3-theme">

                <div class="w3-col l6 m6 s6 w3-padding-small">
                  <p class="w3-center">Stock Actual: <span><b><?php echo $productos['cantidad']; ?></b> gr.</span></p>
                </div>

                <div class="w3-col l6 m6 s6 w3-padding-small">
                  <p class="w3-center">En dispensario: <span><b><?php echo $productos['dispensario']; ?></b> gr.</span></p>
                </div>

              </div>

              <div class="w3-row-padding">

                <div class="w3-col l4 m4 w3-padding">
                  <div class="w3-container w3-padding">
                    <label class="w3-text-theme" for="origen">Origen</label>
                    <select name="origen" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round-large w3-margin-bottom">
                      <?php
                      $proveedores = getProveedores();
                      foreach ($proveedores as $proveedor) :
                      ?>
                        <option value=<?php echo $proveedor['id_proveedor']; ?>><?php echo $proveedor['nombre_proveedor'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="w3-col l4 m4 w3-padding">
                  <div class="w3-container w3-padding">
                    <label class="w3-text-theme" for="destino">Destino</label>
                    <select name="destino" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round-large w3-margin-bottom">
                      <?php
                      $destinos = getDestinos();
                      foreach ($destinos as $destino) :
                      ?>
                        <option value=<?php echo $destino['id_destino']; ?>><?php echo $destino['nombre_destino'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="w3-col l4 m4 w3-padding">
                  <div class="w3-container w3-padding">
                    <label for="retirada" class="w3-text-theme">Retirar</label>
                    <input id="retirada" class="w3-input w3-border w3-border-theme-l4 w3-round-large w3-margin-bottom" type="text" placeholder="gr." name="retirada" pattern=[0-9]{1,20} required>
                  </div>
                </div>

                <?php
                include '../templates/nav_btn_upd.php';
                ?>
              </div>
            </div>
          </form>

        </div>

      </div>

      <div class="w3-container w3-padding-32">
        <h3 class="w3-center w3-text-theme">Historial de movimientos</h3>
        <div class="w3-content">

          <!-- TABLA HISTORIAL DE MOVIMIENTOS DE STOCK -->

          <table class="w3-table-all w3-striped w3-border w3-border-theme w3-small">
            <thead>
              <tr class="w3-theme">
                <th>ID</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Stock anterior</th>
                <th>Cantidad recargada</th>
                <th>Precio de compra</th>
                <th>Cantidad retirada</th>
                <th>Stock después</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
              $sql = "SELECT * FROM movimientos_stock
                INNER JOIN destinos ON id_destino = destino_id
                INNER JOIN proveedores ON id_proveedor = proveedor_id
                WHERE producto_id='" . $productos['id_producto'] . "'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td style='width: 2%;'><?php echo $row["id_movimiento"] ?></td>
                    <td><?php echo $row["nombre_proveedor"] ?></td>
                    <td><?php echo $row["nombre_destino"] ?></td>
                    <td class='w3-center'><?php echo $row["stock_antes"] ?> gr.</td>
                    <td class='w3-center'><?php echo $row["recarga"] ?> gr.</td>
                    <td class='w3-center'><?php echo $row["pc"] ?> €</td>
                    <td class='w3-center'><?php echo $row["retirada"] ?> gr.</td>
                    <td class='w3-center'><?php echo $row["stock_despues"] ?> gr.</td>
                    <td><?php echo $row["date_add"] ?></td>
                  </tr>
              <?php
                }
              } else {
                echo "No se han encontrado registros.";
              }
              mysqli_close($conn);
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php
      include '../templates/footer.php';
      ?>