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
        <form accept-charset="utf-8" action="#" method="POST" name="seleccionar" id="seleccionar" class="w3-theme-l4 w3-round w3-padding w3-card">
          <p id="mensaje" class="w3-large"></p>
          <section class="w3-section">
            <div class="w3-row w3-center">
              <div class="w3-col s12 m4 w3-padding">
                <label for='Cliente' class="w3-text-theme w3-medium">Cliente</label>
                <select name="cliente" id="cliente" class='w3-block w3-select w3-white w3-border w3-border-theme w3-round' onchange="show('actualCliente')">
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
        <form accept-charset="utf-8" action="#" method="POST" name="nuevoCliente" id="nuevoCliente" class="w3-theme-l4 w3-round w3-padding w3-card" style="display:none;">

          <!-- NUEVO CLIENTE  -->

          <div class="section">

            <div class="w3-row w3-border w3-border-theme w3-padding">
              <h4>Datos cliente</h4>
              <!-- NOMBRE -->
              <div class="w3-col s6 w3-padding">
                <label for='nombre'>Nombre<span id="badName" class="w3-text-red" style="display: none;">* obligatorio</span></label>
                <input class='w3-input w3-border w3-round' type='text' name='nombre' id='nombre' placeholder='Nombre / Name' />
                <small id="infoNombre"></small>
              </div>
              <!-- APELLIDOS -->
              <div class="w3-col s6 w3-padding">
                <label for="apellidos">Apellidos</label>
                <input class="w3-input w3-border w3-round" type="text" name="apellidos" id="apellidos" placeholder="Apellidos / Surname" />
                <small id="infoApellidos"></small>
              </div>

              <div class="w3-row">
                <!-- DNI -->
                <div class="w3-col s4 w3-padding">
                  <label for="dni">DNI / ID</label>
                  <input class="w3-input w3-border w3-round" name="dni" id="dni" type="text" placeholder="DNI - NIE">
                  <small id="info_dni"></small>
                </div>
                <!-- EMAIL -->
                <div class="w3-col s4 w3-padding">
                  <label for="email">EMAIL</label>
                  <input class="w3-input w3-border w3-round" name="email" id="email" type="text" placeholder="name@domain.ext">
                  <small id="info_email"></small>
                </div>
                <!-- TELÉFONO -->
                <div class="w3-col s4 w3-padding">
                  <label for="telefono">Teléfono</label>
                  <input class="w3-input w3-border w3-round" name="telefono" id="telefono" type="text" placeholder="123456789">
                  <small id="info_telefono"></small>
                </div>
              </div>

            </div>

            <div class="w3-row w3-border w3-border-theme w3-padding">
              <!-- DIRECCIÓN -->

              <div class="w3-row w3-padding">
                <h4>Dirección</h4>

                <div class="w3-col s4 w3-padding-4">
                  <label for="calle">Calle</label>
                  <input class="w3-input w3-border w3-round" name="calle" id="calle" type="text" placeholder="Calle">
                  <small id="info_calle"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="numero">Número</label>
                  <input class="w3-input w3-border w3-round" name="numero" id="numero" type="text" placeholder="Nº">
                  <small id="info_numero"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="escalera">Escalera</label>
                  <input class="w3-input w3-border w3-round" name="escalera" id="escalera" type="text" placeholder="Esc.">
                  <small id="info_escalera"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="piso">Piso</label>
                  <input class="w3-input w3-border w3-round" name="piso" id="piso" type="text" placeholder="Piso">
                  <small id="info_piso"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="puerta">Puerta</label>
                  <input class="w3-input w3-border w3-round" name="puerta" id="puerta" type="text" placeholder="puerta">
                  <small id="info_puerta"></small>
                </div>
              </div>
              <div class="w3-row w3-padding">
                <div class="w3-col s6 w3-padding-4">
                  <label for="cp">Código Postal</label>
                  <input class="w3-input w3-border w3-round" name="cp" id="cp" type="text" placeholder="Código Postal">
                  <small id="info_cp"></small>
                </div>

                <div class="w3-col s6 w3-padding-4">
                  <label for="poblacion">Población</label>
                  <input class="w3-input w3-border w3-round" name="poblacion" id="poblacion" type="text" placeholder="poblacion">
                  <small id="info_poblacion"></small>
                </div>
              </div>
            </div>
            <div class="w3-row w3-border w3-border-theme w3-padding">
              <div class="w3-col w3-padding">
                <legend for="comentario" class="w3-text-theme-dark w3-medium">Comentario</legend>
                <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="comentario" id="comentario" rows="5" placeholder="(Descripción de la incidencia)"></textarea>
              </div>
            </div>
            <div class="w3-row w3-padding-16">
              <input type='submit' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-right' style='width: 100px;'>
            </div>
          </div>

          <!-- CLIENTE EXISTENTE -->

          <div class="section" id="actualCliente" style="display:none;">

            <div class="w3-row w3-border w3-border-theme w3-padding">
              <h4>Datos cliente</h4>
              <!-- NOMBRE -->
              <div class="w3-col s6 w3-padding">
                <label for='nombre'>Nombre<span id="badName" class="w3-text-red" style="display: none;">* obligatorio</span></label>
                <input class='w3-input w3-border w3-round' type='text' name='nombre' id='nombre' placeholder='Nombre / Name' />
                <small id="infoNombre"></small>
              </div>
              <!-- APELLIDOS -->
              <div class="w3-col s6 w3-padding">
                <label for="apellidos">Apellidos</label>
                <input class="w3-input w3-border w3-round" type="text" name="apellidos" id="apellidos" placeholder="Apellidos / Surname" />
                <small id="infoApellidos"></small>
              </div>

              <div class="w3-row">
                <!-- DNI -->
                <div class="w3-col s4 w3-padding">
                  <label for="dni">DNI / ID</label>
                  <input class="w3-input w3-border w3-round" name="dni" id="dni" type="text" placeholder="DNI - NIE">
                  <small id="info_dni"></small>
                </div>
                <!-- EMAIL -->
                <div class="w3-col s4 w3-padding">
                  <label for="email">EMAIL</label>
                  <input class="w3-input w3-border w3-round" name="email" id="email" type="text" placeholder="name@domain.ext">
                  <small id="info_email"></small>
                </div>
                <!-- TELÉFONO -->
                <div class="w3-col s4 w3-padding">
                  <label for="telefono">Teléfono</label>
                  <input class="w3-input w3-border w3-round" name="telefono" id="telefono" type="text" placeholder="123456789">
                  <small id="info_telefono"></small>
                </div>
              </div>

            </div>

            <div class="w3-row w3-border w3-border-theme w3-padding">
              <!-- DIRECCIÓN -->

              <div class="w3-row w3-padding">
                <h4>Dirección</h4>

                <div class="w3-col s4 w3-padding-4">
                  <label for="calle">Calle</label>
                  <input class="w3-input w3-border w3-round" name="calle" id="calle" type="text" placeholder="Calle">
                  <small id="info_calle"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="numero">Número</label>
                  <input class="w3-input w3-border w3-round" name="numero" id="numero" type="text" placeholder="Nº">
                  <small id="info_numero"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="escalera">Escalera</label>
                  <input class="w3-input w3-border w3-round" name="escalera" id="escalera" type="text" placeholder="Esc.">
                  <small id="info_escalera"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="piso">Piso</label>
                  <input class="w3-input w3-border w3-round" name="piso" id="piso" type="text" placeholder="Piso">
                  <small id="info_piso"></small>
                </div>

                <div class="w3-col s2 w3-padding-4">
                  <label for="puerta">Puerta</label>
                  <input class="w3-input w3-border w3-round" name="puerta" id="puerta" type="text" placeholder="puerta">
                  <small id="info_puerta"></small>
                </div>
              </div>
              <div class="w3-row w3-padding">
                <div class="w3-col s6 w3-padding-4">
                  <label for="cp">Código Postal</label>
                  <input class="w3-input w3-border w3-round" name="cp" id="cp" type="text" placeholder="Código Postal">
                  <small id="info_cp"></small>
                </div>

                <div class="w3-col s6 w3-padding-4">
                  <label for="poblacion">Población</label>
                  <input class="w3-input w3-border w3-round" name="poblacion" id="poblacion" type="text" placeholder="poblacion">
                  <small id="info_poblacion"></small>
                </div>
              </div>
            </div>
            <div class="w3-row w3-border w3-border-theme w3-padding">
              <div class="w3-col w3-padding">
                <legend for="comentario" class="w3-text-theme-dark w3-medium">Comentario</legend>
                <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="comentario" id="comentario" rows="5" placeholder="(Descripción de la incidencia)"></textarea>
              </div>
            </div>
            <div class="w3-row w3-padding-16">
              <input type='submit' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-right' style='width: 100px;'>
            </div>
          </div>

        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>