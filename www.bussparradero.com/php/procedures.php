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

	function sp_destinos_buses_Actualizar_ByID($proc){
		$sql = "call  sp_destinos_buses_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_destinos_buses_Agregar($proc){
		$sql = "call  sp_destinos_buses_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_destinos_buses_Eliminar_ByID($proc){
		$sql = "call  sp_destinos_buses_Eliminar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_destinos_buses_Listar($proc){
		$sql = "call  sp_destinos_buses_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_destinos_buses_Listar_ByID($proc){
		$sql = "call  sp_destinos_buses_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_existe_user($proc){
		$sql = "call  sp_existe_user".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_pagos_Actualizar_ByID($proc){
		$sql = "call  sp_pagos_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_pagos_Agregar($proc){
		$sql = "call  sp_pagos_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_pagos_Eliminar_ByID($proc){
		$sql = "call  sp_pagos_Eliminar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_pagos_Listar($proc){
		$sql = "call  sp_pagos_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_pagos_Listar_ByID($proc){
		$sql = "call  sp_pagos_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_Actualizar_ByID($proc){
		$sql = "call  sp_sucursal_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_Agregar($proc){
		$sql = "call  sp_sucursal_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_Eliminar_ByID($proc){
		$sql = "call  sp_sucursal_Eliminar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_Listar($proc){
		$sql = "call  sp_sucursal_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_sucursal_Listar_ByID($proc){
		$sql = "call  sp_sucursal_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_user_listar($proc){
		$sql = "call  sp_user_listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function sp_validar_login($proc){
		$sql = "call  sp_validar_login".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssptb_destinos_buses_Agregar($proc){
		$sql = "call  ssptb_destinos_buses_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_area_trabajo_Actualizar_ByID($proc){
		$sql = "call  ssp_tb_area_trabajo_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_area_trabajo_Agregar($proc){
		$sql = "call  ssp_tb_area_trabajo_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_area_trabajo_Eliminar_ByID($proc){
		$sql = "call  ssp_tb_area_trabajo_Eliminar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_area_trabajo_Listar($proc){
		$sql = "call  ssp_tb_area_trabajo_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_area_trabajo_Listar_ByID($proc){
		$sql = "call  ssp_tb_area_trabajo_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_buses_Actualizar_ByID($proc){
		$sql = "call  ssp_tb_buses_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_buses_Listar($proc){
		$sql = "call  ssp_tb_buses_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_buses_Listar_ByID($proc){
		$sql = "call  ssp_tb_buses_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_estado_Actualizar_ByID($proc){
		$sql = "call  ssp_tb_estado_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_estado_Agregar($proc){
		$sql = "call  ssp_tb_estado_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_estado_Eliminar_ByID($proc){
		$sql = "call  ssp_tb_estado_Eliminar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_estado_Listar($proc){
		$sql = "call  ssp_tb_estado_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_estado_Listar_ByID($proc){
		$sql = "call  ssp_tb_estado_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_personal_Actualizar_ByID($proc){
		$sql = "call  ssp_tb_personal_Actualizar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_personal_Agregar($proc){
		$sql = "call  ssp_tb_personal_Agregar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_personal_Eliminar_ByID($proc){
		$sql = "call  ssp_tb_personal_Eliminar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_personal_Listar($proc){
		$sql = "call  ssp_tb_personal_Listar".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

	function ssp_tb_personal_Listar_ByID($proc){
		$sql = "call  ssp_tb_personal_Listar_ByID".parametros($proc);
		$DATA = DATA(connectDB(),$sql);
		echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';
	}

?>
