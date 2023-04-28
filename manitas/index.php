<?php
session_start();
require('../config/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/themes/w3-theme-azul-1.css">
    <link rel="stylesheet" href="../fontawesome5/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="w3-container">
        <div class="w3-row">
            <h4>Bienvenido <?php echo $_SESSION['username'] ?></h4>
            <a href="../admin/usuarios/exit.php" class="w3-bar-item w3-button w3-theme-d3 w3-hover-theme"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div class="w3-row">
            <div class="w3-content">
                <table>
                    <thead>
                        <tr>
                            <th>id tiquet</th>
                            <th>Actuación</th>
                            <th>Último comentario</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                        $sql = "SELECT * FROM tiquets WHERE user_id =" . $_SESSION['id_user'];
                        $result = mysqli_query($conex, $sql) or die("Error en la consulta");
                        if (mysqli_num_rows($result) > 0) {

                            echo "<tr><td>3</td><td>Tiene una fuga</td><td>comentario</td><td>Estado</td></tr>";
                        } else {
                            echo "entro";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-container">

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
                INNER JOIN clientes ON id_cliente = cliente_id 
                INNER JOIN estados on id_estado = estado_id
                INNER JOIN servicios on id_servicio = servicio_id
                WHERE user_id =" . $_SESSION['id_user'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table id='grid' class='w3-table w3-striped w3-bordered w3-responsive' style='color: #555;'><thead class='w3-theme'><tr>
      <th width='5%' class='w3-center' onclick='sortTable(0)'></i>tiquet</th>
      <th width='15%' onclick='sortTable(1)'>Cliente </th>
      <th width='65%'>Incidencia</th>
      <th width='5%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
      <th width='5%' class='w3-center'>Estado</th>
      <th width='5%' class='w3-center'>Diario</th></tr></thead><tbody>";
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <tr>
                    <td class='w3-center'><?php echo $row["id_tiquet"] ?></td>
                    <td onmouseover="this.style.cursor='pointer';" onclick="location.replace('update.php?id=<?php echo $row['cliente_id'] ?>')"><?php echo $row["nombre_cliente"] . " " . $row['apellidos_cliente'] ?></td>
                    <td><?php echo $row["actuacion"] ?></td>
                    <td class='w3-center'>
                        <?php
                        if ($row['servicio_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='update.php?id=" . $row['id_tiquet'] . "'>Definir servicio</a></td>";
                        } else {
                            echo $row["icono"];
                        }
                        ?>
                    <td class='w3-center'>
                        <?php
                        if ($row['estado_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='asignar.php?id=" . $row['id_tiquet'] . "'>Asignar</a></td>";
                        } else {
                            echo "Asignado </td>";
                        }
                        ?>
                    <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='diario.php?tiquet_id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-book-reader"></i></a></td>

                </tr>
        <?php
            }
        } else {
            echo "<h4 class='w3-center'>No se han encontrado registros.</h4>";
        }
        mysqli_close($conn);
        ?>
        </tbody>
        </table>
    </div>
</body>

</html>