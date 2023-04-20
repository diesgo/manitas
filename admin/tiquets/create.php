      <?php
      $titulo = "Nuevo tiquet de asistencia";
      include '../templates/header.php';

      ?>

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-content">
        <form accept-charset="utf-8" action="create.php" method="GET" name="seleccionar" id="seleccionar" class="w3-theme-l4 w3-round w3-padding w3-card" style="display:block">
          <p id="mensaje" class="w3-large"></p>
          <section class="w3-section">
            <div class="w3-row w3-center">
              <div class="w3-col s12 m4 w3-padding">
                <label for='cliente' class="w3-text-theme w3-medium">Cliente</label>
                <select name="cliente" id="cliente" class='w3-block w3-select w3-white w3-border w3-border-theme w3-round' onchange="submit()">
                  <option value="">Selecciona...</option>
                  <?php
                  $clientes = getClientes();
                  foreach ($clientes as $cliente) :
                  ?>
                    <option value=<?php echo $cliente['id_cliente']; ?>><?php echo $cliente['nombre_cliente'] ?> <?php echo $cliente['apellidos_cliente'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="w3-col s12 m4 w3-padding">
                <label for="nuevo_cliente" class="w3-text-theme w3-medium">Nuevo Cliente</label>
                <a href="#" class="w3-block w3-button w3-round w3-border w3-border-theme w3-theme" onclick="show('nuevoCliente')"><i class="fas fa-user-plus"></i></a>
              </div>
            </div>
          </section>
        </form>        
      </div>
      <?php
      if (isset($_REQUEST['cliente'])) {
        $id_cliente = $_REQUEST['cliente'];
        $cliente = getClientesById($id_cliente);
        include_once 'tiquet_cliente.php';        
      }
      include '../templates/footer.php';
      ?>