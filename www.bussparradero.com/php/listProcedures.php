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

	else {
		echo '{"PROCESO":"FALLIDO"}';
	}
?>
