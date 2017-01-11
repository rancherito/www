<?php
	if ($proc[0]==='registrarusuario') {
		registrar_usuario($proc);
	}

	else if ($proc[0]==='busscrear') {
		sp_buss_crear($proc);
	}

	else if ($proc[0]==='busseliminar') {
		sp_buss_eliminar($proc);
	}

	else if ($proc[0]==='existeuser') {
		sp_existe_user($proc);
	}

	else if ($proc[0]==='personalactualizarpLlave') {
		sp_personal_actualizar_pLlave($proc);
	}

	else if ($proc[0]==='personalborrarpLlave') {
		sp_personal_borrar_pLlave($proc);
	}

	else if ($proc[0]==='personalcrear') {
		sp_personal_crear($proc);
	}

	else if ($proc[0]==='personallistarpLlave') {
		sp_personal_listar_pLlave($proc);
	}

	else if ($proc[0]==='sucursalcrear') {
		sp_sucursal_crear($proc);
	}

	else if ($proc[0]==='sucursaleliminar') {
		sp_sucursal_eliminar($proc);
	}

	else if ($proc[0]==='areatrabajoactualizarpLlave') {
		sp_tb_area_trabajo_actualizar_pLlave($proc);
	}

	else if ($proc[0]==='areatrabajoborrarpLlave') {
		sp_tb_area_trabajo_borrar_pLlave($proc);
	}

	else if ($proc[0]==='areatrabajocrear') {
		sp_tb_area_trabajo_crear($proc);
	}

	else if ($proc[0]==='areatrabajolistarpLlave') {
		sp_tb_area_trabajo_listar_pLlave($proc);
	}

	else if ($proc[0]==='validarlogin') {
		sp_validar_login($proc);
	}

	else if ($proc[0]==='UDeleteareatrabajoByID') {
		USP_Deletetb_area_trabajoByID($proc);
	}

	else if ($proc[0]==='UDeleteusuariosByID') {
		USP_Deletetb_usuariosByID($proc);
	}

	else if ($proc[0]==='UGetareatrabajoDetailsByID') {
		USP_Gettb_area_trabajoDetailsByID($proc);
	}

	else if ($proc[0]==='UGetbusesDetailsByID') {
		USP_Gettb_busesDetailsByID($proc);
	}

	else if ($proc[0]==='UGetusuariosDetailsByID') {
		USP_Gettb_usuariosDetailsByID($proc);
	}

	else if ($proc[0]==='UInsertIntoareatrabajo') {
		USP_InsertIntotb_area_trabajo($proc);
	}

	else if ($proc[0]==='UInsertIntousuarios') {
		USP_InsertIntotb_usuarios($proc);
	}

	else if ($proc[0]==='UUpdateareatrabajoByID') {
		USP_Updatetb_area_trabajoByID($proc);
	}

	else if ($proc[0]==='UUpdatebusesByID') {
		USP_Updatetb_busesByID($proc);
	}

	else if ($proc[0]==='UUpdateusuariosByID') {
		USP_Updatetb_usuariosByID($proc);
	}

	else {
		echo '{"PROCESO":"FALLIDO"}';
	}
?>
