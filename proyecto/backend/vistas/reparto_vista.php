
<?php
	
	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$idEnvio = isset($_GET['id'])?$_GET['id']:"";
	$pagina = isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";

	require_once("modelo/envios.php");

	$objReparto = new envios(); 

	
	if(isset($_POST['action']) && $_POST['action'] == "entregado"){

		$arrayDatos = $_POST;
		$objReparto->constructor($arrayDatos);
		$respuesta = $objReparto->estadoEntregado();
		
	}

	if(isset($_POST['action']) && $_POST['action'] == "volverAPendiente"){

		$arrayDatos = $_POST;
		$objReparto->constructor($arrayDatos);
		$respuesta = $objReparto->estadoPendiente();

	}

	if($accion == "volverAPendiente" && $idEnvio != ""){
		
		$objReparto->cargar($idEnvio);
 	
	}


	if($accion == "entregado" && $idEnvio != ""){
		
		$objReparto->cargar($idEnvio);
 	
	}

	$arrayFiltros = array("totalRegistro"=>5, "busqueda" => $busqueda);

	$totalRegistros = $objReparto->totalRegistros($arrayFiltros);

	$totalPaginas = ceil($totalRegistros / $arrayFiltros['totalRegistro']);

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

	

	$listaEnReparto = $objReparto->listarReparto($arrayFiltros);

?>

<style>

	.pagination li a {
		color: #ff6f00;
		display: inline-block;
		font-size: 1.2rem;
		padding: 0 10px;
		line-height: 30px;
	}
	.pagination li.active {
  		background-color: #ff6f00 ;
	}

	.pagination li.disabled a {
		cursor: default;
		color: #ff6f00;
	}

</style>


<?php
	if($accion == "entregado"){
?>
	<div class="card" style="margin:100px 0 100px">
		<div class= "card-content">
			<div class="row">
				<h2> Estado del envio</h1>
			</div>
			<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<h5> ¿Esta seguro que quiere marcar como Entregado el envio "<?=$objReparto->traerCodigoEnvio()?>"? </h3>
					</div>
					<div class="input-field col s6">
						<input id="fechaHoraEntrega" type="time" class="validate" name="fechaHoraEntrega">
						<label for="fechaHoraEntrega">Hora de Entrega</label>
					</div>
				</div>
				<div class=row>
					<input type="hidden" name="id" value="<?=$objReparto->traerId()?>">
					<div class="input-field col s2">
						<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="cancelar">Cancelar
							<i class="material-icons left">cancele</i>
						</button>
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="entregado">Entregado
							<i class="material-icons left"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>	


<?php	
	}
?>

<?php
	if($accion == "volverAPendiente" && $idEnvio !=""){
?>
	<div class="card" style="margin:100px 0 100px">
		<div class= "card-content">
			<div class="row">
				<h2> Estado del envio</h1>
			</div>
			<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<h5> ¿Esta seguro que quiere marcar como Pendiente el envio "<?=$objReparto->traerCodigoEnvio()?>"? </h3>
					</div>
				</div>
				<div class=row>
					<input type="hidden" name="id" value="<?=$objReparto->traerId()?>">
					<div class="input-field col s2">
						<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="cancelar">Cancelar
							<i class="material-icons left">cancele</i>
						</button>
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="volverAPendiente"> Pendiente
							<i class="material-icons left"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>	


<?php	
	}
?>



<div class="card" style="margin:100px 0 100px">
	<div class="row">
		<h4 class="center align"> REPARTO </h4>		
	</div>
	<div class="col s12 m4 l8">
				<form action="index2.php" method="GET">
					<div class="input-field">
						<input type="hidden" name="r" value="<?=$ruta?>">
						<input id="search" type="search" name="busqueda" required>
						<label class="label-icon left" for="search">
							<i class="material-icons">search</i>
						</label>
							<i class="material-icons">close</i>
					</div>
				</form>
			</div>
	<table class="striped">
		<thead>
				<tr class="grey darken-3 white-text">
					<th>Codigo Envio</th>
					<th>Fecha recepcion</th>
					<th>Remitente</th>
					<th>Destinatario</th>
					<th>Departamento</th>
					<th>Ciudad</th>
					<th>Calle</th>
					<th>N° Puerta</th>
					<th>Apto</th>
					<th>ESTADO</th>
				</tr>
		</thead>

		<tbody>
<?php
		foreach($listaEnReparto as $reparto){

?>
			<tr>
				<td><?=$reparto['codigoEnvio']?></td>
				<td><?=$reparto['fechaRecepcion']?></td>
				<td><?=$reparto['nombreCliente']?></td>
				<td><?=$reparto['nombreDestinatario']?></td>
				<td><?=$reparto['departamentoDestinatario']?></td>
				<td><?=$reparto['ciudadDestinatario']?></td>
				<td><?=$reparto['calle']?></td>
				<td><?=$reparto['numeroPuerta']?></td>
				<td><?=$reparto['apartamento']?></td>
				<td>
					<div class= "right-aling">
						<a href="index2.php?r=<?=$ruta?>&a=entregado&id=<?=$reparto['id']?>" class="waves-effect waves-light btn modal-trigger amber darken-4" > Entregado</a>
					</div>
					<div class= "right-aling">
						<a href="index2.php?r=<?=$ruta?>&a=volverAPendiente&id=<?=$reparto['id']?>" class="waves-effect waves-light btn modal-trigger amber darken-4"> Pendiente</a>
					</div>
				</td>	
			</tr>	
<?php
		}
?>	
			<tr class="grey darken-3">
							<td colspan=12  class="center-align">
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
										<a href="index2.php?r=<?=$ruta?>&pagina=<?=$i?>&busqueda=<?=$busqueda?>"><?=$i?></a>
									</li>
<?php

			}
?>				
									<li class="waves-effect">
										<a href="index2.php?r=<?=$ruta?>&pagina=<?=$paginaSiguiente?>&busqueda=<?=$busqueda?>">
										<i class="material-icons">chevron_right</i></a>
									</li>
								</ul>
							</td>
						</tr>
		</tbody>
	</table>
</div>
