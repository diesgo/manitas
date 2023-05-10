      <?php
      include '../../config/functions.php';
      $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

      if (isset($_REQUEST['tiquetCliente'])) {
        $id_cliente = $_REQUEST['cliente_id'];
        $servicio_id = $_REQUEST['servicio_id'];
        $actuacion = $_REQUEST['actuacion'];
        $sql = "INSERT INTO tiquets (cliente_id, servicio_id, actuacion) VALUES ('$id_cliente', '$servicio_id', '$actuacion')";
        mysqli_query($conn, $sql) or die('<p>Problemas en el insert 1' . mysqli_error($conn) . '</p>');

        $servicio = getServiciosById($servicio_id);
        $tiquets = getTiquets();
        $num_tiquet = mysqli_num_rows($tiquets);

        $xml = new DomDocument('1.0', 'UTF-8');

            $raiz = $xml->createElement('tiquet');
            $raiz = $xml->appendChild($raiz);

            $nodo = $xml->createElement('registro');
            $nodo = $raiz->appendChild($nodo);

            $subnodo = $xml->createElement('fecha', date('d-m-Y'));
            $subnodo = $nodo->appendChild($subnodo);

            $subnodo = $xml->createElement('comentario', 'Apertura de tiquet');
            $subnodo = $nodo->appendChild($subnodo);

            $subnodo = $xml->createElement('servicio', $servicio['servicio']);
            $subnodo = $nodo->appendChild($subnodo);

            $subnodo = $xml->createElement('estado', 'Registrado');
            $subnodo = $nodo->appendChild($subnodo);

            $xml->formatOutput = true;
            $xml->saveXML();
            $xml->save('../xml/tiquet_'.$num_tiquet.'.xml');

        echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
        //? echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
      }

      if (isset($_REQUEST['tiquetNuevoCliente'])) {
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM clientes WHERE telefono = '$_REQUEST[telefono]'";
        $registro = mysqli_query($conn, $sql) or die("problemas en el select" . mysqli_error($conne)); // Ejecutar la query
        if (mysqli_num_rows($registro) == 0) {
          $nombre = $_REQUEST['nombre'];
          $apellidos = $_REQUEST['apellidos'];
          $dni = $_REQUEST['dni'];
          $email = $_REQUEST['email'];
          $telefono = intval($_REQUEST['telefono']);
          $calle = $_REQUEST['calle'];
          $numero = intval($_REQUEST['numero']);
          $escalera = $_REQUEST['escalera'];
          $piso = $_REQUEST['piso'];
          $puerta = $_REQUEST['puerta'];
          $cp = intval($_REQUEST['cp']);
          $poblacion = $_REQUEST['poblacion'];
          $sql = "INSERT INTO clientes (nombre_cliente, apellidos_cliente, dni, email, telefono, calle, numero, escalera, piso, puerta, cp, poblacion) VALUES ('$nombre', '$apellidos', '$dni', '$email', '$telefono', '$calle', '$numero', '$escalera', '$piso', '$puerta', '$cp', '$poblacion')";
          if (mysqli_query($conn, $sql) == true) {
            $id_cliente = mysqli_num_rows(getClientes());
            $actuacion = $_REQUEST['actuacion'];
            $sql = "INSERT INTO tiquets (cliente_id, actuacion) VALUES ('$id_cliente', '$actuacion')";
            mysqli_query($conn, $sql) or die('<p>Problemas en el insert 1' . mysqli_error($conn) . '</p>');
            $tiquets = getTiquets();
            $num_tiquet = mysqli_num_rows($tiquets);

            $xml = new DomDocument('1.0', 'UTF-8');

            $raiz = $xml->createElement('tiquet');
            $raiz = $xml->appendChild($raiz);

            $nodo = $xml->createElement('registro');
            $nodo = $raiz->appendChild($nodo);

            $subnodo = $xml->createElement('fecha', date('d-m-Y'));
            $subnodo = $nodo->appendChild($subnodo);

            $subnodo = $xml->createElement('comentario', 'apertura de tiquet');
            $subnodo = $nodo->appendChild($subnodo);

            $subnodo = $xml->createElement('servicio', $servicio['servicio']);
            $subnodo = $nodo->appendChild($subnodo);

            $subnodo = $xml->createElement('estado', 'Registrado');
            $subnodo = $nodo->appendChild($subnodo);

            $xml->formatOutput = true;
            $xml->saveXML();
            $xml->save('../xml/tiquet_'.$num_tiquet.'.xml');

            echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
            //? echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
          } else {
            echo '<p>Problemas al crear el nuevo cliente' . mysqli_error($conn) . '</p>';
          }
        } else {
          echo "<p>Existe una cuenta vinculad al número de teléfono introducido</p>";
          echo "<a class='w3-button' href='index.php'>Volver</a>";
        }
      }
      ?>