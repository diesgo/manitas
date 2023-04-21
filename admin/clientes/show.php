<?php
$titulo = "Ficha de Cliente";
include '../templates/header.php';
$cliente = getClientesById($_GET['id_cliente']);
$tiquets = getTiquetsByCliente($_GET['id_cliente']);
?>

<!-- Header -->

<div class="w3-container w3-padding-32">
  <div class="w3-content">
    <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?></b></h2>
  </div>
</div>

<div class="w3-container w3-padding-32 w3-responsive" style="min-height: 636px;">
  <div class="w3-content w3-padding">

    <div class="w3-row-padding">
      <p class="w3-text-theme w3-xlarge">ID
        <span class="w3-text-grey"><?php echo $cliente['id_cliente']; ?></span>
        Cliente: 
        <span class="w3-text-grey" id="cliente_nombre"><?php echo $cliente['nombre_cliente'] . " " . $cliente['apellidos_cliente'] ?></span>
        Tiquets abiertos:
        <span class="w3-text-grey"><?php echo mysqli_num_rows($tiquets)?></span>
      </p>
    </div>

    <table id="grid" class="w3-table w3-striped w3-bordered" style="color: #555">
      <thead>
        <tr class="w3-theme">
          <th class="w3-center">Nº tiquet</th>
          <th onclick="sortTable(0)" class="w3-center">Fecha apertura</th>
          <th class="w3-center">Descripción</th>
          <th class="w3-center">Estado</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($tiquets as $tiquet) :
        ?>
          <tr>
            <td class="w3-center"><?php echo $tiquet['id_tiquet'] ?></td>
            <td class='w3-center'><?php echo $tiquet["date_add"] ?></td>
            <td class='w3-center'><?php echo $tiquet["actuacion"] ?></td>
            <td class='w3-center'><?php echo $tiquet["estado"] ?></td>
            <td class='w3-center'>
                  <a class="w3-text-green w3-hover-text-orange" href="../tiquets/show.php?id=<?php echo $tiquet['id_tiquet'] ?>">
                    <i class='fas fa-pen w3-medium'></i>
                  </a>
                </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php
include '../templates/footer.php';
?>