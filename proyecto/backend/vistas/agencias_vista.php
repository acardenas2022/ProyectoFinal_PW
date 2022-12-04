<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";

	require_once("modelo/agencias.php");

	$objAgencias = new agencias();

	$listaAgencias = $objAgencias-> listar();


?>

	<div class="card">
		<div class="card-content">
			<div class="center-align" >
				<table>
					<thead>
						<th colspan= 7 class= "center align">
							<h4 class="amber-text text-darken-4"> NUESTRAS AGENCIAS </h4>
							<h6 class="black-text"> Encontra aqui tu agencia mas cercana </h6>
						<br>
						</th>
					</thead>
					<tbody>
<?php
		foreach($listaAgencias as $agencias){

?>
						<tr>
							<td><?=$agencias['ciudad']?></td>
							<td><?=$agencias['departamento']?></td>
						</tr>	
<?php
		}
?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>