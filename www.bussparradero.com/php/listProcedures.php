<?php
	if ($proc[0]==='areatrabajoActualizarByID') {
		sp_area_trabajo_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='areatrabajoAgregar') {
		sp_area_trabajo_Agregar($proc);
	}

	else if ($proc[0]==='areatrabajoEliminarByID') {
		sp_area_trabajo_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='areatrabajoListar') {
		sp_area_trabajo_Listar($proc);
	}

	else if ($proc[0]==='areatrabajoListarByID') {
		sp_area_trabajo_Listar_ByID($proc);
	}

	else if ($proc[0]==='busesActualizarByID') {
		sp_buses_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='busesAgregar') {
		sp_buses_Agregar($proc);
	}

	else if ($proc[0]==='busesEliminarByID') {
		sp_buses_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='busesListar') {
		sp_buses_Listar($proc);
	}

	else if ($proc[0]==='busesListarByID') {
		sp_buses_Listar_ByID($proc);
	}

	else if ($proc[0]==='clienteagregar') {
		sp_cliente_agregar($proc);
	}

	else if ($proc[0]==='clientelistar') {
		sp_cliente_listar($proc);
	}

	else if ($proc[0]==='destinosbusesActualizarByID') {
		sp_destinos_buses_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='destinosbusesAgregar') {
		sp_destinos_buses_Agregar($proc);
	}

	else if ($proc[0]==='destinosbusesEliminarByID') {
		sp_destinos_buses_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='destinosbusesListar') {
		sp_destinos_buses_Listar($proc);
	}

	else if ($proc[0]==='destinosbusesListarByID') {
		sp_destinos_buses_Listar_ByID($proc);
	}

	else if ($proc[0]==='estadoActualizarByID') {
		sp_estado_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='estadoAgregar') {
		sp_estado_Agregar($proc);
	}

	else if ($proc[0]==='estadoEliminarByID') {
		sp_estado_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='estadoListar') {
		sp_estado_Listar($proc);
	}

	else if ($proc[0]==='estadoListarByID') {
		sp_estado_Listar_ByID($proc);
	}

	else if ($proc[0]==='existeuser') {
		sp_existe_user($proc);
	}

	else if ($proc[0]==='pagosActualizarByID') {
		sp_pagos_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='pagosAgregar') {
		sp_pagos_Agregar($proc);
	}

	else if ($proc[0]==='pagosEliminarByID') {
		sp_pagos_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='pagosListar') {
		sp_pagos_Listar($proc);
	}

	else if ($proc[0]==='pagosListarByID') {
		sp_pagos_Listar_ByID($proc);
	}

	else if ($proc[0]==='personalActualizarByID') {
		sp_personal_Actualizar_ByID($proc);
	}

	else if ($proc[0]==='personalAgregar') {
		sp_personal_Agregar($proc);
	}

	else if ($proc[0]==='personalEliminarByID') {
		sp_personal_Eliminar_ByID($proc);
	}

	else if ($proc[0]==='personalListar') {
		sp_personal_Listar($proc);
	}

	else if ($proc[0]==='personalListarByID') {
		sp_personal_Listar_ByID($proc);
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

	else if ($proc[0]==='usuarioValidar') {
		sp_usuario_Validar($proc);
	}

	else if ($proc[0]==='usuarioValidarContrasena') {
		sp_usuario_Validar_Contrasena($proc);
	}

	else {
		echo '{"PROCESO":"FALLIDO"}';
	}
?>
