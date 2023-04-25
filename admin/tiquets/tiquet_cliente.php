<!-- CLIENTE EXISTENTE -->

<script>
  document.getElementById('seleccionar').style.display = "none";
</script>

<form accept-charset="utf-8" action="create_check.php?cliente=<?php echo $cliente['id_cliente'] ?>" method="POST" name="nuevoCliente" id="actualCliente" class=" w3-content w3-theme-l4 w3-round w3-padding w3-card">
  <div class="section">

    <div class="w3-row">

      <div class="w3-half w3-padding">
        <h4>Datos cliente</h4>
        <p><?php echo $cliente['nombre_cliente'] ?> <?php echo $cliente['apellidos_cliente'] ?></p>
        <p><i class="fas fa-phone"></i> <?php echo $cliente['telefono'] ?> <i class="fas fa-at"></i> <?php echo $cliente['email'] ?></p>
      </div>

      <div class="w3-half w3-padding">
        <h4>Dirección</h4>
        <p><?php echo $cliente['calle'] ?>, <?php echo $cliente['numero'] ?> <?php echo $cliente['piso'] ?></p>
        <p><?php echo $cliente['cp'] ?> <?php echo $cliente['poblacion'] ?></p>
      </div>

    </div>
    <div class="w3-row w3-padding">
      <h4>Servicio</h4>

      <div class="w3-half">
      
        <div class="w3-col s4 m4 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
          <label><i class="fas fa-question"></i></label>
          <input type="radio" name="servicio" id="1" class="w3-radio w3-block" default>
          <p>Sin determinar</p>
        </div>
        
        <div class="w3-col s4 m4 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
          <label><i class="fas fa-bolt"></i></label>
          <input type="radio" name="servicio" id="2" class="w3-radio w3-block">
          <p>Electricidad</p>
        </div>

        <div class="w3-col s4 m4 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
          <label><i class="fas fa-hard-hat"></i></label>
          <input type="radio" name="servicio" id="3" class="w3-radio w3-block">
          <p>Albañilería</p>
        </div>
      
      </div>

      <div class="w3-half">

        <div class="w3-col s4 m4 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
          <label><i class="fas fa-faucet"></i></label>
          <input type="radio" name="servicio" id="4" class="w3-radio w3-block">
          <p>Fontanería</p>
        </div>
        
        <div class="w3-col s4 m4 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
          <label><i class="fab fa-hotjar"></i></label>
          <input type="radio" name="servicio" id="5" class="w3-radio w3-block">
          <p>Calefacción</p>
        </div>
        
        <div class="w3-col s4 m4 w3-center w3-padding w3-border w3-border-theme w3-round w3-padding-large">
          <label><i class="fas fa-hammer"></i></label>
          <input type="radio" name="servicio" id="6" class="w3-radio w3-block">
          <p>Carpinteria</p>
        </div>

      </div>
    </div>
    <div class="w3-row">
      <div class="w3-col w3-padding">
        <h4>Incidencia</h4>
        <textarea class="w3-block w3-border w3-border-theme-light w3-round-large" name="actuacion" id="actuacion" rows="5" placeholder="(Descripción de la incidencia)"></textarea>
      </div>
    </div>
    <div class="w3-row">
      <input type='submit' value='Guardar' name='tiquetCliente' class='w3-button w3-border w3-border-theme w3-theme w3-round w3-right' style='width: 100px;'>
    </div>
  </div>
</form>