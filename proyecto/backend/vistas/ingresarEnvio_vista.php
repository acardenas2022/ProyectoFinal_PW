<?php
	
	$ruta = isset($_GET['r'])?$_GET['r']:"";

	require_once("modelo/clientes.php");

	$objClientes = new clientes();

	if(isset($_POST['action']) && $_POST['action'] == "ingresarCliente"){

		$arrayDatos = $_POST;
		$objClientes->constructor($arrayDatos);
		$respuesta = $objClientes->ingresar();

		print_r($respuesta);
	}


	$listaClientes = $objClientes-> listar();

?>

<?php
	if(isset($respuesta) && $respuesta['codigo'] == 'Error'){
?>
		<div class="red center-align" style="height =30px">
			<h4> Error al realizar la operacion </h4> 
		</div>
<?php
	}elseif (isset($respuesta) && $respuesta['codigo'] == 'Ok'){
?>
		<div class="green center-align" style="height =30px">
			<h4> Se realizo la operacion correctamente </h4> 
		</div>
<?php
	}
?>

	<style>
	
	</style>

<div>
	<br>
	<!-- Modal Trigger -->
		<a class="waves-effect amber darken-4 btn modal-trigger" href="#modal1">Lista clientes
			<i class="material-icons left " >group</i>
		</a>
	<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<a class="amber-text text-darken-4" style="font-size:30px">Clientes actuales</a>
				<br>
				<form class="col s12">
					<div class="row">
						<div class="input-field col s6">
							<input id="documento" type="text" class="validate">
							<label for="documento">Buscar cliente <i class="material-icons left " >search</i> </label>
						</div>
					</div>
				</form>
				<br>
					<div>
						<table class="striped">
							<thead>
								<tr class="amber darken-4 white-text">
									<th>#</th>
									<th>Documento</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Telefono</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

<?php
		foreach($listaClientes as $clientes){

?>
								<tr>
									<td><?=$clientes['id']?></td>
									<td><?=$clientes['documento']?></td>
									<td><?=$clientes['nombre']?></td>
									<td><?=$clientes['apellido']?></td>
									<td><?=$clientes['telefono']?></td>
									<td>
										<div class= "right-aling">
											<a href="index.php?r=<?=$ruta?>&a=editar&id=<?=$clientes['id']?>"  class="waves-effect waves-light btn yellow" >
												<i class="material-icons center black-text">edit</i></a>
											<a href="index.php?r=<?=$ruta?>&a=borrar&id=<?=$clientes['id']?>"  class="waves-effect waves-light btn red">
												<i class="material-icons center">delete</i></a>
										</div>
									</td>
								</tr>	
<?php
		}
?>
							</tbody>
						</table>
					</div>
			</div>
		</div>

	<!-- Modal Trigger -->
		<a class="waves-effect amber darken-4 btn modal-trigger" href="#modal2">Cliente
			<i class="material-icons left " >add</i>
		</a>
	<!-- Modal Structure -->
		<div id="modal2" class="modal">
			<div class="modal-content">
				<div>
					<a class="amber-text text-darken-4 center" style="font-size:30px">Ingresar nuevo cliente</a>
				</div> 
				<br>
				<div class="row">
					<form action="index.php?r=<?=$ruta?>"  method="POST" class="col s12">
						<div class="row">
							<div class="input-field col s6">
								<input id="nombre" type="text" class="validate" name="nombre">
								<label for="nombre">Nombre</label>
							</div>
							<div class="input-field col s6">
								<input id="apellido" type="text" class="validate" name="apellido">
								<label for="apellido">Apellido</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input id="documento" type="text" class="validate" name="documento">
								<label for="documento">Documento</label>
							</div>
							<div class="input-field col s6">
								<input id="telefono" type="text" class="validate" name="telefono">
								<label for="telefono">Telefono</label>
							</div>
						</div>
						<button class="btn waves-effect waves-light right amber darken-4" type="submit" name="action" value="ingresarCliente">Guardar
   							<i class="material-icons right">save</i>
 						</button>
					</form>
				</div>
			</div>
		</div>
				
</div>	
<br>



<div class="card">
	<div class="row">
		<form >
			<div class="row">
				<div class="input-field col s6">
					<input id="nombreDestinatario" type="text" class="validate">
					<label for="nombreDestinatario">Nombre destinatario</label>
				</div>
				<div class="input-field col s6">
					<input id="ciudad" type="text" class="validate">
					<label for="ciudad">Ciudad</label>
				</div>
				<div class="input-field col s6">
					<input id="calle" type="password" class="validate">
					<label for="calle">Calle</label>
				</div>
				<div class="input-field col s6">
					<input id="numeroPuerta" type="text" class="validate">
					<label for="numeroPuerta">Numero de puerta</label>
				</div>
				<div class="input-field col s6">
					<input id="apartamento" type="password" class="validate">
					<label for="apartamento">Apartamento</label>
				</div>
				<div class="input-field col s6">
					<select>
      					<option value="" disabled selected>Estado</option>
      					<option value="1">Pendiente</option>
      					<option value="2">Reparto</option>
      					<option value="3">Entregado</option>
   					</select>
										
				</div>
				<div>
					<button class="btn waves-effect waves-light right amber darken-4" type="submit" name="action">Crear envio
						<i class="material-icons right">save</i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
	
