      <?php
      $titulo = "Manitas | Administración";
      include '../templates/header.php';
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-16">
        <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?></b></h2>
        <div class="w3-quarter">
          <a class="w3-button w3-green w3-round w3-hover-green w3-margin-top" href="../clientes/create.php"><i class="fas fa-plus-circle"></i> Nuevo Cliente</a>
        </div>
        <div class="w3-quarter">
          <a class="w3-button w3-green w3-round w3-hover-green w3-margin-top " href="../tiquets/create.php"><i class="fas fa-plus-circle"></i> Nuevo tiquet</a>
        </div>
      </div>

      <div class="w3-row w3-mobile">
        <div class="w3-half w3-padding-small">
          <h4>Tiquets sin asignar</h4>
          <?php
            $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            $sql = "SELECT * FROM tiquets
              INNER JOIN clientes ON id_cliente = cliente_id
              INNER JOIN estados ON id_estado = estado_id
              INNER JOIN servicios ON id_servicio = servicio_id
              WHERE estado_id = 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              echo "<table class='w3-table-all w3-striped w3-responsive'>" .
                  "<thead><tr class='w3-red'><th style='width: 5%;' class='w3-center'>Nº Tiquet</th>" .
                  "<th style='width: 10%; text-align:left'>Cliente</th>" .
                  "<th style='width: 10%;'>Descripción</th>" .
                  "<th style='width: 5%;'>Estado</th>" .
                  "<th style='width: 5%;'></th>" .
                  "</tr></thead><tbody>";
                  // output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td class="w3-center"><?php echo $row["id_tiquet"] ?></td>
            <td style='text-align: left;'><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
            <td><?php echo $row["incidencia"] ?></td>
            <td><?php echo $row["estado"] ?></td>
            <td>
              <a href="../tiquets/asignar.php?id=<?php echo $row["id_tiquet"] ?>" class="w3-button w3-theme w3-block w3-round w3-small">Asignar</a>
            </td>
          </tr>
          <?php
              }
              echo "</tbody></table>";
            } else {
              echo "No se han encontrado productos de esta categoría.";
            }
            mysqli_close($conn);
          ?>
        </div>

        <div class="w3-half w3-padding-small">
          <h4>Tiquets asignados</h4>
          <?php
            $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            $sql = "SELECT * FROM tiquets
              INNER JOIN clientes ON id_cliente = cliente_id
              INNER JOIN estados ON id_estado = estado_id
              INNER JOIN servicios ON id_servicio = servicio_id
              INNER JOIN colaboradores ON id_colaborador = colaborador_id
              WHERE estado_id = 2";
            $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table class='w3-table-all w3-striped w3-responsive'>" .
              "<thead><tr class='w3-yellow'><th style='width: 5%;' class='w3-center'>Nº Tiquet</th>" .
              "<th style='width: 10%; text-align:left'>Cliente</th>" .
              "<th style='width: 10%;'>Descripción</th>" .
              "<th style='width: 5%;'>Estado</th>" .
              "<th style='width: 5%;'>Colaborador</th>" .
              "<th style='width: 10%;' class='w3-center'>Consultar</th>" .
              "</tr></thead><tbody>";
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td class='w3-center'><?php echo $row["id_tiquet"] ?></td>
            <td style='text-align: left;'><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
            <td><?php echo $row["incidencia"] ?></td>
            <td><?php echo $row["estado"] ?></td>
            <td><?php echo $row['colaborador'] ?></td>
            <td class="w3-center">
              <a href='../tiquets/show.php?id=<?php echo $row['id_tiquet'] ?>'>
                <i class='fas fa-eye w3-text-theme'></i>
              </a>
            </td>
          </tr>
          <?php
            }
          echo "</tbody></table>";
          } else {
          echo "No se han encontrado productos de esta categoría.";
          }
          mysqli_close($conn);
          ?>
        </div>
      </div>

      <div class="w3-row w3-mobile">
        <div class="w3-half w3-padding-small">
          <h4>Tiquets en proceso</h4>

          <?php
          $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
          $sql = "SELECT * FROM tiquets
                INNER JOIN clientes ON id_cliente = cliente_id
                INNER JOIN estados ON id_estado = estado_id
                INNER JOIN servicios ON id_servicio = servicio_id
                WHERE estado_id = 3";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table class='w3-table-all w3-striped w3-responsive w3-small'>" .
              "<thead><tr class='w3-green'><th style='width: 10%;'>ID</th>" .
              "<th style='width: 10%; text-align:left'>Cliente</th>" .
              "<th style='width: 15%;'>Descripción</th>" .
              "<th style='width: 10%;'>Estado</th>" .
              "<th style='width: 10%;'>Editar</th>" .
              "<th style='width: 10%;'>Recargar</th>" .
              "<th style='width: 10%;'>Estado</th><" .
              "/tr></thead><tbody>";
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?php echo $row["id_tiquet"] ?></td>
                <td><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
                <td><?php echo $row["incidencia"] ?></td>
                <td><?php echo $row["estado"] ?></td>
                <td>
                  <a href='../productos/update.php?id=<?php echo $row['id_tiquet'] ?>'>
                    <i class='fas fa-user-edit w3-text-theme'></i>
                  </a>
                </td>
                <td>
                  <a href='../productos/charge.php?id=<?php echo $row['id_tiquet'] ?>'>
                    <i class='fas fa-balance-scale w3-text-theme'></i>
                  </a>
                </td>
                <td>
                  <a href='../productos/show.php?id=<?php echo $row['id_tiquet'] ?>'>
                    <i class='w3-text-theme'>&#x270f;&#xfe0f;</i>
                  </a>
                </td>
              </tr>
          <?php
            }
            echo "</tbody></table>";
          } else {
            echo "No se han encontrado registros de este estado.";
          }
          mysqli_close($conn);
          ?>
        </div>

        <div class="w3-half w3-padding-small">
          <h4>Tiquets en espera</h4>

          <?php
          $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
          $sql = "SELECT * FROM tiquets
                INNER JOIN clientes ON id_cliente = cliente_id
                INNER JOIN estados ON id_estado = estado_id
                INNER JOIN servicios ON id_servicio = servicio_id
                WHERE estado_id = 4";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table class='w3-table-all w3-striped w3-responsive w3-small'>" .
              "<thead><tr class='w3-green'><th style='width: 10%;'>ID</th>" .
              "<th style='width: 10%; text-align:left'>Cliente</th>" .
              "<th style='width: 15%;'>Descripción</th>" .
              "<th style='width: 10%;'>Estado</th>" .
              "<th style='width: 10%;'>Editar</th>" .
              "<th style='width: 10%;'>Recargar</th>" .
              "<th style='width: 10%;'>Estado</th><" .
              "/tr></thead><tbody>";
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?php echo $row["id_tiquet"] ?></td>
                <td><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
                <td><?php echo $row["incidencia"] ?></td>
                <td><?php echo $row["estado"] ?></td>
                <td>
                  <a href='../productos/update.php?id=<?php echo $row['id_tiquet'] ?>'>
                    <i class='fas fa-user-edit w3-text-theme'></i>
                  </a>
                </td>
                <td>
                  <a href='../productos/charge.php?id=<?php echo $row['id_tiquet'] ?>'>
                    <i class='fas fa-balance-scale w3-text-theme'></i>
                  </a>
                </td>
                <td>
                  <a href='../productos/show.php?id=<?php echo $row['id_tiquet'] ?>'>
                    <i class='w3-text-theme'>&#x270f;&#xfe0f;</i>
                  </a>
                </td>
              </tr>
          <?php
            }
            echo "</tbody></table>";
          } else {
            echo "No se han encontrado registros de este estado.";
          }
          mysqli_close($conn);
          ?>
        </div>
      </div>

      <div class="w3-row w3-padding-small w3-mobile">

        <h4>Tiquets en pendiente</h4>

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets
              INNER JOIN clientes ON id_cliente = cliente_id
              INNER JOIN estados ON id_estado = estado_id
              INNER JOIN servicios ON id_servicio = servicio_id
              WHERE estado_id = 4";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo "<table class='w3-table-all w3-striped w3-responsive w3-small'>" .
            "<thead><tr class='w3-green'><th style='width: 10%;'>ID</th>" .
            "<th style='width: 10%; text-align:left'>Cliente</th>" .
            "<th style='width: 15%;'>Descripción</th>" .
            "<th style='width: 10%;'>Estado</th>" .
            "<th style='width: 10%;'>Editar</th>" .
            "<th style='width: 10%;'>Recargar</th>" .
            "<th style='width: 10%;'>Estado</th><" .
            "/tr></thead><tbody>";
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row["id_tiquet"] ?></td>
              <td><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
              <td><?php echo $row["incidencia"] ?></td>
              <td><?php echo $row["estado"] ?></td>
              <td>
                <a href='../productos/update.php?id=<?php echo $row['id_tiquet'] ?>'>
                  <i class='fas fa-user-edit w3-text-theme'></i>
                </a>
              </td>
              <td>
                <a href='../productos/charge.php?id=<?php echo $row['id_tiquet'] ?>'>
                  <i class='fas fa-balance-scale w3-text-theme'></i>
                </a>
              </td>
              <td>
                <a href='../productos/show.php?id=<?php echo $row['id_tiquet'] ?>'>
                  <i class='w3-text-theme'>&#x270f;&#xfe0f;</i>
                </a>
              </td>
            </tr>
        <?php
          }
          echo "</tbody></table>";
        } else {
          echo "No se han encontrado registros de este estado.";
        }
        mysqli_close($conn);
        ?>

      </div>

      <!-- FILA DE ESTADÍSTICAS HOME -->

      <div class="w3-row-padding w3-margin-bottom">

        <!-- NÚMERO DE SOCIOS -->

        <div class="w3-quarter">
          <a href="../socios/index.php" style="text-decoration:none">
            <div class="w3-container w3-red w3-padding-16">
              <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $clientes = getNumClientes();
                if (mysqli_num_rows($clientes) > 0) {
                  echo "<h3>" . mysqli_num_rows($clientes) . "</h3>";
                } else {
                  echo "0 results";
                }
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Clientes</h4>
            </div>
          </a>
        </div>

        <!-- NÚMERO DE REFERENCIAS -->

        <div class="w3-quarter">
          <a href="../productos/index.php" style="text-decoration:none">
            <div class="w3-container w3-theme w3-padding-16">
              <div class="w3-left"><i class="fas fa-boxes w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $tiquets = getNumTiquets();
                if (mysqli_num_rows($tiquets) > 0) {
                  // output data of each row
                  echo "<h3>" . mysqli_num_rows($tiquets) . "</h3>";
                } else {
                  echo "0 results";
                }
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Tiquets</h4>
            </div>
          </a>
        </div>

        <!-- NÚMERO DE CATEGORIAS -->

        <div class="w3-quarter">
          <a href="../categorias/index.php" style="text-decoration:none">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
              <div class="w3-left"><i class="fas fa-layer-group w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $servicios = getServicios();
                if (mysqli_num_rows($servicios) > 0) {
                  // output data of each row
                  echo "<h3>" . mysqli_num_rows($servicios) . "</h3>";
                } else {
                  echo "0 results";
                }
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Servicios</h4>
            </div>
          </a>
        </div>

        <!-- NUEVOS SOCIOS -->
        <!-- No funcional. Cambiar por otra cosa -->

        <div class="w3-quarter">
          <div class="w3-container w3-teal w3-padding-16">
            <div class="w3-left"><i class="fas fa-user-plus w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>0</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Nuevos clientes</h4>
          </div>
        </div>
      </div>

      <div class="w3-container w3-dark-grey w3-padding-32">
        <div class="w3-row">
          <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-green">Demographic</h5>
            <p>Language</p>
            <p>Country</p>
            <p>City</p>
          </div>
          <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-red">System</h5>
            <p>Browser: <span id="browser"></span></p>
            <p>OS: <span id="os"></span></p>
            <p>More</p>
          </div>
          <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-orange">Target</h5>
            <p>Users</p>
            <p>Active</p>
            <p>Geo</p>
            <p>Interests</p>
          </div>
        </div>
      </div>
      <script>
        document.getElementById('browser').innerHTML = navigator.appCodeName;
        document.getElementById('browser').innerHTML += " " + navigator.appVersion;
        document.getElementById("os").innerHTML = navigator.platform;
        document.getElementById("os").innerHTML += " " + navigator.language;
      </script>

      <?php
      include '../templates/footer.php';
      ?>