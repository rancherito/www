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

	function USP_Deletetb_area_trabajoByID($proc){
		$sql = "call  USP_Deletetb_area_trabajoByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Deletetb_personalByID($proc){
		$sql = "call  USP_Deletetb_personalByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Gettb_area_trabajoDetailsByID($proc){
		$sql = "call  USP_Gettb_area_trabajoDetailsByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Gettb_personalDetailsByID($proc){
		$sql = "call  USP_Gettb_personalDetailsByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_InsertIntotb_area_trabajo($proc){
		$sql = "call  USP_InsertIntotb_area_trabajo".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_InsertIntotb_personal($proc){
		$sql = "call  USP_InsertIntotb_personal".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Updatetb_area_trabajoByID($proc){
		$sql = "call  USP_Updatetb_area_trabajoByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Updatetb_personalByID($proc){
		$sql = "call  USP_Updatetb_personalByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

?>
