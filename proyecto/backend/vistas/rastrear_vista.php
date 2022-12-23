<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";

	require_once("modelo/envios.php");

	$objRastreo = new envios ();


	$arrayFiltros = array("busqueda" => $busqueda);

	$rastrear = $objRastreo->rastrear($arrayFiltros);

?>


			<div class="card" style="margin-top:100px">
				<div class="grey darken-3 valign-wrapper" style="height: 80px">
					<h4 class="white-text amber-text text-darken-4" style="margin-left:30px"> RASTREAR UN ENVIO </h4>
				</div>
				<div class="card-content">
					<div class="row" style="margin-top: 30px">
						<div class= "col s6">
							<h6 class="black-text" > Ingresa el numero de rastreo para ver el estado de tu envio</h6>
						</div>
						<div class="col s6">
							<form action="index.php" method="GET">
								<div class="input-field" >
									<input type="hidden" name="r" value="<?=$ruta?>">
									<input id="search" autocomplete="off" type="search" name="busqueda" required>
										<label class="label-icon" for="search"> Numero de rastreo
											<i class="material-icons left">search</i>
										</label>
											<i class="material-icons">close</i>
								</div>
							</form>
						</div>
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


    





