<?php
$proc = Procedure($_POST['procedure']);

if ($proc[0]==='userListar') {
  sp_user_listar($proc);
}
else if ($proc[0]==='registrarUsuario') {
  registra_usuario($proc);
}
else if($proc[0]==='validarLogin'){
  sp_validar_login($proc);
}
else {
  echo '{"PROCESO":"FALLIDO"}';
}
 ?>
