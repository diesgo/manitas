      <?php
      include '../../config/functions.php';
      $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

      if (isset($_REQUEST['addnew'])) {
        $id_cliente = $_REQUEST['cliente'];
        $actuacion = $_REQUEST['actuacion'];
        $sql = "INSERT INTO tiquets (cliente_id, actuacion) VALUES ('$id_cliente', '$actuacion')";
        mysqli_query($conn, $sql) or die('<p>Problemas en el insert 1' . mysqli_error($conn) . '</p>');
        $tiquets = getTiquets();
        $num_tiquet = mysqli_num_rows($tiquets);
        $sql = "CREATE TABLE tiquet_$num_tiquet  (
          fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          estado_id INT(11) DEFAULT 1,
          colaborador_id int(11) DEFAULT NULL,
          comentario VARCHAR(255) NOT NULL DEFAULT 'Apertura de tiquet'
          )";
        mysqli_query($conn, $sql) or die('<p>Problemas en el create' . mysqli_error($conn) . '</p>');
        $sql = "INSERT INTO tiquet_" . $num_tiquet . " (estado_id) VALUES (1)";
        mysqli_query($conn, $sql) or die('<p>Problemas en el inser 2' . mysqli_error($conn) . '</p>');
        mysqli_close($conn);
        echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
        echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
      }
      ?>