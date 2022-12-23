<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$idEnvio = isset($_GET['id'])?$_GET['id']:"";
	$pagina = isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";

	require_once("modelo/envios.php");
	$objEstado = new envios ();


	if(isset($_POST['action']) && $_POST['action'] == "editar"){

		$arrayDatos = $_POST;
		$objEstado->constructor($arrayDatos);
		$respuesta = $objEstado->editar();
		
	}

	if(isset($_POST['action']) && $_POST['action'] == "borrar"){

		$arrayDatos = $_POST;
		$objEstado->constructor($arrayDatos);
		$respuesta = $objEstado->borrar();

	}

	if(isset($_POST['action']) && $_POST['action'] == "reparto"){

		$arrayDatos = $_POST;
		$objEstado->constructor($arrayDatos);
		$respuesta = $objEstado->estadoReparto();

	}

	if(isset($_POST['action']) && $_POST['action'] == "entregado"){

		$arrayDatos = $_POST;
		$objEstado->constructor($arrayDatos);
		$respuesta = $objEstado->estadoEntregado();
		
	}

	if(isset($_POST['action']) && $_POST['action'] == "volverAPendiente"){

		$arrayDatos = $_POST;
		$objEstado->constructor($arrayDatos);
		$respuesta = $objEstado->estadoPendiente();

	}

	if($accion == "volverAPendiente" && $idEnvio != ""){
		
		$objEstado->cargar($idEnvio);
 	
	}


	if($accion == "entregado" && $idEnvio != ""){
		
		$objEstado->cargar($idEnvio);
 	
	}

	if($accion == "reparto" && $idEnvio != ""){
		
		$objEstado->cargar($idEnvio);
 	
	}

	if($accion == "editar" && $idEnvio != ""){
		
		$objEstado->cargar($idEnvio);
 	
	}

	if($accion == "borrar" && $idEnvio != ""){
		
		$objEstado->cargar($idEnvio);
 	
	}


	
	$arrayFiltros = array("totalRegistro" =>10, "busqueda" => $busqueda);

		
	$totalRegistros = $objEstado->totalRegistros($arrayFiltros);

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

	

	$listaEstado = $objEstado->listarEnvios($arrayFiltros); 


	$listaCiudades = $objEstado->listarSelect();

?>
	


