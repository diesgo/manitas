<!-- CLIENTE EXISTENTE -->

<script>
  document.getElementById('seleccionar').style.display = "none";
</script>

<form accept-charset="utf-8" action="create_check.php?cliente=<?php echo $cliente['id_cliente'] ?>" method="GET" name="nuevoCliente" id="actualCliente" class="w3-content w3-padding">
  <div class="section">

  <div class="w3-row">
      <h4>Servicio</h4>
      <div class="w3-col s2 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
        <label><i class="fas fa-question"></i></label>
        <input type="radio" name="servicio" id="1" class="w3-radio w3-block" default>
        <p>Sin determinar</p>
      </div>
      <div class="w3-col s2 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
        <label><i class="fas fa-bolt"></i></label>
        <input type="radio" name="servicio" id="2" class="w3-radio w3-block">
        <p>Electricidad</p>
      </div>
      <div class="w3-col s2 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
        <label><i class="fas fa-hard-hat"></i></label>
        <input type="radio" name="servicio" id="3" class="w3-radio w3-block">
        <p>EAlbañilería</p>
      </div>
      <div class="w3-col s2 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
        <label><i class="fas fa-faucet"></i></label>
        <input type="radio" name="servicio" id="4" class="w3-radio w3-block">
        <p>Fontanería</p>
      </div>
      <div class="w3-col s2 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
        <label><i class="fab fa-hotjar"></i></label>
        <input type="radio" name="servicio" id="5" class="w3-radio w3-block">
        <p>Calefacción</p>
      </div>
      <div class="w3-col s2 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
        <label><i class="fas fa-hammer"></i></label>
        <input type="radio" name="servicio" id="6" class="w3-radio w3-block">
        <p>Carpinteria</p>
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