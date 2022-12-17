<?php
	
	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$accion = isset($_GET['a'])?$_GET['a']:"";
	$idCliente = isset($_GET['idCliente'])?$_GET['idCliente']:"";

	require_once("modelo/envios.php");
	require_once("modelo/clientes.php");

	$objEnvios = new envios(); 
	$objClientes = new clientes(); 

	if( $idCliente != ""){
		$objClientes->cargar($idCliente);
	}

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
		
		<div class="green center-align" style="height=50px">
			<h5> La operacion se realizo correctamente </h5> 
		</div>
<?php
	}
?>

	
	<style>
	
	</style>

   



<div class="card" style="margin:100px 0 100px">
	<div class="row">
	<h3 class="center-align"> Crear un nuevo envio </h3>
		<form action="index2.php?r=<?=$ruta?>"  method="POST">
			<div class="row">
			<div class="input-field col s6">
					<input type="text" class="validate" value="<?=$_SESSION['nombreUsuario']?>" >
					<label> Usuario </label>
			</div>
			<div class="input-field col s6">
					<input id="fechaRecepcion" type="text" class="validate" name="fechaRecepcion"  value="<?=date("y/m/d H:i:s")?>" >
					<label> Fecha Recepcion </label>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input type="text" class="validate" value="<?=$objClientes->traerNombre()?> <?=$objClientes->traerApellido()?>">
					<label> Cliente </label>
				</div>
				<div class="input-field col s6">
					<input type="text" class="validate" value="<?=$objClientes->traerDocumento()?>">
					<label> Documento</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input type="text" class="validate" value="<?=$objClientes->traerTelefono()?>">
					<label >Telefono</label>
				</div>
				<div class="input-field col s6">
					<input id="codigoEnvio" type="text" class="validate" name="codigoEnvio" value="<?= strtoupper(substr(uniqid(), -6)) ?>">
					<label for="codigoEnvio">Codigo Envio</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="nombreDestinatario" autocomplete="off" type="text" class="validate" name="nombreDestinatario">
					<label for="nombreDestinatario">Nombre destinatario</label>
				</div>
				<div class="input-field col s6">
					<input id="telefonoDestinatario" autocomplete="off" type="text" class="validate" name="telefonoDestinatario">
					<label for="telefonoDestinatario">Telefono</label>
				</div>
			</div>
			<div class="row">
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
  				</div>
				<div class="input-field col s6">
					<input id="calle" autocomplete="off" type="text" class="validate"  name="calle">
					<label for="calle">Calle</label>
				</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="numeroPuerta" autocomplete="off" type="text" class="validate" name="numeroPuerta">
					<label for="numeroPuerta">Numero de puerta</label>
				</div>
				<div class="input-field col s6">
					<input id="apartamento" autocomplete="off" type="text" class="validate" name="apartamento">
					<label for="apartamento">Apartamento</label>
				</div>
			</div>
			<div class="row">
				<input type="hidden" name="id_cliente" value="<?=$objClientes->traerId()?>">
				<input type="hidden" name="id_usuario" value="<?=$_SESSION['id']?>">
				<button class="btn waves-effect waves-light right amber darken-4" type="submit"  name="action" value="ingresar">Crear envio
					<i class="material-icons right">save</i>
				</button>
			</div>
			</div>
		</form>
	</div>
</div>
</div>







	
