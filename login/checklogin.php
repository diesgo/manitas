<!-- 
Creado por Luisetfree & tecnosetfree
Web: http://luisetfree.over-blog.es
Facebook:https://www.facebook.com/tecnosetfree/
Twitter: @tecnosetfree
Apoyanos con tus visitas y comentarios en nuestras redes sociales para seguir avanzando y traer contenido de calidad.

 -->
<?php
session_start();
?>

<?php

include '../config/config.php';

$conexion=new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

 
$sql = "SELECT * FROM users WHERE username = '$username'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {
  $row = $result->fetch_array(MYSQLI_ASSOC);
  if (password_verify($password, $row['password'])) { 
  // if ($password==$row['password']) {

 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $row['username'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['email'] = $row['email'];

    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=../select.php>Panel de Control</a>"; 
    header('Location: ../select.php');//redirecciona a la pagina del usuario

 } else {
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
 }
}
 mysqli_close($conexion); 
 ?>