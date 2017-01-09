<?php

  function sp_buss_crear($proc)
  {
    $sql = "call sp_buss_crear".parametros($proc);
    $DATA = DATA(connectDB(),$sql);
    echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
  }

 ?>
