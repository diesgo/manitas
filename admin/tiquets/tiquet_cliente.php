<!-- CLIENTE EXISTENTE -->

<script>document.getElementById('seleccionar').style.display = "none";</script>

<form accept-charset="utf-8" action="create_check.php?cliente=<?php echo $cliente['id_cliente']?>" method="POST" name="nuevoCliente" id="actualCliente" class=" w3-content w3-theme-l4 w3-round w3-padding w3-card">
  <div class="section">

    <div class="w3-row w3-border w3-border-theme w3-padding">
      <h4>Datos cliente</h4>
      <!-- NOMBRE -->
      <div class="w3-col s6 w3-padding">
        <label for='nombre'>Nombre</label>
        <input class='w3-input w3-border w3-round' type='text' value="<?php echo $cliente['nombre_cliente'] ?>" disabled/>
        <small id="infoNombre"></small>
      </div>
      <!-- APELLIDOS -->
      <div class="w3-col s6 w3-padding">
        <label for="apellidos">Apellidos</label>
        <input class="w3-input w3-border w3-round" type="text" value="<?php echo $cliente['apellidos_cliente'] ?>" disabled/>
        <small id="infoApellidos"></small>
      </div>

      <div class="w3-row">
        <!-- DNI -->
        <div class="w3-col s4 w3-padding">
          <label for="dni">DNI / ID</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['dni'] ?>" disabled/>
          <small id="info_dni"></small>
        </div>
        <!-- EMAIL -->
        <div class="w3-col s4 w3-padding">
          <label for="email">EMAIL</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['email'] ?>" disabled/>
          <small id="info_email"></small>
        </div>
        <!-- TELÉFONO -->
        <div class="w3-col s4 w3-padding">
          <label for="telefono">Teléfono</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['telefono'] ?>" disabled/>
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
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['calle'] ?>" disabled/>
          <small id="info_calle"></small>
        </div>

        <div class="w3-col s2 w3-padding-4">
          <label for="numero">Número</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['numero'] ?>" disabled/>
          <small id="info_numero"></small>
        </div>

        <div class="w3-col s2 w3-padding-4">
          <label for="escalera">Escalera</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['escalera'] ?>" disabled/>
          <small id="info_escalera"></small>
        </div>

        <div class="w3-col s2 w3-padding-4">
          <label for="piso">Piso</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['piso'] ?>" disabled/>
          <small id="info_piso"></small>
        </div>

        <div class="w3-col s2 w3-padding-4">
          <label for="puerta">Puerta</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['puerta'] ?>" disabled/>
          <small id="info_puerta"></small>
        </div>
      </div>
      <div class="w3-row w3-padding">
        <div class="w3-col s6 w3-padding-4">
          <label for="cp">Código Postal</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['cp'] ?>" disabled/>
          <small id="info_cp"></small>
        </div>

        <div class="w3-col s6 w3-padding-4">
          <label for="poblacion">Población</label>
          <input class="w3-input w3-border w3-round" value="<?php echo $cliente['poblacion'] ?>" disabled/>
          <small id="info_poblacion"></small>
        </div>
      </div>
    </div>
    <div class="w3-row w3-border w3-border-theme w3-padding">
      <div class="w3-col w3-padding">
        <legend for="actuacion" class="w3-text-theme-dark w3-medium">Incidencia</legend>
        <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="actuacion" id="actuacion" rows="5" placeholder="(Descripción de la incidencia)"></textarea>
      </div>
    </div>
    <div class="w3-row w3-padding-16">
      <input type='submit' value='Guardar' name='tiquetCliente' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-right' style='width: 100px;'>
    </div>
  </div>
</form>