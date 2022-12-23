
<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";

	if($ruta == "inicio"){
		include("vistas/inicio_vista.php");
	}elseif($ruta == "rastrear"){
		include("vistas/rastrear_vista.php");
	}elseif($ruta == "envios"){
		include("vistas/envios_vista.php");
	}elseif($ruta == "agencias"){
	include("vistas/agencias_vista.php");
	}elseif($ruta == "inicio2"){
		include("vistas/inicio2_vista.php");
	}elseif($ruta == "clientes"){
		include("vistas/clientes_vista.php");
	}elseif($ruta == "estado"){
		include("vistas/estado_vista.php");
	}elseif($ruta == "reparto"){
		include("vistas/reparto_vista.php");
	}elseif($ruta == "entregados"){
		include("vistas/entregados_vista.php");
	}elseif($ruta == "pendientes"){
		include("vistas/pendientes_vista.php");
	}else{
		include("vistas/inicio_vista.php");
	}	


?>