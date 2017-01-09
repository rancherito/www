<?php

function sp_user_listar($proc)
{
  $consultaSQL = "call sp_user_listar".parametros($proc);
  echo '{"PROCESO":"EXITOSO","DATA":'.json_encode(arraySql(connectDB(),$consultaSQL)).'}';
}

function registra_usuario($proc)
{
  $consultaSQL = "call registra_usuario".parametros($proc);
  echo '{"PROCESO":"EXITOSO","DATA":'.json_encode(arraySql(connectDB(),$consultaSQL)).'}';
}

function sp_validar_login($proc)
{
  $consultaSQL = "call sp_validar_login".parametros($proc);
  echo '{"PROCESO":"EXITOSO","DATA":'.json_encode(arraySql(connectDB(),$consultaSQL)).'}';
}
 ?>
