<?php

	$ruta = isset($_GET['r'])?$_GET['r']:"";
	$pagina = isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda = isset($_GET['busqueda'])?$_GET['busqueda']:"";


	require_once("modelo/ciudades.php");

	$objAgencias = new ciudades();

	

	$arrayFiltros = array("totalRegistro"=>10, "busqueda" => $busqueda);

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




	<div class="card" style="margin:100px 0 100px">
		<div class="grey darken-3 valign-wrapper" style="height: 80px">
			<h4 class="white-text amber-text text-darken-4" style="margin-left:30px"> NUESTRAS AGENCIAS </h4>
		</div>
				<div class="row" style="margin-top: 30px">
						<div class= "col s6">
							<h6 class="black-text" style="margin-left:20px"> Encontra aqui tu agencia mas cercana </h6>
						</div>
						<div class="col s6">
							<form action="index.php" method="GET">
								<div class="input-field">
									<input type="hidden" name="r" value="<?=$ruta?>">
									<input id="search" autocomplete="off" type="search" name="busqueda" required>
									<label class="label-icon" for="search">
										<i class="material-icons">search</i>
									</label>
									<i class="material-icons">close</i>
								</div>
							</form>
						</div>
					</div>
		
					<table class="striped">
					<thead>
						<tr><th colspan = "10"></tr>
							<tr class="grey darken-3 white-text">
							<th>Ciudad</th>
							<th>Departamento</th>
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
	
	