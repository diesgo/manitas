<!-- CLIENTE EXISTENTE -->

<script>
  document.getElementById('seleccionar').style.display = "none";
</script>

<form accept-charset="utf-8" action="create_check.php?cliente_id=<?php echo $cliente['id_cliente'] ?>" method="POST" name="nuevoCliente" id="actualCliente" class="w3-content w3-padding">
  <div class="w3-row">
    <h4>#ID <?php echo $cliente['id_cliente'] ?></h4>
    <p class="datos w3-large">Nombre: <span class="w3-text-grey"><?php echo $cliente['nombre_cliente'] ?> <?php echo $cliente['apellidos_cliente'] ?></span></p>
    <p class="datos w3-large">C/ <?php echo $cliente['calle'] ?>, <?php echo $cliente['numero'] ?> - <?php echo $cliente['piso'] ?>º <?php echo $cliente['puerta'] ?>ª</p>
    <p class="datos w3-large"><?php echo $cliente['poblacion'] ?></p>
    <p class="datos w3-large">Teléfono de contacto: <?php echo $cliente['telefono'] ?></p>
  </div>

  <div class="section">

    <div class="w3-row-cell">
      <h4>Servicio a contratar</h4>
      <select name="servicio_id" id="servicio_id" class='w3-block w3-select w3-white w3-border w3-border-theme w3-round'>
        <?php
        $servicios = getservicios();
        foreach ($servicios as $servicio) :
        ?>
          <option value=<?php echo $servicio['id_servicio']; ?>><?php echo $servicio['servicio'] ?></option>
        <?php endforeach; ?>
      </select>
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
<div class="w3-row w3-center w3-padding-48">
  <input type="button" value="volver" onclick="location.replace('../home/index.php')" class="w3-button w3-theme w3-large w3-round w3-padding-large">
</div>