      <?php
      $titulo = 'Servicios';
      include '../templates/header.php';
      include '../templates/header_index.php';
      ?>

      <div class="w3-content w3-padding">
        
            <?php
            $result = getServicios();
            if (mysqli_num_rows($result) > 0) {
              echo "<table id='grid' class='w3-table w3-striped w3-bordered w3-responsive'><thead><tr class='w3-theme'>".
              "<th>ID</th>".
              "<th style='width:20%' class='w3-left-align'>Servicio</th>".
              "<th style='width:70%' class='w3-left-align'>Descripción</th>".
              "<th style='width:5%' class='w3-center'>Editar</th>".
              "<th style='width:5%' class='w3-center'>Eliminar</th>".
            "</tr></thead><tbody>";
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $row["id_servicio"] ?></td>
                  <td class="w3-left-align"><?php echo $row["servicio"] ?></td>
                  <td><?php echo $row["descripcion_servicio"] ?></td>
                  <td class='w3-center'><a class='w3-text-green w3-hover-text-orange' href='update.php?id=<?php echo $row['id_servicio'] ?>'><i class='fas fa-pen w3-medium'></i></a></td>
                  <td class='w3-center'><a class='w3-text-red w3-hover-text-orange' href='baja.php?id=<?php echo $row['id_servicio'] ?>'><i class='fas fa-trash w3-medium'></i></a>
                </tr>
            <?php
              }
              echo "</tbody></table>";
            } else {
              echo "No se han encontrado registros.";
            }
            ?>
          
      </div>

      <?php
      include '../templates/footer.php';
      ?>