      <div class="w3-content w3-padding-32">
        <div class="w3-row-padding w3-mobile">
          <div class="w3-col l6 m6 s12">
            <h2 id="title" class="w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col l9 m9 s12">
            <div class="w3-padding">
              <input type="text" id="search" onkeyup="searchTableByName()" placeholder="&#x1f50d;&#xfe0e; Search for names.." title="Type in a name" pattern="[a-zA-Z0-9]+" autofocus>
            </div>
          </div>
          <div class="w3-col l3 m3 s12">
            <?php
            if ($user['grupo_id'] == 1) {
              include '../templates/button_create.php';
            }
            ?>
          </div>
        </div>
      </div>
      <script src="../../js/index.js"></script>