      <?php
      $titulo = 'colaboradores';
      include '../templates/header.php';
      include '../templates/header_index.php';
      $colaboradores = getColaboradores();
      
      ?>

      <div class="w3-content w3-padding w3-responsive">
        <table id="grid" class="w3-table w3-striped w3-bordered w3-responsive w3-medium" style="color: #555">
          <thead>
            <tr class="w3-theme">
              <th>ID</th>
              <th>Colaborador</th>
              <th>Tiquets asignados</th>
              <th class="w3-center"></th>
              <th class="w3-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $num_tiquets = mysqli_num_rows($colaboradores);
            if ($num_tiquets > 0) {
              // output data of each row
              while ($colaborador = mysqli_fetch_assoc($colaboradores)) {
                $tiquets = getTiquetsByColaborador($colaborador['id_colaborador']);
                $col_tiquets = mysqli_num_rows($tiquets);
                echo "<tr>";
                echo "<td style='width: 2%;'>" . $colaborador["id_colaborador"] . "</td>";
                echo "<td style='width: 10%'>" . $colaborador["colaborador"] . "</td>";
                echo "<td style='width: 10%'>" . $col_tiquets . "</td>";
                echo "<td class='w3-center' style='width: 2%'><a class='w3-text-green w3-hover-text-orange' href='update.php?id=" . $colaborador['id_colaborador'] . "'><i class='fas fa-pen w3-medium'></i></a></td>";
                echo "<td class='w3-center' style='width: 2%'><a class='w3-text-red w3-hover-text-orange' href='baja.php?id=" . $colaborador['id_colaborador'] . "'><i class='fas fa-trash w3-medium'></i></a>";
                echo "</tr>";
              }
            } else {
              echo "No se han encontrado registros.";
            }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      include '../templates/footer.php';
      ?>