      <?php
      $titulo = "Historial del tiquet";
      include '../templates/header.php';
      require '../../config/conexion.php';
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?> <?php echo $_REQUEST['id'] ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-padding-16 w3-responsive" style="min-height: 594px;">
        <div class="w3-row w3-padding-16">
          <?php
          $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
          $sql = "SELECT * FROM tiquets INNER JOIN clientes ON id_cliente = cliente_id WHERE id_tiquet = " . $_REQUEST['id'];
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>
          <div class="w3-content">
            <section class="w3-section">
            <label>Cliente</label>
            <input type="text" value="<?php echo $row['nombre_cliente'] . " " . $row['apellidos_cliente'] ?>" class="w3-input w3-border w3-border-theme w3-round">
            </section>
            <section class="w3-section">
            <label>Actuación a realizar</label>
            <textarea class="w3-block w3-border w3-border-theme w3-round" rows="5">
              <?php echo $row['actuacion'] ?>
            </textarea>
            </section>
          </div>
        </div>
        <table id="grid" class="w3-content w3-table w3-striped w3-bordered w3-responsive" style="color: #555">
          <thead class="w3-theme">
            <tr>
              <th style="width:15%" class="w3-center" onclick="sortTable(0)"></i>Fecha</th>
              <th style="width:10%" onclick="sortTable(1)">Estado</th>
              <th style="width:20%">Comentario</th>
              <th style="width:15%" class="w3-center" style='width: 2%'>Actualizar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $tiquet = "tiquet_" . $_REQUEST['id'];
            $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            $sql = "SELECT * FROM " . $tiquet . " INNER JOIN estados ON id_estado = estado_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <tr>
                  <td class="w3-center"><?php echo $row["fecha"] ?></td>
                  <td><?php echo $row["estado"] ?></td>
                  <td><?php echo $row["comentario"] ?></td>
                  <td class="w3-center"><a class='w3-text-orange w3-padding w3-round' href='update.php?id=<?php echo $_REQUEST['id'] ?>'><i class="fas fa-edit"></i></a></td>
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
      <?php
      include '../templates/footer.php';
      ?>