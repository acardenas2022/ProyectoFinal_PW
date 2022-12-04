<?php
	
	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";

	require_once("modelo/envios.php");
	require_once("modelo/usuarios.php");
	require_once("modelo/clientes.php");

	
	$objEnvios = new envios(); 

	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objEnvios->constructor($arrayDatos);
		$respuesta = $objEnvios->ingresar();

	}

	$listaCiudadesSelect = $objEnvios->listarSelect();

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


<?php

if($accion == "ingresarIdCliente"){

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

<div class="card">
	<div class="row">
	<h3 class="center-align"> Crear un nuevo envio </h3>
		<form >
			<div class="row">
				<div class="input-field col s6">
					<input id="nombreDestinatario" type="text" class="validate">
					<label for="nombreDestinatario">Nombre destinatario</label>
				</div>
				<div class="input-field col s6">
   					<select name="id_ciudad">
      					<option value="" disabled selected>Ciudad</option>
<?php
				foreach($listaCiudadesSelect as $ciudades ){
?>
						<option value="<?=$ciudades['id']?>">  <?=$ciudades['ciudad']?> </option>
<?php
				}
?>

    				</select>
    					<label>Materialize Select</label>
  				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="calle" type="text" class="validate">
					<label for="calle">Calle</label>
				</div>
				<div class="input-field col s6">
					<input id="numeroPuerta" type="text" class="validate">
					<label for="numeroPuerta">Numero de puerta</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="apartamento" type="text" class="validate">
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
			</div>
			<div class="row">
				<button class="btn waves-effect waves-light right amber darken-4" type="submit"  name="action" value="ingresar">Crear envio
					<i class="material-icons right">save</i>
				</button>
			</div>
			</div>
		</form>
	</div>
</div>



	
