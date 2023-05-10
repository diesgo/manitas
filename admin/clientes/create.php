      <?php
      $titulo = "Nuevo cliente";
      include '../templates/header.php';
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-16">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <!-- !PAGE CONTENT! -->

      <div class="w3-container w3-padding-16">
        <div class="w3-content">
          <form accept-charset="utf-8" action="create_check.php" method="POST" name="nuevoCliente" id="nuevoCliente" onsubmit="validar()">
            <p id="mensaje" class="w3-large"></p>

            <!-- FICHA SOCIO  -->

            <!-- FILA 1: NOMBRE Y APELLIDO -->

            <div class="w3-row">

              <div class="w3-row">
                <!-- NOMBRE -->
                <div class="w3-col s6 w3-padding">
                  <label for='nombre' class="w3-text-theme">Nombre<span id="badName" class="w3-text-red" style="display: none;">* obligatorio</span></label>
                  <input class='w3-input w3-border w3-border-theme w3-round' type='text' name='nombre' id='nombre' placeholder='Nombre / Name' onchange="checkNombre()" required />
                  <small id="infoNombre"></small>
                </div>
                <!-- APELLIDOS -->
                <div class="w3-col s6 w3-padding">
                  <label for="apellidos" class="w3-text-theme">Apellidos</label>
                  <input class="w3-input w3-border w3-border-theme w3-round" type="text" name="apellidos" id="apellidos" placeholder="Apellidos / Surname" onchange="checkNombre()"/>
                  <small id="infoApellidos"></small>
                </div>
              </div>

              <div class="w3-row">
                <!-- DNI -->
                <div class="w3-col s4 w3-padding">
                  <label for="dni" class="w3-text-theme">DNI / ID</label>
                  <input class="w3-input w3-border w3-border-theme w3-round" name="dni" id="dni" type="text" placeholder="DNI - NIE" />
                  <small id="info_dni"></small>
                </div>
                <!-- EMAIL -->
                <div class="w3-col s4 w3-padding">
                  <label for="email" class="w3-text-theme">EMAIL</label>
                  <input class="w3-input w3-border w3-border-theme w3-round" name="email" id="email" type="text" placeholder="name@domain.ext" />
                  <small id="info_email"></small>
                </div>
                <!-- TELÉFONO -->
                <div class="w3-col s4 w3-padding">
                  <label for="telefono" class="w3-text-theme">Teléfono<span id="badTel" class="w3-text-red" style="display: none;">* obligatorio</span></label>
                  <input class="w3-input w3-border w3-border-theme w3-round" name="telefono" id="telefono" type="text" placeholder="123456789" onchange="checkTel()" required />
                  <small id="info_tel"></small>
                </div>
              </div>

              <div class="w3-row">
                <!-- DIRECCIÓN -->

                <div class="w3-row w3-padding">
                  <h4 class="w3-text-theme">Dirección</h4>

                  <div class="w3-col s4 w3-padding-4">
                    <label for="calle" class="w3-text-theme">Calle</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="calle" id="calle" type="text" placeholder="Calle">
                    <small id="info_calle"></small>
                  </div>

                  <div class="w3-col s2 w3-padding-4">
                    <label for="numero" class="w3-text-theme">Número</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="numero" id="numero" type="text" placeholder="Nº">
                    <small id="info_numero"></small>
                  </div>

                  <div class="w3-col s2 w3-padding-4">
                    <label for="escalera" class="w3-text-theme">Escalera</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="escalera" id="escalera" type="text" placeholder="Esc.">
                    <small id="info_escalera"></small>
                  </div>

                  <div class="w3-col s2 w3-padding-4">
                    <label for="piso" class="w3-text-theme">Piso</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="piso" id="piso" type="text" placeholder="Piso">
                    <small id="info_piso"></small>
                  </div>

                  <div class="w3-col s2 w3-padding-4">
                    <label for="puerta" class="w3-text-theme">Puerta</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="puerta" id="puerta" type="text" placeholder="puerta">
                    <small id="info_puerta"></small>
                  </div>
                </div>
                <div class="w3-row w3-padding">
                  <div class="w3-col s6 w3-padding-4">
                    <label for="cp" class="w3-text-theme">Código Postal</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="cp" id="cp" type="text" placeholder="Código Postal">
                    <small id="info_cp"></small>
                  </div>

                  <div class="w3-col s6 w3-padding-4">
                    <label for="poblacion" class="w3-text-theme">Población</label>
                    <input class="w3-input w3-border w3-border-theme w3-round" name="poblacion" id="poblacion" type="text" placeholder="poblacion">
                    <small id="info_poblacion"></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="w3-row w3-padding">
              <input type='submit' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-hover-theme w3-right' style='width: 100px;'>
            </div>
          </form>
        </div>
      </div>
      <div class="w3-row w3-center w3-padding-48">
            <input type="button" value="volver" onclick="location.replace('../home/index.php')" class="w3-button w3-theme w3-large w3-round w3-padding-large">
        </div>
      <script src="../../js/checkFormNuevoCliente.js"></script>

      <!-- !End page content! -->

      <?php
      include '../templates/footer.php';
      ?>