<?php
	if($accion == "editar"){
?>	
<div class="card" style="margin:100px 0 100px">
	<div class= "card-content">
		<div class="row">
			<h2> Editar Envio</h1>
		</div>
		<form action="index2.php?r=<?=$ruta?>"  method="POST"  class="col s12">
			<div class="row">
				<div class="input-field col s6">
					<input id="codigoEnvio" type="text" class="validate" name="codigoEnvio" value="<?=$objEstado->traerCodigoEnvio()?>">
					<label for="codigoEnvio">Codigo Envio</label>
				</div>
				<div class="input-field col s6">
					<input id="nombreDestinatario" type="text" class="validate" name="nombreDestinatario" value="<?=$objEstado->traerNombreDestinatario()?>">
					<label for="nombreDestinatario">Nombre destinatario</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="telefonoDestinatario" type="text" class="validate" name="telefonoDestinatario" value="<?=$objEstado->traerTelefonoDestinatario()?>">
					<label for="telefonoDestinatario">Telefono destinatario</label>
				</div>
				<div class="input-field col s6">
   					<select name="id_ciudad" >
<?php
				foreach($listaCiudades as $ciudad ){
?>
								<option value="<?=$ciudad['id']?>" <?php if($ciudad['id'] == $objEstado->traerIdCiudad()){ echo("selected");} ?> disabled selected > <?=$ciudad['ciudad']?> </option>
<?php
				}
?>
    				</select>	
  				</div>
				<div class="input-field col s6">
					<input id="calle" type="text" class="validate"  name="calle" value="<?=$objEstado->traerCalle()?>">
					<label for="calle">Calle</label>
				</div>
				<div class="input-field col s6">
					<input id="numeroPuerta" type="text" class="validate" name="numeroPuerta" value="<?=$objEstado->traerNumeroPuerta()?>">
					<label for="numeroPuerta">Numero de puerta</label>
				</div>
				<div class="input-field col s6">
					<input id="apartamento" type="text" class="validate" name="apartamento" value="<?=$objEstado->traerApartamento()?>">
					<label for="apartamento">Apartamento</label>
				</div>
				</div>
			<div class="row">
				<input type="hidden" name="id" value="<?=$objEstado->traerId()?>">
				<div class="input-field col s2">
					<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="cancelar">Cancelar
   						<i class="material-icons left">cancele</i>
					</button>
				</div>
				<div class="input-field col s2">
					<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="editar">Guardar cambio
   						<i class="material-icons left">save</i>
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
	if($accion == "borrar"){
?>

	<div class="card" style="margin:100px 0 100px">
		<div class= "card-content">
		<div class="row">
			<h3> Borrar Envio </h1>
		</div>
		<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<h5> ¿Esta seguro que quiere borrar el envio "<?=$objEstado->traerCodigoEnvio()?>"? </h3>
				</div>
			</div>
			<div class=row>
				<input type="hidden" name="id" value="<?=$objEstado->traerId()?>">
				<div class="input-field col s2">
					<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="cancelar">Cancelar
   						<i class="material-icons left">cancele</i>
					</button>
				</div>
				<div class="input-field col s2">
					<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="borrar">Borrar
   						<i class="material-icons left">delete</i>
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
	if($accion == "reparto" ){
?>
	<div class="card">
		<div class= "card-content">
			<div class="row">
				<h2> Estado del envio</h1>
			</div>
			<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<h5> ¿Esta seguro que quiere marcar como Reparto el envio "<?=$objEstado->traerCodigoEnvio()?>"? </h3>
					</div>
					<div class="input-field col s6">
						<input id="fechaAsignacion" type="text" class="validate" name="fechaAsignacion"  value="<?=date("y/m/d H:i:s")?>" >
					<label> Fecha de Asignacion a Reparto </label>
			</div>
				</div>
				<div class=row>
					<input type="hidden" name="id" value="<?=$objEstado->traerId()?>">
					<div class="input-field col s2">
						<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="cancelar">Cancelar
							<i class="material-icons left">cancele</i>
						</button>
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect amber darken-4 " type="submit" name="action" value="reparto"> En Reparto
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
	if($accion == "entregado" && $idEnvio !="" ){
?>
	<div class="card" style="margin:100px 0 100px">
		<div class= "card-content">
			<div class="row">
				<h2> Estado del envio</h1>
			</div>
			<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<h5> ¿Esta seguro que quiere marcar como Entregado el envio "<?=$objEstado->traerCodigoEnvio()?>"? </h3>
					</div>
					<div class="input-field col s6">
						<input id="fechaHoraEntrega" type="time" class="validate" name="fechaHoraEntrega">
						<label for="fechaHoraEntrega">Hora de Entrega</label>
					</div>
				</div>
				<div class=row>
					<input type="hidden" name="id" value="<?=$objEstado->traerId()?>">
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
						<h5> ¿Esta seguro que quiere marcar como Pendiente el envio "<?=$objEstado->traerCodigoEnvio()?>"? </h3>
					</div>
				</div>
				<div class=row>
					<input type="hidden" name="id" value="<?=$objEstado->traerId()?>">
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
		<div class="grey darken-3 valign-wrapper" style="height: 80px">
				<h4 class="white-text amber-text text-darken-4" style="margin-left:30px">Estado de envio</h4>
		</div>
	</div>
	<div class= "row">
		<div class= "col s2" style= "margin-top:20px">
			<a href="index2.php?r=clientes" class="waves-effect waves-light btn amber darken-4" > CREAR ENVIO </a>
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
			<a href="index2.php?r=estado" class="waves-effect waves-light btn amber darken-4" > GENERAL </a>
			<a href="index2.php?r=pendientes" class="waves-effect waves-light btn amber darken-4" > PENDIENTES </a>
			<a href="index2.php?r=reparto" class="waves-effect waves-light btn amber darken-4" > EN REPARTO </a>
			<a href="index2.php?r=entregados" class="waves-effect waves-light btn amber darken-4" > ENTREGADOS </a>
		</div>
	</div>
	<table class="striped">
		<thead>
				<tr class="grey darken-3 white-text">
					<th>ID</th>
					<th>Usuario</th>
					<th>Codigo Envio</th>
					<th>Fecha recepcion</th>
					<th>Remitente</th>
					<th>Ciudad Destino</th>
					<th>Fecha Entrega</th>
					<th>Estado</th>
					<th style="width:250px">Acciones</th>
				</tr>
		</thead>

		<tbody>
<?php
		foreach($listaEstado as $estado){

?>
			<tr>
				<td><?=$estado['id']?></td>
				<td><?=$estado['usuario']?></td>
				<td><?=$estado['codigoEnvio']?></td>
				<td><?=$estado['fechaRecepcion']?></td>
				<td><?=$estado['nombreCliente']?></td>
				<td><?=$estado['ciudadDestinatario']?></td>
				<td><?=$estado['fechaHoraEntrega']?></td>
				<td><?=$estado['estado']?></td>
				<td>
					<div class= "right-aling">
<?php
			if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Encargado" && $estado['estado'] == 'Reparto'){
?>
						<a href="index2.php?r=<?=$ruta?>&a=entregado&id=<?=$estado['id']?>" class="waves-effect waves-light btn modal-trigger amber darken-4" > Entregado</a>
						<a href="index2.php?r=<?=$ruta?>&a=volverAPendiente&id=<?=$estado['id']?>" class="waves-effect waves-light btn modal-trigger amber darken-4"> Pendiente</a>
<?php
			}
?>

<?php
			if(isset($_SESSION['perfil']) && $estado['estado'] == 'Pendiente'){
?>
						<a href="index2.php?r=<?=$ruta?>&a=editar&id=<?=$estado['id']?>"  class="waves-effect waves-light btn amber darken-4" >
							<i class="material-icons center white-text">edit</i></a>
						<a href="index2.php?r=<?=$ruta?>&a=borrar&id=<?=$estado['id']?>"  class="waves-effect waves-light btn amber darken-4">
							<i class="material-icons center">delete</i></a>
<?php
			}
?>
<?php
			if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Encargado" && $estado['estado'] == 'Pendiente'){
?>
						<a href="index2.php?r=<?=$ruta?>&a=reparto&id=<?=$estado['id']?>"  class="waves-effect waves-light btn amber darken-4"> Reparto </a>
<?php
			}
?>
					</div>	
				</td>
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
							<a href="index2.php?r=<?=$ruta?>&a=pendientes&pagina=<?=$i?>&busqueda=<?=$busqueda?>"><?=$i?></a>
						</li>
<?php

			}
?>				
						<li class="waves-effect">
							<a href="index2.php?r=<?=$ruta?>&a=pendientes&pagina=<?=$paginaSiguiente?>&busqueda=<?=$busqueda?>">
								<i class="material-icons">chevron_right</i></a>
						</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>




