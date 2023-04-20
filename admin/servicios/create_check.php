      <?php
      
      require '../../config/conexion.php';
      
      if (isset($_REQUEST['addnew'])) {
        
        $servicio = $_REQUEST['servicio'];
        $descripcion_servicio = $_REQUEST['descripcion'];
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        
        if ($conn->connect_error) {
          
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO servicios (servicio, descripcion_servicio)  VALUES ('$servicio', '$descripcion_servicio')";
        
        if ($conn->query($sql) === TRUE) {
          echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
          echo "<script>location.replace('index.php');</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
      ?>