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

	function sp_personal_actualizar_pLlave($proc){
		$sql = "call  sp_personal_actualizar_pLlave".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_personal_borrar_pLlave($proc){
		$sql = "call  sp_personal_borrar_pLlave".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_personal_crear($proc){
		$sql = "call  sp_personal_crear".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_personal_listar_pLlave($proc){
		$sql = "call  sp_personal_listar_pLlave".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_crear($proc){
		$sql = "call  sp_sucursal_crear".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_eliminar($proc){
		$sql = "call  sp_sucursal_eliminar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_tb_area_trabajo_actualizar_pLlave($proc){
		$sql = "call  sp_tb_area_trabajo_actualizar_pLlave".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_tb_area_trabajo_borrar_pLlave($proc){
		$sql = "call  sp_tb_area_trabajo_borrar_pLlave".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_tb_area_trabajo_crear($proc){
		$sql = "call  sp_tb_area_trabajo_crear".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_tb_area_trabajo_listar_pLlave($proc){
		$sql = "call  sp_tb_area_trabajo_listar_pLlave".parametros($proc);
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

	function USP_Deletetb_usuariosByID($proc){
		$sql = "call  USP_Deletetb_usuariosByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Gettb_area_trabajoDetailsByID($proc){
		$sql = "call  USP_Gettb_area_trabajoDetailsByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Gettb_busesDetailsByID($proc){
		$sql = "call  USP_Gettb_busesDetailsByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Gettb_usuariosDetailsByID($proc){
		$sql = "call  USP_Gettb_usuariosDetailsByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_InsertIntotb_area_trabajo($proc){
		$sql = "call  USP_InsertIntotb_area_trabajo".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_InsertIntotb_usuarios($proc){
		$sql = "call  USP_InsertIntotb_usuarios".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Updatetb_area_trabajoByID($proc){
		$sql = "call  USP_Updatetb_area_trabajoByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Updatetb_busesByID($proc){
		$sql = "call  USP_Updatetb_busesByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function USP_Updatetb_usuariosByID($proc){
		$sql = "call  USP_Updatetb_usuariosByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

?>
