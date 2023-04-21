      <?php
      $titulo = "Manitas | Administración";
      include '../templates/header.php';
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-16">
        <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?></b></h2>
        <div class="w3-quarter">
          <a class="w3-button w3-green w3-round w3-hover-green w3-margin-top " href="../tiquets/create.php"><i class="fas fa-plus-circle"></i> Nuevo tiquet</a>
        </div>
        <div class="w3-quarter">
          <a class="w3-button w3-green w3-round w3-hover-green w3-margin-top" href="../clientes/create.php"><i class="fas fa-plus-circle"></i> Nuevo Cliente</a>
        </div>
      </div>

      <div class="w3-row-padding w3-margin-bottom">

      <!-- Tiquets sin asignar -->

        <div class="w3-quarter">
          <a href="../tiquets/index.php" style="text-decoration:none">
            <div class="w3-container w3-red w3-padding-16">
              <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM tiquets WHERE estado_id = 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo "<h3>" . mysqli_num_rows($result) . "</h3>";
                } else {
                  echo "0 results";
                }
                mysqli_close($conn);
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Tiquets sin asignar</h4>
            </div>
          </a>
        </div>

      <!-- Tiquets asignados -->

        <div class="w3-quarter">
          <a href="../productos/index.php" style="text-decoration:none">
            <div class="w3-container w3-theme w3-padding-16">
              <div class="w3-left"><i class="fas fa-boxes w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM tiquets WHERE estado_id = 2";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo "<h3>" . mysqli_num_rows($result) . "</h3>";
                } else {
                  echo "0 results";
                }
                mysqli_close($conn);
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Tiquets asignados</h4>
            </div>
          </a>
        </div>

      <!-- Tiquets en espera -->

        <div class="w3-quarter">
          <a href="../productos/index.php" style="text-decoration:none">
            <div class="w3-container w3-purple w3-padding-16">
              <div class="w3-left"><i class="fas fa-boxes w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM tiquets WHERE estado_id = 4";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo "<h3>" . mysqli_num_rows($result) . "</h3>";
                } else {
                  echo "0 results";
                }
                mysqli_close($conn);
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Tiquets en espera</h4>
            </div>
          </a>
        </div>

      <!-- Tiquets pendientes de aprobación -->

        <div class="w3-quarter">
          <a href="../productos/index.php" style="text-decoration:none">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
              <div class="w3-left"><i class="fas fa-boxes w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM tiquets WHERE estado_id = 5";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo "<h3>" . mysqli_num_rows($result) . "</h3>";
                } else {
                  echo "0 results";
                }
                mysqli_close($conn);
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Tiquets pendientes de aprobación</h4>
            </div>
          </a>
        </div>

      </div>

      <!-- FILA DE ESTADÍSTICAS HOME -->

      <div class="w3-row-padding w3-margin-bottom">

      <!-- Tiquets en proceso -->

        <div class="w3-quarter">
          <a href="../productos/index.php" style="text-decoration:none">
            <div class="w3-container w3-green w3-padding-16">
              <div class="w3-left"><i class="fas fa-boxes w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM tiquets WHERE estado_id = 3";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  echo "<h3>" . mysqli_num_rows($result) . "</h3>";
                } else {
                  echo "0 results";
                }
                mysqli_close($conn);
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Tiquets en proceso</h4>
            </div>
          </a>
        </div>

      <!-- Cartera de clientes -->

        <div class="w3-quarter">
          <a href="../clientes/index.php" style="text-decoration:none">
            <div class="w3-container w3-teal w3-padding-16">
              <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $clientes = getNumClientes();
                if (mysqli_num_rows($clientes) > 0) {
                  echo "<h3>" . mysqli_num_rows($clientes) . "</h3>";
                } else {
                  echo "0 results";
                }
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Clientes</h4>
            </div>
          </a>
        </div>

      <!-- Servicios -->

        <div class="w3-quarter">
          <a href="../categorias/index.php" style="text-decoration:none">
            <div class="w3-container w3-indigo w3-text-white w3-padding-16">
              <div class="w3-left"><i class="fas fa-layer-group w3-xxxlarge"></i></div>
              <div class="w3-right">
                <?php
                $servicios = getServicios();
                if (mysqli_num_rows($servicios) > 0) {
                  // output data of each row
                  echo "<h3>" . mysqli_num_rows($servicios) . "</h3>";
                } else {
                  echo "0 results";
                }
                ?>
              </div>
              <div class="w3-clear"></div>
              <h4>Servicios</h4>
            </div>
          </a>
        </div>

      </div>

      <div class="w3-container w3-dark-grey w3-padding-32">
        <div class="w3-row">
          <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-green">Demographic</h5>
            <p>Language</p>
            <p>Country</p>
            <p>City</p>
          </div>
          <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-red">System</h5>
            <p>Browser: <span id="browser"></span></p>
            <p>OS: <span id="os"></span></p>
            <p>More</p>
          </div>
          <div class="w3-container w3-third">
            <h5 class="w3-bottombar w3-border-orange">Target</h5>
            <p>Users</p>
            <p>Active</p>
            <p>Geo</p>
            <p>Interests</p>
          </div>
        </div>
      </div>
      <script>
        document.getElementById('browser').innerHTML = navigator.appCodeName;
        document.getElementById('browser').innerHTML += " " + navigator.appVersion;
        document.getElementById("os").innerHTML = navigator.platform;
        document.getElementById("os").innerHTML += " " + navigator.language;
      </script>

      <?php
      include '../templates/footer.php';
      ?>