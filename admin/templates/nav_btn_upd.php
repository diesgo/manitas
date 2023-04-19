<!-- BOTONES NAVEGACIÓN -->
<div class="w3-row w3-padding-24">
  <div class="w3-col l6 m6 s6 w3-right-align">
    <a href="index.php" class="w3-button w3-margin w3-border w3-border-theme w3-round w3-theme w3-padding w3-small" style="width: 100px;">Volver</a>
  </div>
  <div class="w3-col l6 m6 s6 w3-left-align">
    <?php
    if ($user['grupo_id'] == 1) {
      echo "<input type='submit' value='Actualizar' name='update' class='w3-button w3-margin w3-border w3-border-theme w3-round w3-theme w3-padding w3-small' style='width: 100px;'>";
    } else {
      echo "<input type='button' value='Actualizar' class='w3-button w3-margin w3-border w3-border-theme w3-round w3-text-theme w3-padding w3-small' style='width: 100px;'>";
    }
    ?>
  </div>
</div>