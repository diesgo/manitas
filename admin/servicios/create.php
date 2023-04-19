      <?php
      $titulo = "Nueva categoria";
      include '../templates/header.php';
      include '../templates/header_title.php';
      ?>

      <div class="w3-content w3-mobile">
        <form accept-charset="utf-8" action="create_check.php" method="post" name="form" id="form" class="w3-padding" style="width: 60%; margin: 0 auto;">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='nombrea' class="w3-text-theme-dark w3-medium">Categoria</label>
              <input class='w3-input w3-border w3-round' name='nombre' id='nombre' type='text' placeholder='nombre' pattern=[A-Z\sa-z]{3,20} required>
              <small id="info_nombre"></small>
            </div>

            <div class="w3-col w3-padding">
              <legend for="descripcion" class="w3-text-theme-dark w3-medium">Descripción</legend>
              <textarea class="w3-block w3-border w3-round" name="descripcion" id="descripcion" rows="5" placeholder="(Opcional)"></textarea>
              <small id="info_descripcion"></small>
            </div>

            <?php
            include '../templates/nav_btn_add.php';
            ?>
          </div>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>