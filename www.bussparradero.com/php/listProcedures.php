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

	else if ($proc[0]==='validarlogin') {
		sp_validar_login($proc);
	}

	else if ($proc[0]==='DeleteareatrabajoByID') {
		USP_Deletetb_area_trabajoByID($proc);
	}

	else if ($proc[0]==='DeletepersonalByID') {
		USP_Deletetb_personalByID($proc);
	}

	else if ($proc[0]==='GetareatrabajoDetailsByID') {
		USP_Gettb_area_trabajoDetailsByID($proc);
	}

	else if ($proc[0]==='GetpersonalDetailsByID') {
		USP_Gettb_personalDetailsByID($proc);
	}

	else if ($proc[0]==='InsertIntoareatrabajo') {
		USP_InsertIntotb_area_trabajo($proc);
	}

	else if ($proc[0]==='InsertIntopersonal') {
		USP_InsertIntotb_personal($proc);
	}

	else if ($proc[0]==='UpdateareatrabajoByID') {
		USP_Updatetb_area_trabajoByID($proc);
	}

	else if ($proc[0]==='UpdatepersonalByID') {
		USP_Updatetb_personalByID($proc);
	}

	else {
		echo '{"PROCESO":"FALLIDO"}';
	}
?>
