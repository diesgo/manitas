      <?php
      $titulo = "Perfil de usuario";
      include '../templates/header.php';
      $user = getUsersById($_GET['id_user']);
      ?>

      <!-- Header -->

      <div class="w3-container w3-padding-16">
        <div class="w3-content">
          <h2 id="title" class="w3-center w3-text-theme"><b><?php echo $titulo ?> # <?php echo $user['id_user'] . " " . $user['username'] ?></b></h2>
        </div>
      </div>

      <div class="w3-container w3-responsive">
        <form accept-charset="utf-8" action="profile_user_check.php?id_user=<?php echo $user['id_user'] ?>" method="POST" name="user_profile" id="user_profile">

          <div class="w3-row">

            <!-- FOTO USUARIO -->

            <div class="w3-col m3 l2 s4">
              <div>
                <img class="w3-image" src="../../img/admin/<?php echo $user['username'] ?>.png" alt="<?php echo $user['username'] ?>">
              </div>
              <div class="w3-container w3-center">
                <h3 class="w3-text-theme">contraseña</h3>
                <a class="w3-button w3-theme w3-round w3-hover-theme-light w3-right" href="update.php?id_user=<?php echo $user['id_user'] ?>">Cambiar</a>
                <a class="w3-button w3-theme w3-round w3-hover-theme-light w3-left" href="passwordLost.php?id_user=<?php echo $user['id_user'] ?>">Nueva</a>
              </div>
            </div>

            <!-- FICHA DE USUARIO -->

            <div class="w3-col m8 l9 s8">

              <!-- USERNAME / EMAIL / NOMBRE / APELLIDOS-->

              <div class="w3-row w3-padding">
                <div class="w3-col l6 m12">
                  <div class="w3-col m6 l6 s12">
                    <div class="w3-padding">
                      <label for="username" class="w3-text-theme">Username</label>
                      <input class="w3-input" type="text" name="username" id="username" value="<?php echo $user['username'] ?>">
                    </div>
                  </div>
                  <div class="w3-col m6 l6 s12">
                    <div class="w3-padding">
                      <label for="email" class="w3-text-theme">email</label>
                      <input class="w3-input" type="text" name="email" id="email" value="<?php echo $user['email'] ?>" style="z-index: -1000000;">
                    </div>
                  </div>
                </div>
                <div class="w3-col l6 m12">
                  <div class="w3-col m6 l6 s12">
                    <div class="w3-padding">
                      <label for="nombre" class="w3-text-theme">Nombre</label>
                      <input class="w3-input" type="text" name="nombre" id="nombre" value="<?php echo $user['nombre'] ?>">
                    </div>
                  </div>
                  <div class="w3-col m6 l6 s12">
                    <div class="w3-padding">
                      <label for="apellidos" class="w3-text-theme">Apellidos</label>
                      <input class="w3-input" type="text" name="apellidos" id="apellidos" value="<?php echo $user['apellidos'] ?>">
                    </div>
                  </div>
                </div>
              </div>

              <!-- USER GROUP / LANGUAGE -->

              <div class="w3-row w3-padding">
                <div class="w3-col l6 m6">
                  <div class="w3-padding">
                    <label for="grupo" class="w3-text-theme">Grupo de usuarios</label>
                    <select name="grupo" id="grupo" class="w3-select w3-white">
                      <option value=<?php echo $user['grupo_id'] ?>><?php echo $user['grupo'] ?></option>
                      <?php
                      $grupos = getGrupoUsuarios();
                      foreach ($grupos as $grupo) :
                      ?>
                        <option value=<?php echo $grupo['id_grupo']; ?>><?php echo $grupo['grupo'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="w3-col l6 m6">
                  <div class="w3-padding">
                    <label for="language" class="w3-text-theme">Idioma de la interfaz</label>
                    <select name="language" id="language" class="w3-select w3-white">
                      <option value=""></option>
                      <?php
                            $grupos = getGrupoUsuarios();
                            foreach ($grupos as $grupo) :
                            ?>
                        <option value=<?php echo $grupo['id']; ?>><?php echo $grupo['grupo'] ?></option>
                      <?php endforeach; ?>
                    </select>

                  </div>
                </div> -->
              </div>

              <!-- COLOR DE LA INTERFAZ -->

              <div class="w3-row w3-padding">
                <div class="w3-col m6">
                  <div class="w3-padding">
                    <label for="custon_color" class="w3-text-theme">Esquema de color</label>
                    <select name="custom_color" id="custom_color" class="w3-select w3-white">
                      <option value=<?php echo $user['tema_id'] ?>><?php echo $user['color'] ?></option>
                      <?php
                      $temas = getTemas();
                      foreach ($temas as $tema) :
                      ?>
                        <option value=<?php echo $tema['id_tema']; ?>><?php echo $tema['color'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="w3-col m6">
                  <div class="w3-cell-row">
                    <div class="w3-cell w3-theme-d5" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d4" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d3" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d1" style="height:32px"></div>
                    <div class="w3-cell w3-theme" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l1" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l3" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l4" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l5" style="height:32px"></div>
                  </div>
                  <div class="w3-cell-row">
                    <div class="w3-cell w3-theme-d5 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d4 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d3 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d2 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-d1 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l1 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l2 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l3 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l4 c2" style="height:32px"></div>
                    <div class="w3-cell w3-theme-l5 c2" style="height:32px"></div>
                  </div>
                </div>
              </div>
              <div class="w3-row w3-padding">
                <div class="w3-col m6">
                  <div class="w3-padding">
                    <label for="fuente" class="w3-text-theme">Tipografía texto</label>
                    <select name="fuente" id="fuente" class="w3-select w3-white" onchange="cambioFuente('sampleParrafo')">
                      <option value=<?php echo $user['fuente_id'] ?>><?php echo $user['fuente'] ?></option>
                      <?php
                      $fuentes = getFuente();
                      foreach ($fuentes as $fuente) :
                      ?>
                        <option value=<?php echo $fuente['id_fuente']; ?>><?php echo $fuente['fuente'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="w3-col m6">
                  <div class="w3-padding">
                    <label for="titulos" class="w3-text-theme">Tipografía títulos</label>
                    <select name="titulos" id="titulos" class="w3-select w3-white" onchange="cambioFuente('sampleTitulos');">
                      <option value=<?php echo $user['titulo_id'] ?>><?php echo $user['titulo'] ?></option>
                      <?php
                      $titulos = getTitulos();
                      foreach ($titulos as $titulo) :
                      ?>
                        <option value=<?php echo $titulo['id_titulo']; ?>><?php echo $titulo['titulo'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="w3-row w3-padding">
                <div class="w3-col">
                  <div class="w3-padding">
                    <h4 id="sampleTitulos">Texto de muestra</h4>
                    <p id="sampleParrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore incidunt odit, facilis quis impedit dolorum cum labore asperiores minus a. A commodi rem fugit nostrum recusandae odit illo dignissimos quasi?
                      Itaque, ipsa error! Iusto nobis velit laborum dolor delectus sequi, voluptate aut laudantium adipisci magni error, autem qui. Voluptatem at labore fugit laborum vel quod maxime, dolor expedita reprehenderit tempore?
                      Sapiente optio perferendis beatae quidem dolores, quos placeat amet. Repellendus iusto aperiam praesentium veritatis ipsa aliquid qui non quasi eveniet, mollitia ratione, at veniam aspernatur illum error pariatur laborum possimus.</p>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="w3-row w3-padding-24 w3-center">
            <div class="w3-col l6 m6 s6 w3-right-align w3-padding-large">
              <a href="index.php" class="w3-button w3-theme w3-round w3-hover-theme-light" style="width: 100px;">Volver</a>
            </div>
            <div class="w3-col l6 m6 s6 w3-left-align w3-padding-large">
              <input type="submit" value="Update" name="update" class="w3-button w3-theme w3-round w3-hover-theme-light">
            </div>


          </div>
        </form>
      </div>
      <script>
        function cambioFuente(id) {
          let f = document.getElementById("fuente").value;
          document.getElementById(id).style.fontFamily = f;
        }
        cambioFuente('sampleParrafo');
        cambioFuente('sampleTitulos');
      </script>

      <?php
      include('../templates/footer.php');
      ?>