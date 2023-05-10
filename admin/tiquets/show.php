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
          <label for="nombre_cliente" class="w3-text-theme">Cliente</label>
          <input type="text" name="nombre_cliente" id="nombre_cliente" value="<?php echo $row['nombre_cliente'] . " " . $row['apellidos_cliente'] ?>" class="w3-input w3-border w3-border-theme">

          <legend class="w3-text-theme">Actuación:</legend>
          <textarea class="w3-block w3-border w3-border-theme w3-round" rows="5">
              <?php echo $row['actuacion'] ?>
            </textarea>
        </div>
        <table id="grid" class="w3-table w3-striped w3-bordered" style="color: #555">
          <thead class="w3-theme">
            <tr>
              <th style="width:15%" class="w3-center" onclick="sortTable(0)"></i>Fecha</th>
              <th style="width:10%" onclick="sortTable(1)">Estado</th>
              <th style="width:20%">Comentario</th>
              <th style="width:15%" class="w3-center" style='width: 2%'>Servicio</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $tiquet = "tiquet_" . $_REQUEST['id'];

            if (file_exists('../xml/' . $tiquet . '.xml')) {
              $xml = simplexml_load_file('../xml/' . $tiquet . '.xml');
            } else {
              exit('Error al abrir el archivo ' . $tiquet . '.xml.');
            }

            // $conex = openConex();
            for ($i = 0; $i < count($xml); $i++) {
              $FECHA = $xml->registro[$i]->fecha;
              $COMENTARIO = $xml->registro[$i]->comentario;
              $SERVICIO = $xml->registro[$i]->servicio;
              $ESTADO = $xml->registro[$i]->estado;
            }

            ?>
                <tr>
                  <td class='w3-center'><?php echo $FECHA ?></td>
                  <td><?php echo $ESTADO ?></td>
                  <td><?php echo $COMENTARIO ?></td>
                  <td class="w3-center"><?php echo $SERVICIO ?></td>
                </tr>
          </tbody>
        </table>
      </div>
      <?php
      include '../templates/footer.php';
      ?>