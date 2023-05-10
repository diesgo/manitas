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
        <div class="w3-padding w3-right">
            <a href="../admin/usuarios/exit.php" class="w3-right w3-button w3-theme-d3 w3-hover-theme"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div class="w3-padding w3-left">
            <h4>Bienvenido <?php echo $_SESSION['username'] ?></h4>
        </div>
    </div>
    <div class="w3-container">
        

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
                INNER JOIN clientes ON id_cliente = cliente_id 
                INNER JOIN estados on id_estado = estado_id
                INNER JOIN servicios on id_servicio = servicio_id
                WHERE estado_id = 2 AND user_id =" . $_SESSION['id_user'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
            echo "<h4>Estos son tus tíqets asignados</h4>
                <table id='grid' class='w3-table w3-striped w3-bordered'>
                    <thead class='w3-theme'>
                        <tr>
                            <th width='5%' class='w3-center' onclick='sortTable(0)'></i>tiquet</th>
                            <th width='15%' onclick='sortTable(1)' style='cursor:pointer'>Cliente </th>
                            <th width='60%'>Último comentario</th>
                            <th width='5%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
                            <th width='10%' class='w3-center'>Estado</th>
                            <th width='5%' class='w3-center'>Diario</th>
                        </tr>
                    </thead>
                    <tbody>";
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
                            echo "<a class='w3-green w3-button w3-round' href='update.php?id=" . $row['id_tiquet'] . "'>Definir servicio</a>";
                        } else {
                            echo $row['icono'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'>
                        <?php
                        if ($row['estado_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='asignar.php?id=" . $row['id_tiquet'] . "'>Asignar</a>";
                        } else {
                            echo $row['estado'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='diario.php?tiquet_id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-book-reader"></i></a></td>

                </tr>
        <?php
            }
            echo "</tbody></table>";
        } else {
            echo "<h4 class='w3-center'>No tienes tiquets asignados.</h4>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div class="w3-container">
        

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
                INNER JOIN clientes ON id_cliente = cliente_id 
                INNER JOIN estados on id_estado = estado_id
                INNER JOIN servicios on id_servicio = servicio_id
                WHERE estado_id = 3 AND user_id =" . $_SESSION['id_user'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
            echo "<h4>Estos son tus tíqets en proceso</h4>
                <table id='grid' class='w3-table w3-striped w3-bordered'>
                    <thead class='w3-theme'>
                        <tr>
                            <th width='5%' class='w3-center' onclick='sortTable(0)'></i>tiquet</th>
                            <th width='15%' onclick='sortTable(1)' style='cursor:pointer'>Cliente </th>
                            <th width='60%'>Último comentario</th>
                            <th width='5%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
                            <th width='10%' class='w3-center'>Estado</th>
                            <th width='5%' class='w3-center'>Diario</th>
                        </tr>
                    </thead>
                    <tbody>";
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
                            echo "<a class='w3-green w3-button w3-round' href='update.php?id=" . $row['id_tiquet'] . "'>Definir servicio</a>";
                        } else {
                            echo $row['icono'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'>
                        <?php
                        if ($row['estado_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='asignar.php?id=" . $row['id_tiquet'] . "'>Asignar</a>";
                        } else {
                            echo $row['estado'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='diario.php?tiquet_id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-book-reader"></i></a></td>

                </tr>
        <?php
            }
            echo "</tbody></table>";
        } else {
            echo "<h4 class='w3-center'>No tienes tiquets en proceso.</h4>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div class="w3-container">
        

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
                INNER JOIN clientes ON id_cliente = cliente_id 
                INNER JOIN estados on id_estado = estado_id
                INNER JOIN servicios on id_servicio = servicio_id
                WHERE estado_id = 4 AND user_id =" . $_SESSION['id_user'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
            echo "<h4>Estos son tus tíqets en espera</h4>
                <table id='grid' class='w3-table w3-striped w3-bordered'>
                    <thead class='w3-theme'>
                        <tr>
                            <th width='5%' class='w3-center' onclick='sortTable(0)'></i>tiquet</th>
                            <th width='15%' onclick='sortTable(1)' style='cursor:pointer'>Cliente </th>
                            <th width='60%'>Último comentario</th>
                            <th width='5%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
                            <th width='10%' class='w3-center'>Estado</th>
                            <th width='5%' class='w3-center'>Diario</th>
                        </tr>
                    </thead>
                    <tbody>";
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
                            echo "<a class='w3-green w3-button w3-round' href='update.php?id=" . $row['id_tiquet'] . "'>Definir servicio</a>";
                        } else {
                            echo $row['icono'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'>
                        <?php
                        if ($row['estado_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='asignar.php?id=" . $row['id_tiquet'] . "'>Asignar</a>";
                        } else {
                            echo $row['estado'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='diario.php?tiquet_id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-book-reader"></i></a></td>

                </tr>
        <?php
            }
            echo "</tbody></table>";
        } else {
            echo "<h4 class='w3-center'>No tienes tiquets en espera.</h4>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div class="w3-container">
        

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
                INNER JOIN clientes ON id_cliente = cliente_id 
                INNER JOIN estados on id_estado = estado_id
                INNER JOIN servicios on id_servicio = servicio_id
                WHERE estado_id = 5 AND user_id =" . $_SESSION['id_user'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
            echo "<h4>Estos son tus tíqets en proceso</h4>
                <table id='grid' class='w3-table w3-striped w3-bordered'>
                    <thead class='w3-theme'>
                        <tr>
                            <th width='5%' class='w3-center' onclick='sortTable(0)'></i>tiquet</th>
                            <th width='15%' onclick='sortTable(1)' style='cursor:pointer'>Cliente </th>
                            <th width='60%'>Último comentario</th>
                            <th width='5%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
                            <th width='10%' class='w3-center'>Estado</th>
                            <th width='5%' class='w3-center'>Diario</th>
                        </tr>
                    </thead>
                    <tbody>";
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
                            echo "<a class='w3-green w3-button w3-round' href='update.php?id=" . $row['id_tiquet'] . "'>Definir servicio</a>";
                        } else {
                            echo $row['icono'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'>
                        <?php
                        if ($row['estado_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='asignar.php?id=" . $row['id_tiquet'] . "'>Asignar</a>";
                        } else {
                            echo $row['estado'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='diario.php?tiquet_id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-book-reader"></i></a></td>

                </tr>
        <?php
            }
            echo "</tbody></table>";
        } else {
            echo "<h4 class='w3-center'>No tienes tiquets pendientes.</h4>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div class="w3-container">
        

        <?php
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        $sql = "SELECT * FROM tiquets 
                INNER JOIN clientes ON id_cliente = cliente_id 
                INNER JOIN estados on id_estado = estado_id
                INNER JOIN servicios on id_servicio = servicio_id
                WHERE estado_id = 6 AND user_id =" . $_SESSION['id_user'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
            echo "<h4>Has resuelto satisfactoriamente los siguientes tiquets</h4>
                <table id='grid' class='w3-table w3-striped w3-bordered'>
                    <thead class='w3-theme'>
                        <tr>
                            <th width='5%' class='w3-center' onclick='sortTable(0)'></i>tiquet</th>
                            <th width='15%' onclick='sortTable(1)' style='cursor:pointer'>Cliente </th>
                            <th width='60%'>Último comentario</th>
                            <th width='5%' class='w3-center' onclick='sortTable(2)'>Servicio </th>
                            <th width='10%' class='w3-center'>Estado</th>
                            <th width='5%' class='w3-center'>Diario</th>
                        </tr>
                    </thead>
                    <tbody>";
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
                            echo "<a class='w3-green w3-button w3-round' href='update.php?id=" . $row['id_tiquet'] . "'>Definir servicio</a>";
                        } else {
                            echo $row['icono'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'>
                        <?php
                        if ($row['estado_id'] == 1) {
                            echo "<a class='w3-green w3-button w3-round' href='asignar.php?id=" . $row['id_tiquet'] . "'>Asignar</a>";
                        } else {
                            echo $row['estado'];
                        }
                        ?>
                    </td>
                    <td class='w3-center'><a class='w3-padding w3-text-theme w3-round' href='diario.php?tiquet_id=<?php echo $row['id_tiquet'] ?>'><i class="fas fa-book-reader"></i></a></td>

                </tr>
        <?php
            }
            echo "</tbody></table>";
        } else {
            echo "<h4 class='w3-center'>Aún no has resuelto ningún tiquet.</h4>";
        }
        mysqli_close($conn);
        ?>
    </div> 
    <script src="../js/index.js"></script>
</body>

</html>