              <!-- BOTONES NAVEGACIÓN -->
              <div class="w3-row w3-center w3-padding-24">
                <div class="w3-col l6 m6 s6 w3-padding-24">
                  <a href="index.php" class="w3-button w3-theme w3-round w3-hover-theme-light" style="width: 100px;">Volver</a>
                </div>
                <div class="w3-col l6 m6 s6 w3-padding-24">
                  <?php
                  if ($user['grupo_id'] == 1) {
                    echo "<input type='button' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-text-theme w3-round w3-hover-theme' style='width: 100px;' onclick='submit()'>";
                  } else {
                    echo "<input type='button' value='Guardar' class='w3-button w3-border w3-border-theme w3-text-theme w3-round w3-hover-theme' style='width: 100px;'>";
                  }
                  ?>
                </div>
              </div>