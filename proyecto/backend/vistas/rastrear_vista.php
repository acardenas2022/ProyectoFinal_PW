<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";

	require_once("modelo/envios.php");

	$objRastreo = new envios ();


	$arrayFiltros = array("busqueda" => $busqueda);

	$rastrear = $objRastreo->rastrear($arrayFiltros);

?>


			<div class="card" style="margin-top:100px">
				<div class="card-content">
					<div class="black-text center-align">
						<h4 class="amber-text text-darken-4"> Rastrear un envío </h4>
					</div>
					<div class= "row">
						<form action="index.php" method="GET"  class= "col s6">
							<div class="input-field" >
								<input type="hidden" name="r" value="<?=$ruta?>">
								<input id="search" type="search" name="busqueda" required>
									<label class="label-icon" for="search"> Numero de rastreo
										<i class="material-icons left">search</i>
									</label>
										<i class="material-icons">close</i>
							</div>
						</form>
					</div>
				</div>
			</div>
	

	<table style="margin:100px 0 100px">
		<thead>

<?php
	if(isset($_GET['busqueda']) && $_GET['busqueda'] != ""){
?>
<?php
			foreach($rastrear as $estado){

?>
			<tr>
				<th> Codigo Envio </th>
				<td><?=$estado['codigoEnvio']?></td>
			</tr>
			<tr>
				<th> Nombre Remitente </th>
				<td><?=$estado['nombreCliente']?></td>
			</tr>
			<tr>
				<th> Nombre Destinatario </th>
				<td><?=$estado['nombreDestinatario']?></td>
			</tr>
			<tr>
				<th> Direccion </th>
				<td><?=$estado['direccionDestinatario']?></td>
			</tr>
			<tr>
				<th> Estado </th>
				<td><?=$estado['estado']?></td>
			</tr>
					
<?php
		}
?>		
		</thead>
<?php
		}
?>	
	</table>


    





