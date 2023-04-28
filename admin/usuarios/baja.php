      <?php
      $titulo = 'Borrar usuario';
      include '../templates/header.php';
      $user = getUsersById($_GET['id_user']);

      if (isset($_POST['erase'])) {
        $id_user = $user['id_user'];
        $sql = "DELETE FROM users WHERE id_user='$id_user'";
        mysqli_query(openConex(), $sql);
        echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
      }
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-32">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme" style="text-shadow:2px 2px 5px #c5c5c5"><b><?php echo $titulo ?></b></h2>
        </div>
      </div>

      <!-- PAGE CONTENT -->

      <div class="w3-container w3-mobile" style="width: 40%; margin: 0 auto;">
        <form accept-charset="utf-8" action="#" method="post" name="form" id="form" class="w3-theme-l4 w3-round w3-padding">
          <div class="w3-row">

            <div class="w3-col w3-padding">
              <label for='nombre_user' class="w3-text-theme w3-medium">Usuario</label>
              <input class="w3-input w3-border w3-round" type="text" name="nombre_user" placeholder="<?php echo $user['username']; ?>" value="<?php echo $user['username']; ?>">
            </div>

            <?php
            include '../templates/nav_btn_erase.php';
            ?>
          </div>
        </form>
      </div>

      <?php
      include '../templates/footer.php';
      ?>