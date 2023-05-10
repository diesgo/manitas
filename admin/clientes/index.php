      <?php
      $titulo = 'Listado de clientes';
      include('../templates/header.php');
      include('../templates/header_index.php');
      $clientes = getClientes();
      ?>

      <!-- Header -->

      <div class="w3-container w3-center">

        <table id="grid" class="w3-table w3-striped w3-bordered" style="color: #555">
          <thead>
            <tr class="w3-theme">
              <th class="w3-center">ID</th>
              <th onclick="sortTable(0)">Nombre</th>
              <th>DNI</th>
              <th>email</th>
              <th>Teléfono</th>
              <th class="w3-center  ">Calle</th>
              <th class="w3-center">Número</th>
              <th class="w3-center">Escalera</th>
              <th>Piso</th>
              <th>Puerta</th>
              <th>CP</th>
              <th class="w3-center">Población</th>
              <th>Editar</th>
              <th>Tiquets abiertos</th>
              <th>Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($clientes as $cliente) :
            ?>
              <tr>
                <td class="w3-center"><?php echo $cliente['id_cliente'] ?></td>
                <td onmouseover="this.style.cursor='pointer';" onclick="location.replace('update.php?id=<?php echo $cliente['id_cliente'] ?>')"><?php echo $cliente["nombre_cliente"] . " " . $cliente['apellidos_cliente']?></td>
                <td><?php echo $cliente["dni"] ?></td>
                <td><?php echo $cliente["email"] ?></td>
                <td><?php echo $cliente["telefono"] ?></td>
                <td><?php echo $cliente["calle"] ?></td>
                <td class='w3-center'><?php echo $cliente["numero"] ?></td>
                <td class='w3-center'><?php echo $cliente['escalera'] ?></td>
                <td class='w3-center'><?php echo $cliente['piso'] ?></td>
                <td class='w3-center'><?php echo $cliente['puerta'] ?></td>
                <td class='w3-center'><?php echo $cliente['cp'] ?></td>
                <td class='w3-center'><?php echo $cliente['poblacion'] ?></td>
                <td class='w3-center'>
                  <a class="w3-text-green w3-hover-text-orange" href="update.php?id=<?php echo $cliente['id_cliente'] ?>">
                    <i class='fas fa-pen w3-medium'></i>
                  </a>
                </td>
                <td class='w3-center'>
                <?php
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM tiquets WHERE cliente_id = $cliente[id_cliente]";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo mysqli_num_rows($result);
                } else {
                  echo "0";
                }
                mysqli_close($conn);
                ?>
                </td>
                <td class='w3-center'>
                  <a class='w3-text-green w3-hover-text-orange' href='show.php?id_cliente=<?php echo $cliente["id_cliente"] ?>'>
                    <i class='fas fa-balance-scale w3-medium'></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="w3-row w3-center w3-padding-48">
            <input type="button" value="volver" onclick="location.replace('../home/index.php')" class="w3-button w3-theme w3-large w3-round w3-padding-large">
        </div>
      <?php
      include '../templates/footer.php';
      ?>