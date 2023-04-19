      <?php
      include '../templates/header.php';
      $servicio = getServiciosById($_GET['id']);
      $titulo = $servicio['servicio'];
      include '../templates/header_title.php';
      ?>

      <div class="w3-container w3-padding-32 w3-responsive">
        <div class="w3-content w3-mobile">
          <h4>Tiquets sin asignar</h4>
              <?php
              $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
              $sql = "SELECT * FROM tiquets
              INNER JOIN clientes ON id_cliente = cliente_id
              INNER JOIN estados ON id_estado = estado_id
              INNER JOIN servicios ON id_servicio = servicio_id
              WHERE servicio_id = " . $servicio['id_servicio'] . " AND estado_id = 1";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                echo "<table class='w3-table-all w3-striped w3-responsive w3-small'><thead><tr class='w3-theme'><th>ID</th><th style='text-align:left'>Cliente</th><th>Descripción</th><th>Estado</th><th>Editar</th><th>Recargar</th><th>Estado</th></tr></thead><tbody>";
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td style='width: 5%;'><?php echo $row["id_tiquet"] ?></td>
                    <td style='width: 25%; text-align: left;'><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
                    <td style='width: 50%;'><?php echo $row["incidencia"] ?></td>
                    <td style='width: 5%;' class="w3-center"><?php echo $row["estado"] ?></td>
                    <td style='width: 5%;' class="w3-center">
                      <a href='../servicios/update.php?id=<?php echo $row['id_tiquet'] ?>'>
                        <i class='fas fa-user-edit w3-text-theme'></i>
                      </a>
                    </td>
                    <td style='width: 5%;' class="w3-center">
                      <a href='../servicios/charge.php?id=<?php echo $row['id_tiquet'] ?>'>
                        <i class='fas fa-balance-scale w3-text-theme'></i>
                      </a>
                    </td>
                    <td style='width: 5%' class="w3-center">
                      <a href='../servicios/show.php?id=<?php echo $row['id_tiquet'] ?>'>
                        <i class='w3-text-theme'>&#x270f;&#xfe0f;</i>
                      </a>
                    </td>
                  </tr>
              <?php
                }
                echo "</tbody></table>";
              } else {
                echo "No se han encontrado tiquets de esta categoría.";
              }
              mysqli_close($conn);
              ?>
        </div>
        <div class="w3-content w3-mobile">
          <h4>Tiquets asignados</h4>
              <?php
              $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
              $sql = "SELECT * FROM tiquets
              INNER JOIN clientes ON id_cliente = cliente_id
              INNER JOIN estados ON id_estado = estado_id
              INNER JOIN servicios ON id_servicio = servicio_id
              WHERE servicio_id = " . $servicio['id_servicio'] . " AND estado_id = 2";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                echo "<table class='w3-table-all w3-striped w3-responsive w3-small'><thead><tr class='w3-theme'><th>ID</th><th style='text-align:left'>Cliente</th><th>Descripción</th><th>Estado</th><th>Editar</th><th>Recargar</th><th>Estado</th></tr></thead><tbody>";
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td><?php echo $row["id_tiquet"] ?></td>
                    <td style='text-align: left;'><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
                    <td><?php echo $row["incidencia"] ?></td>
                    <td><?php echo $row["estado"] ?></td>
                    <td>
                      <a href='../servicios/update.php?id=<?php echo $row['id_tiquet'] ?>'>
                        <i class='fas fa-user-edit w3-text-theme'></i>
                      </a>
                    </td>
                    <td>
                      <a href='../servicios/charge.php?id=<?php echo $row['id_tiquet'] ?>'>
                        <i class='fas fa-balance-scale w3-text-theme'></i>
                      </a>
                    </td>
                    <td>
                      <a href='../servicios/show.php?id=<?php echo $row['id_tiquet'] ?>'>
                        <i class='w3-text-theme'>&#x270f;&#xfe0f;</i>
                      </a>
                    </td>
                  </tr>
              <?php
                }
                echo "</tbody></table>";
              } else {
                echo "No se han encontrado tiquets de esta categoría.";
              }
              mysqli_close($conn);
              ?>
        </div>
      </div>
      <?php
      include '../templates/footer.php';
      ?>