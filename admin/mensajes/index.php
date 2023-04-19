      <?php
      $titulo = 'Centro de mesajes';
      include '../templates/header.php';
      $roles = getRoles();
      ?>
      <div class="w3-container w3-padding-32">
        <div class="w3-row-padding w3-mobile">
          <div class="w3-col l6 m6 s12">
            <h2 id="title" class="w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
          </div>
          <div class="w3-col l6 m6 s12">
            <a class="w3-right w3-button w3-blue w3-round-large w3-hover-green w3-margin-top " href="mensaje.php"><i class="fas fa-plus-circle"></i> Enviar mensaje</a>
          </div>
        </div>
      </div>
      <div class="w3-container w3-padding">
        <table id="grid" class="w3-table w3-striped w3-bordered w3-centered w3-responsive">
          <thead>
            <tr class="w3-theme">
              <th>De</th>
              <th class="w3-left-align">Asunto</th>
              <th class="w3-center">Leer</th>
              <th class="w3-center">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            $sql = "SELECT * FROM categorias";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td style='width: 2%;'><?php echo $row["id_categoria"] ?></td>
                  <td style='width: 10%'><?php echo $row["descripcion_categoria"] ?></td>
                  <td class='w3-center' style='width: 2%'><a class='w3-text-green w3-hover-text-orange' href='update.php?id=<?php echo $row['id_categoria'] ?>'><i class='fas fa-pen w3-medium'></i></a></td>
                  <td class='w3-center' style='width: 2%'><a class='w3-text-red w3-hover-text-orange' href='baja.php?id=<?php echo $row['id_categoria'] ?>'><i class='fas fa-trash w3-medium'></i></a>
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