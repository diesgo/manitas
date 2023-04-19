      <?php
      $titulo = 'Estados';
      include '../templates/header.php';
      $estados = getEstados();
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-container">
          <div class="w3-display-container" style="height:60px;">
            <h2 id="title" class="w3-display-left w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
            <a class="w3-display-right w3-button w3-blue w3-round-large w3-hover-green w3-margin-top " href="create.php"><i class="fas fa-plus-circle"></i> Nuevo registro</a>
          </div>
        </div>
      </div>

      <div class="w3-container w3-mobile">
        <table id="grid" class="w3-table w3-striped w3-bordered w3-responsive" style="color: #555">
          <thead>
            <tr class="w3-theme">
              <th class="w3-center">ID</th>
              <th class="w3-center">Estado</th>
              <th class="w3-center">Descripción</th>
              <th class="w3-center">Editar</th>
              <th class="w3-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($estados as $estado) {
            ?>
              <tr>
                <td class="w3-center" style="width: 10%;"><?php echo $estado['id_estado'] ?></td>
                <td class="w3-center" style="width: 15%"><?php echo $estado['estado'] ?></td>
                <td style="width: 45%"><?php echo $estado['descripcion'] ?></td>
                <td class="w3-center" style="width: 5%">
                  <a class="w3-text-green w3-hover-text-orange" href="update.php?id=<?php echo $estado['id_estado'] ?>">
                    <i class="fas fa-pen w3-medium"></i>
                  </a>
                </td>
                <td class="w3-center" style="width: 5%">
                  <a class="w3-text-red w3-hover-text-orange" href="baja.php?id=<?php echo $estado['id_estado'] ?>">
                    <i class="fas fa-trash w3-medium"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      include '../templates/footer.php';
      ?>