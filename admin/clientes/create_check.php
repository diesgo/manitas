<?php
include '../../config/config.php';
if (isset($_REQUEST['addnew'])) {
  $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
  $sql = "SELECT * FROM clientes WHERE telefono = '$_REQUEST[telefono]'";
  $registro = mysqli_query($conn, $sql) or die("problemas en el select" . mysqli_error($conne)); // Ejecutar la query
  if (mysqli_num_rows($registro) == 0) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $telefono = intval($_POST['telefono']);
    $calle = $_POST['calle'];
    $numero = intval($_POST['numero']);
    $escalera = $_POST['escalera'];
    $piso = $_POST['piso'];
    $puerta = $_POST['puerta'];
    $cp = intval($_POST['cp']);
    $poblacion = $_POST['poblacion'];
    $sql = "INSERT INTO clientes (nombre_cliente, apellidos_cliente, dni, email, telefono, calle, numero, escalera, piso, puerta, cp, poblacion) VALUES ('$nombre', '$apellidos', '$dni', '$email', '$telefono', '$calle', '$numero', '$escalera', '$piso', '$puerta', '$cp', '$poblacion')";
    mysqli_query($conn, $sql) or die('<p>Problemas en el insert' . mysqli_error($conn) . '</p>');
    mysqli_close($conn);
    echo "<h3 class='w3-text-green w3-animate-zoom'><i class='w3-xlarge fas fa-check'></i> Se ha creado un nuevo registro</h3>";
    echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
  } else {
    echo "<p>Existe un cliente vinculado a este número de teléfono</p>";
    echo "<a class='w3-button' href='index.php'>Volver</a>";
  }
}
?>