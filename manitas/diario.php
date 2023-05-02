<?php
session_start();
require('../config/conexion.php');
require_once('../config/functions.php');

if (isset($_REQUEST['update'])) {
    $estado = $_REQUEST['estado'];
    $actuacion = $_REQUEST['actuacion'];
    $sql="INSERT INTO tiquet_" . $_REQUEST['tiquet_id'] . " (estado_id, user_id, comentario) VALUES ('$estado', '$_SESSION[id_user]', '$actuacion')";
    mysqli_query($conex, $sql) or die ("Error en el Insert. " . mysqli_error($conex));
    $sql = "UPDATE tiquets SET
    estado_id = '$estado',
    actuacion = '$actuacion'
    WHERE id_tiquet = '$_REQUEST[tiquet_id]'";
    mysqli_query($conex, $sql) or die("Error al ejecutar la consulta");
    echo "<h3 class='w3-text-green'><i class='w3-xlarge fas fa-check'></i> Los cambios se han guardado satisfactoriamente</h3>";
    // echo "<script>function returnIndex(){location.replace('index.php')}; setInterval(returnIndex,1000);</script>";
} else {
    if (!isset($_REQUEST['id_tiquet'])) {
        $sql = "SELECT min(id_tiquet) FROM tiquets";
        $result = mysqli_query($conex, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['min(id_tiquet)'];
    } else {
        $id = $_REQUEST["id_tiquet"];
    }
    $sql = "SELECT * FROM tiquets WHERE id_tiquet = '$id'";
    $result = mysqli_query($conex, $sql);
    $row = mysqli_fetch_assoc($result);
    $nombre = $row['id_tiquet'];
}

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

    <div class="w3-container w3-padding-16 w3-responsive" style="min-height: 594px;">
        <div class="w3-row w3-padding-16">
            <?php
            $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
            $sql = "SELECT * FROM tiquets INNER JOIN clientes ON id_cliente = cliente_id INNER JOIN estados ON id_estado = estado_id WHERE id_tiquet = " . $_REQUEST['tiquet_id'];
            $result = mysqli_query($conex, $sql);
            $row = mysqli_fetch_assoc($result);
            $tiquet = $_REQUEST['tiquet_id'];
            ?>

            <h4>Cliente: <?php echo $row['nombre_cliente'] . " " . $row['apellidos_cliente'] ?></h4>
            <h4>Actuación:</h4>
            <h4><?php echo $row['actuacion'] ?></h4>
            <div class="w3-content">
                <form action="#" method="GET">
                <input type="hidden" name="tiquet_id" value="<?php echo $_REQUEST['tiquet_id']?>">
                    <section class="w3-section">
                        <label for="estado" class="w3-text-theme w3-medium">Estado</label>
                        <select name="estado" class="w3-select w3-white w3-border w3-border-theme-l4 w3-round" required>
                            <option value=<?php echo $row['estado_id']; ?>><?php echo $row['estado'] ?></option>
                            <?php
                            $estados = getEstados();
                            foreach ($estados as $estado) :
                            ?>
                                <option value=<?php echo $estado['id_estado']; ?>><?php echo $estado['estado'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </section>
                    <section class="w3-section">
                        <label>Comentario</label>
                        <textarea class="w3-block w3-border w3-border-theme w3-round" rows="5" name="actuacion" required></textarea>
                    </section>
                    <div class="w3-row w3-padding-24">
                        <div class="w3-col l6 m6 s6 w3-right-align">
                            <a href="index.php" class="w3-button w3-margin w3-border w3-border-theme w3-round w3-theme w3-padding w3-small" style="width: 100px;">Volver</a>
                        </div>
                        <div class="w3-col l6 m6 s6 w3-left-align">
                            <input type='submit' value='Actualizar' name='update' class='w3-button w3-margin w3-border w3-border-theme w3-round w3-theme w3-padding w3-small' style='width: 100px;'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table id="grid" class="w3-content w3-table w3-striped w3-bordered w3-responsive" style="color: #555">
            <thead class="w3-theme">
                <tr>
                    <th style="width:20%">Fecha</th>
                    <th style="width:10%">Estado</th>
                    <th style="width:60%">Comentario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tiquet = "tiquet_" . $_REQUEST['tiquet_id'];
                $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
                $sql = "SELECT * FROM " . $tiquet . " INNER JOIN estados ON id_estado = estado_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <tr>
                            <td><?php echo $row["fecha"] ?></td>
                            <td><?php echo $row["estado"] ?></td>
                            <td><?php echo $row["comentario"] ?></td>
                            <!-- <td class="w3-center"><a class='w3-text-orange w3-padding w3-round' href='update.php?id=<?php echo $_REQUEST['id'] ?>'><i class="fas fa-edit"></i></a></td> -->
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

</body>

</html>