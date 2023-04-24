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
    <link rel="stylesheet" href=",,/../../css/w3.css">
    <title>Document</title>
</head>
<body>
    <div class="w3-container">
        <div class="w3-row">
            <h4>Bienvenido <?php echo $_SESSION['username'] ?></h4>
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
                    $sql = "SELECT * FROM tiquets WHERE colaborador_id =" . $_SESSION['id_user'];
                    $result = mysqli_query($conex, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<tr><td>3</td><td>Tiene una fuga</td><td>comentario</td><td>Estado</td></tr>";
                    }

                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>