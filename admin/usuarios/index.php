      <?php
      $titulo = 'Usuarios';
      include '../templates/header.php';
      include '../templates/header_index.php';
      ?>

      <!-- !PAGE CONTENT! -->

      <div class="w3-container w3-mobile">
        <table id="grid" class="w3-table w3-striped w3-bordered w3-centered w3-responsive" style="color: #555">
          <thead>
            <tr class="w3-theme">
              <th>ID</th>
              <th>Username</th>
              <th>email</th>
              <th>Grupo de usuarios</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            $sql = "SELECT * FROM users
            INNER JOIN grupo_usuarios ON id_grupo = grupo_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td style="width: 5%;"><?php echo $row['id_user'] ?></td>
                  <td style="width: 10%"><?php echo $row['username'] ?></td>
                  <td style="width: 10%"><?php echo $row['email'] ?></td>
                  <td style="width: 10%"><?php echo $row['grupo'] ?></td>
                  <td style="width: 2%">
                    <input type="hidden" name="validation" id="validation" value="si" />
                    <a class="w3-btn w3-green w3-round" href="profile_user.php?id_user=<?php echo $row['id_user'] ?>">
                      <i class="fas fa-pen w3-small"></i>
                    </a>
                  </td>
                  <td style="width: 2%">
                    <a class="w3-btn w3-red w3-round" href="baja.php?id_user=<?php echo $row['id_user'] ?>">
                      <i class="fas fa-trash w3-small"></i>
                    </a>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "No se han encontrado registros.";
            }
            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
      <?php
      include '../templates/footer.php';
      ?>