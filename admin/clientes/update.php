      <?php
      $titulo = "Editar cliente";
      include '../templates/header.php';
      $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
      $cliente = getClientesById($_GET['id']);
      if (isset($_REQUEST['update'])) {
        $id = $cliente['id_cliente'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $dni = $_REQUEST['dni'];
        $email = $_REQUEST['email'];
        $telefono = intval($_REQUEST['telefono']);
        $calle = $_REQUEST['calle'];
        $numero = intval($_REQUEST['numero']);
        $escalera = $_REQUEST['escalera'];
        $piso = $_REQUEST['piso'];
        $puerta = $_REQUEST['puerta'];
        $cp = intval($_REQUEST['cp']);
        $poblacion = $_REQUEST['poblacion'];
        $sql = "UPDATE clientes SET nombre_cliente = '" . $nombre . "',
            apellidos_cliente = '" . $apellidos . "',
            dni = '" . $dni . "',
            email = '" . $email . "',
            telefono = '" . $telefono . "',
            calle='" . $calle . "',
            numero = '" . $numero . "',
            escalera ='" . $escalera . "',
            piso = '" . $piso . "',
            puerta = '" . $puerta . "',
            cp = '" . $cp . "',
            poblacion = '" . $poblacion . "'
            WHERE id_cliente = " . $id . ";";
        echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
        echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
        mysqli_query($conex, $sql) or die ("Error al ejecutar la consulta");
      } else {
        if (!isset($_REQUEST['id_cliente'])) {
          $sql = "SELECT min(id_cliente) FROM clientes";
          $result = mysqli_query($conex, $sql);
          $row = mysqli_fetch_assoc($result);
          $id = $row['min(id_cliente)'];
        } else {
          $id = $_REQUEST["id_cliente"];
        }
        $sql = "SELECT * FROM clientes WHERE id_cliente='$id'  ";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre_cliente'];
      }
      $sql = "SELECT * FROM clientes";
      $clientes = mysqli_query($conex, $sql);
      $result = mysqli_fetch_assoc($clientes);
      ?>


      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <!-- !PAGE CONTENT! -->

      <div class="w3-container w3-padding-32 w3-responsive">
        <div class="w3-content">
          <form accept-charset="utf-8" action="#" method="POST" name="createcliente" id="create" class="w3-theme-l4 w3-round w3-padding w3-card">
            <p id="mensaje"></p>

            <!-- FICHA cliente  -->

            <!-- FILA 1: NOMBRE Y APELLIDO -->

            <div class="w3-row">

              <!-- NOMBRE -->

              <div class="w3-col s6 w3-padding">
                <label for='nombre'><span id="badName" class="w3-text-red" style="display: none;">*</span>Nombre</label>
                <input class='w3-input w3-border w3-round' type='text' name='nombre' id='nombre' value="<?php echo $cliente['nombre_cliente'] ?>"/>
                <small id="infoNombre"></small>
              </div>

              <!-- APELLIDOS -->

              <div class="w3-col s6 w3-padding">
                <label for="apellidos">Apellidos</label>
                <input class="w3-input w3-border w3-round" type="text" name="apellidos" id="apellidos" value="<?php echo $cliente['apellidos_cliente'] ?>"/>
                <small id="infoApellidos"></small>
              </div>

              <!-- DNI -->

              <div class="w3-col s4 w3-padding">
                <label for="dni">DNI / ID</label>
                <input class="w3-input w3-border w3-round" name="dni" id="dni" type="text" value="<?php echo $cliente['dni'] ?>">
                <small id="info_dni"></small>
              </div>

              <!-- EMAIL -->

              <div class="w3-col s4 w3-padding">
                <label for="email">EMAIL</label>
                <input class="w3-input w3-border w3-round" name="email" id="email" type="text" value="<?php echo $cliente['email'] ?>">
                <small id="info_email"></small>
              </div>

              <!-- TELÉFONO -->

              <div class="w3-col s4 w3-padding">
                <label for="telefono">Teléfono</label>
                <input class="w3-input w3-border w3-round" name="telefono" id="telefono" type="text" value="<?php echo $cliente['telefono'] ?>">
                <small id="info_telefono"></small>
              </div>

              <!-- DIRECCIÓN -->

              <div class="w3-row w3-padding">
                <h4>Dirección</h4>

                <div class="w3-col s4 w3-padding-4">
                  <label for="calle">Calle</label>
                  <input class="w3-input w3-border w3-round" name="calle" id="calle" type="text" value="<?php echo $cliente['calle'] ?>">
                  <small id="info_calle"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="numero">Número</label>
                  <input class="w3-input w3-border w3-round" name="numero" id="numero" type="text" value="<?php echo $cliente['numero'] ?>">
                  <small id="info_numero"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="escalera">Escalera</label>
                  <input class="w3-input w3-border w3-round" name="escalera" id="escalera" type="text" value="<?php echo $cliente['escalera'] ?>">
                  <small id="info_escalera"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="piso">Piso</label>
                  <input class="w3-input w3-border w3-round" name="piso" id="piso" type="text" value="<?php echo $cliente['piso'] ?>">
                  <small id="info_piso"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="puerta">Puerta</label>
                  <input class="w3-input w3-border w3-round" name="puerta" id="puerta" type="text" value="<?php echo $cliente['puerta'] ?>">
                  <small id="info_puerta"></small>
                </div>
              </div>
              <div class="w3-row w3-padding">
                <div class="w3-col s6 w3-padding-4">
                  <label for="cp">Código Postal</label>
                  <input class="w3-input w3-border w3-round" name="cp" id="cp" type="text" value="<?php echo $cliente['cp'] ?>">
                  <small id="info_cp"></small>
                </div>

                <div class="w3-col s6 w3-padding-4">
                  <label for="poblacion">Población</label>
                  <input class="w3-input w3-border w3-round" name="poblacion" id="poblacion" type="text" value="<?php echo $cliente['poblacion'] ?>">
                  <small id="info_poblacion"></small>
                </div>
              </div>
            </div>
            <div class="w3-row w3-padding">
              <input type='submit' value='Guardar' name='update' class='w3-button w3-border w3-border-theme w3-text-theme w3-round w3-hover-theme w3-right' style='width: 100px;'>
            </div>
          </form>
        </div>
      </div>

      <!-- !End page content! -->

      <?php
      include '../templates/footer.php';
      ?>