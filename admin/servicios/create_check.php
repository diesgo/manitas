      <?php
      require '../../config/config.php';
      if (isset($_POST['addnew'])) {
        $nombre_categoria = $_POST['nombre'];
        $descripcion_categoria = $_POST['descripcion'];
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria)  VALUES ('$nombre_categoria', '$descripcion_categoria')";
        if ($conn->query($sql) === TRUE) {
          echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
          echo "<script>location.replace('index.php');</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
      ?>