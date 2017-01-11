<?php
	function registrar_usuario($proc){
		$sql = "call  registrar_usuario".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_buss_crear($proc){
		$sql = "call  sp_buss_crear".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_buss_eliminar($proc){
		$sql = "call  sp_buss_eliminar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_existe_user($proc){
		$sql = "call  sp_existe_user".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_validar_login($proc){
		$sql = "call  sp_validar_login".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

?>
