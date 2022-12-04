<?php
	
	@session_start();

	unset($_SESSION['nombreUsuario']);
	
	session_destroy();

	header('Location: index.php?r=inicio');

?>