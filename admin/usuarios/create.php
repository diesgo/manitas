      <?php
      $titulo = "Nuevo Usuario";
      include('../templates/header.php');
      // include('../../config/conexion.php');
      define('USER', 'root');
      define('PASSWORD', '');
      define('HOST', 'localhost');
      define('DATABASE', 'greenpower');
      $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);

      if (isset($_POST['addnew'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $grupo = $_POST['grupo'];

        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
          echo '<p class="error">The email address is already registered!</p>';
        }

        if ($query->rowCount() == 0) {
          $query = $connection->prepare("INSERT INTO users (username,password,email) VALUES (:username,:password_hash,:email)");
          $query->bindParam("username", $username, PDO::PARAM_STR);
          $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $result = $query->execute();

          if ($result) {
            echo "<script>location.replace('index.php');</script>";
          } else {
            echo '<p class="error">Something went wrong!</p>';
          }
        }
      }
      ?>
      <style>
        p.success,
        p.error {
          color: white;
          font-family: lato;
          background: yellowgreen;
          display: inline-block;
          padding: 2px 10px;
        }

        p.error {
          background: orangered;
        }
      </style>

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <div class="frame">
        <form accept-charset="utf-8" method="POST" action="#" name="signup-form" class="w3-theme-l4 w3-round w3-padding">
          <div class="w3-row">
            <div class="w3-col w3-padding">
              <label>Username</label>
              <input class="w3-input w3-border w3-round" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="w3-col w3-padding">
              <label>Email</label>
              <input class="w3-input w3-border w3-round" type="email" name="email" required />
            </div>
            <div class="w3-col w3-padding">
              <label>Password</label>
              <input class="w3-input w3-border w3-round" type="password" name="password" required />
            </div>
            <div class="w3-col w3-padding">
              <label for="grupo" class="w3-text-theme">Grupo de usuarios</label>
              <select name="grupo" id="grupo" class="w3-select w3-white" required>
                <option value="">Seleccionar...</option>
                <?php
                $grupos = getGrupoUsuarios();
                foreach ($grupos as $grupo) :
                ?>
                  <option value=<?php echo $grupo['id']; ?>><?php echo $grupo['grupo'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php
            include('../templates/nav_btn_add.php');
            ?>
        </form>
      </div>
      <?php
      include('../templates/footer.php');
      ?>