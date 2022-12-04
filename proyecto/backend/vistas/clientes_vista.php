<?php
	
	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$idCliente = isset($_GET['id'])?$_GET['id']:"";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";

	require_once("modelo/clientes.php");

	$objClientes = new clientes();

	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objClientes->constructor($arrayDatos);
		$respuesta = $objClientes->ingresar();

	}

	if(isset($_POST['action']) && $_POST['action'] == "ingresarIdCliente"){

		$arrayDatos = $_POST;
		$objClientes->constructor($arrayDatos);
		$respuesta = $objClientes->ingresarIdCliente();

	}

	if(isset($_POST['action']) && $_POST['action'] == "editar"){

		$arrayDatos = $_POST;
		$objClientes->constructor($arrayDatos);
		$respuesta = $objClientes->editar();
		
	}

	if(isset($_POST['action']) && $_POST['action'] == "borrar"){

		$arrayDatos = $_POST;
		$objClientes->constructor($arrayDatos);
		$respuesta = $objClientes->borrar();

	}

	if($accion == "ingresarIdCliente" && $idCliente != ""){
		
		$objClientes->cargar($idCliente);
 	
	}

	if($accion == "editar" && $idCliente != ""){
		
		$objClientes->cargar($idCliente);
 	
	}

	if($accion == "borrar" && $idCliente != ""){
		
		$objClientes->cargar($idCliente);
 	
	}

	$listaClientes = $objClientes->listar();


?>

<style>
	
</style>


<?php
	if($accion == "editar"){
?>
		
		<div class="row">
			<h2> Editar Cliente</h1>
		</div>
		<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
			<div class="row">
				<div class="input-field col s6">
					<input id="documento" type="text" class="validate" name="documento"  value="<?=$objClientes->traerDocumento()?>">
					<label for="documento">Documento</label>
				</div>
				<div class="input-field col s6">
					<input id="nombre" type="text" class="validate" name="nombre"  value="<?=$objClientes->traerNombre()?>">
					<label for="nombre">Nombre</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="apellido" type="text" class="validate" name="apellido"  value="<?=$objClientes->traerApellido()?>">
					<label for="apellido">Apellido</label>
				</div>
				<div class="input-field col s6">
					<input id="telefono" type="text" class="validate" name="telefono"  value="<?=$objClientes->traerTelefono()?>">
					<label for="telefono">Telefono</label>
				</div>
			</div>
			<div class=row>
				<input type="hidden" name="id" value="<?=$objClientes->traerId()?>">
				<button class="btn waves-effect amber darken-4 right" type="submit" name="action" value="editar">Guardar cambio
   					<i class="material-icons left">save</i>
				</button>
			</div>
			
			 
		</form>
	</div>


<?php	
	}
?>


<?php
	if($accion == "borrar"){
?>

	<div class="card">
		<div class= "card-content">
		<div class="row">
			<h3> Borrar Cliente </h1>
		</div>
		<form action="index.php?r=<?=$ruta?>"  method="POST" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<h5> ¿Esta seguro que quiere borrar al cliente "<?=$objClientes->traerNombre(), " ", $objClientes->traerApellido()?>"? </h3>
				</div>
			</div>
			<div class=row>
				<input type="hidden" name="id" value="<?=$objClientes->traerId()?>">
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



<div class="container">
	<table class=" centered highlight">
		<thead>
			<tr>
				<th colspan = "7">
					 <!-- Modal Trigger -->
					<h3 class="center align"> Cartera de Clientes </h3>
					<div class="row">
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
						<div class="valign-wrapper right" style="height:60px">
							<a class=" waves-effect amber darken-4 btn modal-trigger" href="#modal8">Nuevo cliente
								<i class="material-icons left white-text">add</i></a>
							</a>
						</div>
					</div>
					


					<!-- Modal Structure -->
					<div id="modal8" class="modal">
						<div class="grey darken-3 valign-wrapper" style="height: 80px">
							<h4 class="white-text amber-text text-darken-4 center-align" style="margin-left:30px">Nuevo Cliente</h4>
						</div>
						<form action="index2.php?r=<?=$ruta?>" method="POST" class="col s12">
							<div class="modal-content">
								<div class="row">
									<div class="input-field col s6">
										<input id="documento" type="text" class="validate" name="documento">
										<label for="documento">Documento</label>
									</div>
									<div class="input-field col s6">
										<input id="nombre" type="text" class="validate" name="nombre">
										<label for="nombre">Nombre</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input id="apellido" type="text" class="validate" name="apellido">
										<label for="apellido">Apellido</label>
									</div>
									<div class="input-field col s6">
										<input id="telefono" type="text" class="validate" name="telefono">
										<label for="telefono">Telefono</label>
									</div>
								</div>	
							</div>
							<div class="modal-footer">
								<button class="btn waves-effect amber darken-4 right" type="submit" name="action" value="ingresar"> Guardar
									<i class="material-icons right">save</i>
								</button>
							</div>
						</form>
					</div>
				</th>
			</tr>
				<div class="card">
					<tr class="grey darken-3 white-text">
						<th>#</th>
						<th>Documento</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Telefono</th>
						<th>Acciones</th>
						<th>Envios</th>
					</tr>

		</thead>
		<tbody>
<?php
		foreach($listaClientes as $cliente){

?>
			<tr>
				<td><?=$cliente['id']?></td>
				<td><?=$cliente['documento']?></td>
				<td><?=$cliente['nombre']?></td>
				<td><?=$cliente['apellido']?></td>
				<td><?=$cliente['telefono']?></td>
				<td>
				<div class= "right-aling">
					<a href="index2.php?r=<?=$ruta?>&a=editar&id=<?=$cliente['id']?>"  class="waves-effect waves-light btn amber darken-4" >
						<i class="material-icons center white-text">edit</i></a>
					<a href="index2.php?r=<?=$ruta?>&a=borrar&id=<?=$cliente['id']?>"  class="waves-effect waves-light btn amber darken-4">
						<i class="material-icons center">delete</i></a>
				</div>	
				</td>
				<td>
					<a href="index2.php?r=envios" class="waves-effect waves-light btn amber darken-4" name="action" value="ingresarIdCliente" > CREAR ENVIO </a>
				</td>
			</tr>	
<?php
		}
?>	
		</tbody>
	</table>
</div>

<?php

if($accion == "ingresarIdCliente"){

?>

<div class="row">
			<h2> Cliente</h1>
		</div>
		<form action="index2.php?r=<?=$ruta?>"  method="POST" class="col s12">
			<div class="row">
				<div class="input-field col s6">
					<input id="documento" type="text" class="validate" name="documento"  value="<?=$objClientes->traerDocumento()?>">
					<label for="documento">Documento</label>
				</div>
				<div class="input-field col s6">
					<input id="nombre" type="text" class="validate" name="nombre"  value="<?=$objClientes->traerNombre()?>">
					<label for="nombre">Nombre</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="apellido" type="text" class="validate" name="apellido"  value="<?=$objClientes->traerApellido()?>">
					<label for="apellido">Apellido</label>
				</div>
				<div class="input-field col s6">
					<input id="telefono" type="text" class="validate" name="telefono"  value="<?=$objClientes->traerTelefono()?>">
					<label for="telefono">Telefono</label>
				</div>
			</div>
			<div class=row>
				<input type="hidden" name="id" value="<?=$objClientes->traerId()?>">
				<button class="btn waves-effect amber darken-4 right" type="submit" name="action" value="editar">Guardar cambio
   					<i class="material-icons left">save</i>
				</button>
		</div>
			
			 
		</form>
	</div>

<?php
}
?>
			
