<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$idEnvio = isset($_GET['id'])?$_GET['id']:"";

	require_once("modelo/envios.php");
	$objEstado = new envios ();


	$arrayFiltros = array("totalRegistro"=>5, "pagina"=>1);
	$listaEstado = $objEstado->listar();
	$listaPendientes = $objEstado->listarpendientes();
	$listaEnReparto = $objEstado->listarReparto();
	$listaEntregados = $objEstado->listarentregados();
	



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

	if(isset($_POST['action']) && $_POST['action'] == "volverAPendiente"){

		$arrayDatos = $_POST;
		$objEstado->constructor($arrayDatos);
		$respuesta = $objEstado->estadoPendiente();

	}

	if($accion == "volverAPendiente" && $idEnvio != ""){
		
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


	$listaCiudades = $objEstado->listarSelect();

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
								<option value="<?=$ciudad['id']?>" <?php if($ciudad['id'] == $objEstado->traerIdCiudad()){ echo("selected");} ?> > <?=$ciudad['ciudad']?> </option>
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
	if($accion == "reparto" && $idEnvio !=""){
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
	if($accion == "volverAPendiente" && $idEnvio !=""){
?>
	<div class="card">
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
	


<?php
	if($ruta == "estado" && $accion == "" OR $ruta == "estado" && $accion == "pendientes"){
?>

<div class="card" style="margin:100px 0 100px">
	<div class="row">
		<h4 class="center align"> ESTADO DE ENVIOS </h4>
		<a href="index2.php?r=clientes" class="waves-effect waves-light btn amber darken-4" > CREAR ENVIO </a>
		<a href="index2.php?r=<?=$ruta?>&a=pendientes" class="waves-effect waves-light btn amber darken-4" > PENDIENTES </a>
		<a href="index2.php?r=<?=$ruta?>&a=reparto" class="waves-effect waves-light btn amber darken-4" > EN REPARTO </a>
		<a href="index2.php?r=<?=$ruta?>&a=entregados" class="waves-effect waves-light btn amber darken-4" > ENTREGADOS </a>
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
					<th>Acciones</th>
				</tr>
		</thead>

		<tbody>
<?php
		foreach($listaPendientes as $estado){

?>
			<tr>
				<td><?=$estado['usuario']?></td>
				<td><?=$estado['id']?></td>
				<td><?=$estado['codigoEnvio']?></td>
				<td><?=$estado['fechaRecepcion']?></td>
				<td><?=$estado['nombreCliente']?></td>
				<td><?=$estado['ciudadDestinatario']?></td>
				<td><?=$estado['departamentoDestinatario']?></td>
				<td>
					<div class= "right-aling">
						<a href="index2.php?r=<?=$ruta?>&a=editar&id=<?=$estado['id']?>"  class="waves-effect waves-light btn amber darken-4" >
							<i class="material-icons center white-text">edit</i></a>
						<a href="index2.php?r=<?=$ruta?>&a=borrar&id=<?=$estado['id']?>"  class="waves-effect waves-light btn amber darken-4">
							<i class="material-icons center">delete</i></a>
<?php
			if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Encargado"){
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
			<tr>	
				<td class="grey darken-3 center-align" colspan="8"> 
					<ul class="pagination">
						<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
						<li class="active"><a href="#!">1</a></li>
						<li class="waves-effect"><a href="#!">2</a></li>
						<li class="waves-effect"><a href="#!">3</a></li>
						<li class="waves-effect"><a href="#!">4</a></li>
						<li class="waves-effect"><a href="#!">5</a></li>
						<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>


<?php
	}
?>

<?php
	if($accion == "reparto"){
?>

<div class="card" style="margin:100px 0 100px">
	<div class="row">
		<h4 class="center align"> ESTADO DE ENVIOS </h4>
		<a href="index2.php?r=clientes" class="waves-effect waves-light btn amber darken-4" > CREAR ENVIO </a>
		<a href="index2.php?r=<?=$ruta?>&a=pendientes" class="waves-effect waves-light btn amber darken-4" > PENDIENTES </a>
		<a href="index2.php?r=<?=$ruta?>&a=reparto" class="waves-effect waves-light btn amber darken-4" > EN REPARTO </a>
		<a href="index2.php?r=<?=$ruta?>&a=entregados" class="waves-effect waves-light btn amber darken-4" > ENTREGADOS </a>
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
<?php
			if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Encargado"){
?>
					<th>Acciones</th>
<?php
			}
?>
				</tr>
		</thead>

		<tbody>
<?php
		foreach($listaEnReparto as $estado){

?>
			<tr>
				<td><?=$estado['usuario']?></td>
				<td><?=$estado['id']?></td>
				<td><?=$estado['codigoEnvio']?></td>
				<td><?=$estado['fechaRecepcion']?></td>
				<td><?=$estado['nombreCliente']?></td>
				<td><?=$estado['ciudadDestinatario']?></td>
				<td><?=$estado['departamentoDestinatario']?></td>
<?php
			if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Encargado"){
?>
				<td>
					<div class= "right-aling">
						<a href="index2.php?r=<?=$ruta?>&a=volverAPendiente&id=<?=$estado['id']?>"  class="waves-effect waves-light btn amber darken-4" >Volver a pendiente</a>
					</div>
				</td>
<?php
			}
?>
			</tr>	
<?php
		}
?>	
			<tr>	
				<td class="grey darken-3 center-align" colspan="8"> 
					<ul class="pagination">
						<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
						<li class="active"><a href="#!">1</a></li>
						<li class="waves-effect"><a href="#!">2</a></li>
						<li class="waves-effect"><a href="#!">3</a></li>
						<li class="waves-effect"><a href="#!">4</a></li>
						<li class="waves-effect"><a href="#!">5</a></li>
						<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>


<?php
	}
?>

<?php
	if($accion == "entregados"){
?>

<div class="card" style="margin:100px 0 100px">
	<div class="row">
		<h4 class="center align"> ESTADO DE ENVIOS </h4>
		<a href="index2.php?r=clientes" class="waves-effect waves-light btn amber darken-4" > CREAR ENVIO </a>
		<a href="index2.php?r=<?=$ruta?>&a=pendientes" class="waves-effect waves-light btn amber darken-4" > PENDIENTES </a>
		<a href="index2.php?r=<?=$ruta?>&a=reparto" class="waves-effect waves-light btn amber darken-4" > EN REPARTO </a>
		<a href="index2.php?r=<?=$ruta?>&a=entregados" class="waves-effect waves-light btn amber darken-4" > ENTREGADOS </a>
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
			<tr>	
				<td class="grey darken-3 center-align" colspan="8"> 
					<ul class="pagination">
						<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
						<li class="active"><a href="#!">1</a></li>
						<li class="waves-effect"><a href="#!">2</a></li>
						<li class="waves-effect"><a href="#!">3</a></li>
						<li class="waves-effect"><a href="#!">4</a></li>
						<li class="waves-effect"><a href="#!">5</a></li>
						<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>


<?php
	}
?>