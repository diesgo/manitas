<div class="w3-padding">
  <label for="grupo" class="w3-text-theme">Grupo de usuarios</label>
  <select name="grupo" id="grupo" class="w3-select w3-white">
    <option value=<?php echo $user['grupo_id'] ?>><?php echo $user['grupo'] ?></option>
    <?php
    $grupos = getGrupoUsuarios();
    foreach ($grupos as $grupo) :
    ?>
      <option value=<?php echo $grupo['id']; ?>><?php echo $grupo['grupo'] ?></option>
    <?php endforeach; ?>
  </select>
</div>