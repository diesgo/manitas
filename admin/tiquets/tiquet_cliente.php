<!-- CLIENTE EXISTENTE -->

<script>
  document.getElementById('seleccionar').style.display = "none";
</script>

<form accept-charset="utf-8" action="create_check.php?cliente=<?php echo $cliente['id_cliente'] ?>" method="GET" name="nuevoCliente" id="actualCliente" class="w3-content w3-padding">
  <div class="section">

  <div class="w3-row">
      <h4>Servicio</h4>
      <div class="w3-half">
        <div class="w3-col s4 w3-center w3-theme w3-border w3-border w3-padding-small">
          <label class="w3-xlarge"><i class="fas fa-question"></i></label>
          <input type="radio" name="servicio" id="1" class="w3-radio w3-block" default>
          <p>Sin precisar</p>
        </div>
        <div class="w3-col s4 w3-center w3-theme w3-border w3-border w3-padding-small">
          <label class="w3-xlarge"><i class="fas fa-bolt"></i></label>
          <input type="radio" name="servicio" id="2" class="w3-radio w3-block">
          <p>Electricidad</p>
        </div>
        <div class="w3-col s4 w3-center w3-theme w3-border w3-border w3-padding-small">
          <label class="w3-xlarge"><i class="fas fa-hard-hat"></i></label>
          <input type="radio" name="servicio" id="3" class="w3-radio w3-block">
          <p>EAlbañilería</p>
        </div>
      </div>

      <div class="w3-half">
        <div class="w3-col s4 w3-center w3-theme w3-border w3-border w3-padding-small">
          <label class="w3-xlarge"><i class="fas fa-faucet"></i></label>
          <input type="radio" name="servicio" id="4" class="w3-radio w3-block">
          <p>Fontanería</p>
        </div>
        <div class="w3-col s4 w3-center w3-theme w3-border w3-border w3-padding-small">
          <label class="w3-xlarge"><i class="fab fa-hotjar"></i></label>
          <input type="radio" name="servicio" id="5" class="w3-radio w3-block">
          <p>Calefacción</p>
        </div>
        <div class="w3-col s4 w3-center w3-theme w3-border w3-border w3-padding-small">
          <label class="w3-xlarge"><i class="fas fa-hammer"></i></label>
          <input type="radio" name="servicio" id="6" class="w3-radio w3-block">
          <p>Carpinteria</p>
        </div>
      </div>


    </div>

    <div class="w3-row">
      <h4>Datos cliente</h4>

      <div class="w3-col s4">
        <label for="nombre_cliente"><b>Nombre</b></label>
        <input type="text" value="<?php echo $cliente['nombre_cliente'] ?> <?php echo $cliente['apellidos_cliente'] ?>" class="w3-input w3-border">
      </div>

      <div class="w3-col s4">
        <label for="telefono_cliente"><b>Teléfono</b></label>
        <input type="text" value="<?php echo $cliente['telefono'] ?>" class="w3-input w3-border">
      </div>

      <div class="w3-col s4">
        <label for="email_cliente"><b>email</b></label>
        <input type="text" value="<?php echo $cliente['email'] ?>" class="w3-input w3-border">
      </div>
      <div class="w3-half w3-padding-16">
        <label><b>Dirección</b></label>
        <p><?php echo $cliente['calle'] ?>, <?php echo $cliente['numero'] ?>, <?php echo $cliente['piso'] ?> <?php echo $cliente['puerta'] ?></p>
        <p>0<?php echo $cliente['cp'] ?> <?php echo $cliente['poblacion'] ?></p>
      </div>

    </div>

    <div class="w3-row">
      <div class="w3-col">
        <h4>Incidencia</h4>
        <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="actuacion" id="actuacion" rows="5" placeholder="(Descripción de la incidencia)" required></textarea>
      </div>
    </div>

    <div class="w3-row w3-padding-16">
      <input type='submit' value='Guardar' name='tiquetCliente' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-right' style='width: 100px;'>
    </div>
  </div>
</form>