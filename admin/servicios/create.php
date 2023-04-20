      <?php
      $titulo = "Nueva categoria";
      include '../templates/header.php';
      include '../templates/header_title.php';
      ?>

      <div class="w3-content w3-mobile">
        <form accept-charset="utf-8" action="create_check.php" method="post" name="form" id="form" class="w3-padding" style="width: 60%; margin: 0 auto;">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='servicio' class="w3-text-theme-dark w3-medium">Servicio</label>
              <input class='w3-input w3-border w3-round' name='servicio' id='servicio' type='text' placeholder='servicio' pattern=[A-Z\sa-z]{3,20} required>
              <small id="info_servicio"></small>
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-round" name="descripcion" id="descripcion" rows="5" placeholder="(Opcional)"></textarea>
              <small id="info_descripcion"></small>
            </div>

            <div class="w3-row w3-center w3-padding-24">
                <div class="w3-col l6 m6 s6 w3-padding-24">
                  <a href="index.php" class="w3-button w3-theme w3-round w3-hover-theme-light" style="width: 100px;">Volver</a>
                </div>
                <div class="w3-col l6 m6 s6 w3-padding-24">
                    <input type='submit' value='Guardar' name='addnew' class='w3-button w3-border w3-border-theme w3-text-theme w3-round w3-hover-theme' style='width: 100px;'/>
                </div>
              </div>
          </div>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>