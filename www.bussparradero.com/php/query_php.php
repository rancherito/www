<?php

  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

  function usuarioNombre($call){
    $proc = gCall($call);
		$sql = "call  sp_usuario_Recuperar_Nombre".parametros($proc);
		$DATA = DATAPHP(connectDB(),$sql);
		return json_decode($DATA,true);
	}

 ?>
