<?php
      $titulo = 'Estado de los tiquets';
      include '../templates/header.php';
      include '../templates/header_index.php';
      ?>
      <div class="w3-container">

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
        INNER JOIN clientes ON id_cliente = cliente_id 
        INNER JOIN servicios on id_servicio = servicio_id
        WHERE estado_id = " . $_REQUEST['estado_id'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo "<table id='grid' class='w3-content w3-table w3-striped w3-bordered w3-responsive' style='color: #555;'><thead class='w3-theme'><tr>
              <th width='10%' class='w3-center' onclick='sortTable(0)'></i>Nº tiquet</th>
              <th width='15%' onclick='sortTable(1)'>Cliente </th>
              <th width='25%'>Incidencia</th>
              <th width='10%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
              <th width='10%' class='w3-center'>Consultar</th>
              <th width='10%' class='w3-center'>Asignar</th></tr></thead><tbody>";
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
              <td class='w3-center'><?php echo $row["id_tiquet"] ?></td>
              <td onmouseover="this.style.cursor='pointer';" onclick="location.replace('update.php?id=<?php echo $row['cliente_id'] ?>')"><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
              <td><?php echo $row["actuacion"] ?></td>
              <td class="w3-center cat"><?php echo $row["icono"] ?></td>
              <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='show.php?id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-eye"></i></a></td>
              <td class='w3-center'><a class='w3-text-green w3-hover-text-orange' href='asignar.php?id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-user-cog"></i></a></td>
            </tr>
        <?php
          }
        } else {
          echo "<h4 class='w3-center'>No se han encontrado registros.</h4>";
        }
        mysqli_close($conn);
        ?>
        </tbody>
        </table>
        <div class="w3-row w3-center w3-padding-48">
            <input type="button" value="volver" onclick="location.replace('../home/index.php')" class="w3-button w3-theme w3-large w3-round w3-padding-large">
        </div>
      </div>
      <?php
      include '../templates/footer.php';
      ?>