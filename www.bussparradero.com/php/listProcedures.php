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

	else if ($proc[0]==='sucursalActualizarByID') {
		sp_sucursal_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='sucursalAgregar') {
		sp_sucursal_Agregar($proc);
	}

	else if ($proc[0]==='sucursalEliminarByID') {
		sp_sucursal_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='sucursalListar') {
		sp_sucursal_Listar($proc);
	}

	else if ($proc[0]==='sucursalListarByID') {
		sp_sucursal_Listar_ByID($proc);
	}

	else if ($proc[0]==='userlistar') {
		sp_user_listar($proc);
	}

	else if ($proc[0]==='validarlogin') {
		sp_validar_login($proc);
	}

	else if ($proc[0]==='sareatrabajoActualizarByID') {
		ssp_tb_area_trabajo_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='sareatrabajoAgregar') {
		ssp_tb_area_trabajo_Agregar($proc);
	}

	else if ($proc[0]==='sareatrabajoEliminarByID') {
		ssp_tb_area_trabajo_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='sareatrabajoListar') {
		ssp_tb_area_trabajo_Listar($proc);
	}

	else if ($proc[0]==='sareatrabajoListarByID') {
		ssp_tb_area_trabajo_Listar_ByID($proc);
	}

	else if ($proc[0]==='sbusesActualizarByID') {
		ssp_tb_buses_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='sbusesListar') {
		ssp_tb_buses_Listar($proc);
	}

	else if ($proc[0]==='sbusesListarByID') {
		ssp_tb_buses_Listar_ByID($proc);
	}

	else if ($proc[0]==='sestadoActualizarByID') {
		ssp_tb_estado_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='sestadoAgregar') {
		ssp_tb_estado_Agregar($proc);
	}

	else if ($proc[0]==='sestadoEliminarByID') {
		ssp_tb_estado_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='sestadoListar') {
		ssp_tb_estado_Listar($proc);
	}

	else if ($proc[0]==='sestadoListarByID') {
		ssp_tb_estado_Listar_ByID($proc);
	}

	else if ($proc[0]==='spersonalActualizarByID') {
		ssp_tb_personal_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='spersonalAgregar') {
		ssp_tb_personal_Agregar($proc);
	}

	else if ($proc[0]==='spersonalEliminarByID') {
		ssp_tb_personal_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='spersonalListar') {
		ssp_tb_personal_Listar($proc);
	}

	else if ($proc[0]==='spersonalListarByID') {
		ssp_tb_personal_Listar_ByID($proc);
	}

	else {
		echo '{"PROCESO":"FALLIDO"}';
	}
?>
