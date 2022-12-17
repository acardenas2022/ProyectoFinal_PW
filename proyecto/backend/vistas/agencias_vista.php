<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$pagina = isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";


	require_once("modelo/agencias.php");

	$objAgencias = new agencias();

	

	$arrayFiltros = array("totalRegistro"=>5, "busqueda" => $busqueda);

	$totalRegistros = $objAgencias->totalRegistros($arrayFiltros);

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


	$listaAgencias = $objAgencias->listar($arrayFiltros);
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


	<div class="card">
		<div class="card-content">
			<div class="center-align" >
				<table>
					<thead>
						<tr colspan= 7 class= "center align">
							<h4 class="amber-text text-darken-4"> NUESTRAS AGENCIAS </h4>
							<h6 class="black-text"> Encontra aqui tu agencia mas cercana </h6>
						</tr>
						<br>
						<tr>
							<div class="col s6">
								<form action="index.php" method="GET">
									<div class="input-field">
										<input type="hidden" name="r" value="<?=$ruta?>">
										<input id="search" type="search" name="busqueda" required>
										<label class="label-icon" for="search">
											<i class="material-icons">search</i>
										</label>
										<i class="material-icons">close</i>
									</div>
								</form>
							</div>
						</tr>
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

						<tr class="grey darken-3">
							<td colspan=7  class="center-align">
								<ul class="pagination">
									<li class="waves-effect">
										<a href="index.php?r=<?=$ruta?>&pagina=<?=$paginaAnterior?>&busqueda=<?=$busqueda?>">
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
										<a href="index.php?r=<?=$ruta?>&pagina=<?=$i?>&busqueda=<?=$busqueda?>"><?=$i?></a>
									</li>
<?php

			}
?>				
									<li class="waves-effect">
										<a href="index.php?r=<?=$ruta?>&pagina=<?=$paginaSiguiente?>&busqueda=<?=$busqueda?>">
										<i class="material-icons">chevron_right</i></a>
									</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	