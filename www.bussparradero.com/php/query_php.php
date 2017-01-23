<?php

  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

  function usuarioNombre($call){
    $proc = gCall($call);
<<<<<<< .mine
		$sql = "call  sp_usuario_Nombre_Recuperar".parametros($proc);
||||||| .r27
		$sql = "call  sp_usuario_Nombre".parametros($proc);
=======
		$sql = "call  sp_usuario_Recuperar_Nombre".parametros($proc);
>>>>>>> .r36
		$DATA = DATAPHP(connectDB(),$sql);
		return json_decode($DATA,true);
	}

 ?>
