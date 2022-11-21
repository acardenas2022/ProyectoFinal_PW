
<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";

	if($ruta == "inicio"){
		include("vistas/inicio_vista.php");
	}elseif($ruta == "rastrear"){
		include("vistas/rastrear_vista.php");
	}elseif($ruta == "ingresarEnvio"){
		include("vistas/ingresarEnvio_vista.php");
	}


?>