<?php
$titulo = "MOSTRAR ROL";
include '../templates/header.php';
$rol = getRolesById($_GET['id']); ?>

            <!-- Header -->

            <div class="w3-container w3-padding-32">
                <div class="w3-content">
                    <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?></b></h2>
                </div>
            </div>

<div class="w3-container w3-padding-32 w3-theme-l4">
    <div class="w3-half">
        <h2 class="w3-text-theme"><b><?php echo $titulo?></b></h2>
    </div>
    <div class="w3-half">

    </div>
    <hr>
</div>

<div id="ficha_rol" class="w3-container w3-padding" style="min-height: 616px;">
    <div class="w3-content w3-padding">
        <div class="w3-half w3-margin-top w3-padding w3-border w3-border-theme w3-round">
            <div class="w3-row-padding">
                <div class="w3-col l4 w3-padding-large">

                </div>
                <div class="w3-col l8">
                    <p class="w3-text-theme w3-xlarge">Rol # <span><?php echo $rol['id_rol']; ?></span></p>
                    <p class="w3-text-theme w3-large">Rol: <span class="w3-text-grey"><?php echo $rol['rol']; ?></span></p>
                    <p class="w3-text-theme w3-large">Descripción: <span class="w3-text-grey"><?php echo $rol['descripcion']; ?></span></p>
                </div>
            </div>
        </div>
        <div class="w3-half w3-margin-top w3-padding w3-border w3-border-theme w3-round">
            <div class="w3-row-padding w3-margin-top w3-margin-bottom">
                <div class="w3-col l4">

                </div>
                <div class="w3-col l4">
                    <a href="update.php?id=<?php echo $rol['id_rol'] ?>" class="w3-button w3-theme w3-round">Editar</a>
                </div>
                <div class="w3-col l4">
                    <button class="boton">Añadir <br> comentario</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../templates/footer.php';
?>