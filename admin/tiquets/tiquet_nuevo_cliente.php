<script>
  document.getElementById('seleccionar').style.display = "none";
</script>

<form accept-charset="utf-8" action="create_check.php" method="POST" name="nuevoCliente" id="nuevoCliente" class="w3-content w3-padding">
  <div class="section">

    <div class="w3-row w3-padding">
      <h4>Datos cliente</h4>
      <!-- NOMBRE -->
      <div class="w3-col s4">
        <label for='nombre'>Nombre<span id="badName" class="w3-text-red" style="display: none;">* obligatorio</span></label>
        <input class='w3-input w3-border w3-round' type='text' name='nombre' id='nombre' placeholder='Nombre / Name' required />
        <small id="infoNombre"></small>
      </div>
      <!-- APELLIDOS -->
      <div class="w3-col s8">
        <label for="apellidos">Apellidos</label>
        <input class="w3-input w3-border w3-round" type="text" name="apellidos" id="apellidos" placeholder="Apellidos / Surname" required />
        <small id="infoApellidos"></small>
      </div>

      <div class="w3-row">
        <!-- DNI -->
        <div class="w3-col s4">
          <label for="dni">DNI / ID</label>
          <input class="w3-input w3-border w3-round" name="dni" id="dni" type="text" placeholder="DNI - NIE">
          <small id="info_dni"></small>
        </div>
        <!-- EMAIL -->
        <div class="w3-col s4">
          <label for="email">EMAIL</label>
          <input class="w3-input w3-border w3-round" name="email" id="email" type="text" placeholder="name@domain.ext">
          <small id="info_email"></small>
        </div>
        <!-- TELÉFONO -->
        <div class="w3-col s4">
          <label for="telefono">Teléfono</label>
          <input class="w3-input w3-border w3-round" name="telefono" id="telefono" type="text" placeholder="123456789" required />
          <small id="info_telefono"></small>
        </div>
      </div>

    </div>

    <div class="w3-row">
      <!-- DIRECCIÓN -->

      <div class="w3-row w3-padding">
        <h4>Dirección</h4>

        <div class="w3-col s4">
          <label for="calle">Calle</label>
          <input class="w3-input w3-border w3-round" name="calle" id="calle" type="text" placeholder="Calle" required />
          <small id="info_calle"></small>
        </div>

        <div class="w3-col s2">
          <label for="numero">Número</label>
          <input class="w3-input w3-border w3-round" name="numero" id="numero" type="text" placeholder="Nº" required />
          <small id="info_numero"></small>
        </div>

        <div class="w3-col s2">
          <label for="escalera">Escalera</label>
          <input class="w3-input w3-border w3-round" name="escalera" id="escalera" type="text" placeholder="Esc.">
          <small id="info_escalera"></small>
        </div>

        <div class="w3-col s2">
          <label for="piso">Piso</label>
          <input class="w3-input w3-border w3-round" name="piso" id="piso" type="text" placeholder="Piso">
          <small id="info_piso"></small>
        </div>

        <div class="w3-col s2">
          <label for="puerta">Puerta</label>
          <input class="w3-input w3-border w3-round" name="puerta" id="puerta" type="text" placeholder="puerta">
          <small id="info_puerta"></small>
        </div>
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-col s3">
          <label for="cp">Código Postal</label>
          <input class="w3-input w3-border w3-round" name="cp" id="cp" type="text" placeholder="Código Postal">
          <small id="info_cp"></small>
        </div>

        <div class="w3-col s9">
          <label for="poblacion">Población</label>
          <input class="w3-input w3-border w3-round" name="poblacion" id="poblacion" type="text" placeholder="poblacion" required />
          <small id="info_poblacion"></small>
        </div>
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-col w3-padding">
        <h4>Descripción de la incidencia</h4>
        <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="actuacion" id="actuacion" rows="5" required></textarea>
      </div>
    </div>
    <div class="w3-row w3-padding-16">
      <input type='submit' value='Guardar' name='tiquetNuevoCliente' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-right' style='width: 100px;'>
    </div>
  </div>
</form>
<div class="w3-row w3-center w3-padding-48">
        <input type="button" value="volver" onclick="location.replace('../home/index.php')" class="w3-button w3-theme w3-large w3-round w3-padding-large">
      </div>