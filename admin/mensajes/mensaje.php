      <?php
      $titulo = "Redactar mensaje";
      include '../templates/header.php';
      ?>

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="w3-content w3-padding" style="width: 350px;">
        <form accept-charset="utf-8" action="create_check.php" method="post" name="form" id="form" class="w3-theme-l4 w3-round w3-padding w3-card">
          <div class="w3-row">

            <div class="w3-col w3-center">
              <label for='nombre' class="w3-text-theme w3-medium w3-left w3-padding">Nombre</label>
              <input class="w3-input w3-round w3-auto" name="nombre" id="nombre" type="text" placeholder="Nombre / Name" onkeyup="checkName('nombre');" pattern=[A-Z\sa-z]{3,40} style="width:90%" required>
            </div>

            <div class="w3-col w3-center">
              <label for="servicio" class="w3-text-theme w3-medium w3-left w3-padding">Tipo de servicio</label>
              <select name="servicio" class="w3-select w3-white w3-round" style="width:90%" required>
                <option value="">Selecciona...</option>
                <?php
                $servicios = getServicios();
                foreach ($servicios as $servicio) :
                ?>
                  <option value=<?php echo $servicio['id_servicio']; ?>><?php echo $servicio['nombre_servicio'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="w3-col w3-center">
              <label for="categoria" class="w3-text-theme w3-medium w3-left w3-padding">Categoría</label>
              <select name="categoria" class="w3-select w3-white w3-round" style="width:90%" required>
                <option value="">Selecciona...</option>
                <?php
                $categorias = getCategorias();
                foreach ($categorias as $categoria) :
                ?>
                  <option value=<?php echo $categoria['id_categoria']; ?>><?php echo $categoria['nombre_categoria'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="w3-col w3-center">
              <label for="variedad" class="w3-text-theme w3-medium w3-left w3-padding">Variedad</label>
              <select name="variedad" class="w3-select w3-white w3-round" style="width:90%">
                <?php
                $variedades = getVariedades();
                foreach ($variedades as $variedad) :
                ?>
                  <option value=<?php echo $variedad['id_variedad']; ?>><?php echo $variedad['nombre_variedad'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <?php
          include '../templates/nav_btn_add.php';
          ?>
        </form>
      </div>
      <?php
      include '../templates/footer.php';
      ?>