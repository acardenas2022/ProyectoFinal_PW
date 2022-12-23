<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$pagina = isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";

    require_once("modelo/envios.php");
	$objEntregados = new envios ();


	$arrayFiltros = array("totalRegistro" =>5, "busqueda" => $busqueda);

		
	$totalRegistrosEntregados = $objEntregados->totalRegistrosEntregados($arrayFiltros);

	$totalPaginas = ceil($totalRegistrosEntregados / $arrayFiltros['totalRegistro']);
	
	
	if($pagina > $totalPaginas){
		$pagina = $totalPaginas;
	}
	if($pagina < 1){
		$pagina = 1;
	}
	
	$arrayFiltros['pagina'] = $pagina ;

	$paginaSiguiente = $pagina + 1;

	if($paginaSiguiente > $totalPaginas ){
		$paginaSiguiente = $totalPaginas;
	}
	
 	$paginaAnterior = $pagina - 1;
	
	if($paginaAnterior < 1){
		$paginaAnterior = 1;
	}

	$listaEntregados = $objEntregados->listarentregados($arrayFiltros);


?>



<div class="card" style="margin:100px 0 100px">
	<div class="row">
		<div class="grey darken-3 valign-wrapper" style="height: 80px">
				<h4 class="white-text amber-text text-darken-4" style="margin-left:30px">Estado de envio</h4>
		</div>
	</div>
	<div class= "row">
		<div class= "col s2" style= "margin-top:20px">
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Recepcionista" OR $_SESSION['perfil'] == "Encargado" ){
?>
				<a href="index2.php?r=clientes" class="waves-effect waves-light btn amber darken-4" > CREAR ENVIO </a>
<?php
			  }
?>
		</div>
		<div class="col s4">
			<form action="index2.php" method="GET">
				<div class="input-field">
					<input type="hidden" name="r" value="<?=$ruta?>">
					<input id="search" autocomplete="off" type="search" name="busqueda" required>
					<label class="label-icon left" for="search">
						<i class="material-icons">search</i>
					</label>
						<i class="material-icons">close</i>
				</div>
			</form>
		</div>
		<div class="col s6" style= "margin-top:20px">
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Recepcionista" OR $_SESSION['perfil'] == "Encargado" ){
?>
				<a href="index2.php?r=estado" class="waves-effect waves-light btn amber darken-4" > GENERAL </a>
				<a href="index2.php?r=pendientes" class="waves-effect waves-light btn amber darken-4" > PENDIENTES </a>
<?php
			  }
?>
			<a href="index2.php?r=reparto" class="waves-effect waves-light btn amber darken-4" > EN REPARTO </a>
			<a href="index2.php?r=entregados" class="waves-effect waves-light btn amber darken-4" > ENTREGADOS </a>
		</div>
	</div>
	
	<table class="striped">
		<thead>
				<tr class="grey darken-3 white-text">
					<th>Usuario</th>
					<th>ID</th>
					<th>Codigo Envio</th>
					<th>Fecha recepcion</th>
					<th>Remitente</th>
					<th>Ciudad</th>
					<th>Departamento</th>
					<th>Hora Entrega</th>
				</tr>
		</thead>

		<tbody>
<?php
		foreach($listaEntregados as $estado){

?>
			<tr>
				<td><?=$estado['usuario']?></td>
				<td><?=$estado['id']?></td>
				<td><?=$estado['codigoEnvio']?></td>
				<td><?=$estado['fechaRecepcion']?></td>
				<td><?=$estado['nombreCliente']?></td>
				<td><?=$estado['ciudadDestinatario']?></td>
				<td><?=$estado['departamentoDestinatario']?></td>
				<td><?=$estado['fechaHoraEntrega']?></td>
			</tr>	
<?php
		}
?>	
			<tr class="grey darken-3">
				<td colspan=10  class="center-align">
								<ul class="pagination">
									<li class="waves-effect">
										<a href="index2.php?r=<?=$ruta?>&pagina=<?=$paginaAnterior?>&busqueda=<?=$busqueda?>">
										<i class="material-icons">chevron_left</i></a>
									</li>
<?php
			for($i = 1; $i <= $totalPaginas; $i++ ){
							
				if($pagina == $i){
					$marca = "active";
				}else{
					$marca = "waves-effect";
				}	
?>
									<li class="<?=$marca?>">
										<a href="index2.php?r=<?=$ruta?>&a=entregados&pagina=<?=$i?>&busqueda=<?=$busqueda?>"><?=$i?></a>
									</li>
<?php

			}
?>				
									<li class="waves-effect">
										<a href="index2.php?r=<?=$ruta?>&a=entregados&pagina=<?=$paginaSiguiente?>&busqueda=<?=$busqueda?>">
										<i class="material-icons">chevron_right</i></a>
									</li>
								</ul>
							</td>
						</tr>
		</tbody>
	</table>
</div>

