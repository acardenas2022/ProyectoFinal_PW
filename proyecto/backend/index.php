

<!DOCTYPE html>
	<html>
		<head>
			<!--Import Google Icon Font-->
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<!--Import materialize.css-->
			<link type="text/css" rel="stylesheet" href="web/css/materialize.css"  media="screen,projection"/>

			<!--Let browser know website is optimized for mobile-->
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<style>
			@font-face{
					font-family: big_river;
					src: url("web/font/big_river.ttf");
			}

			@font-face{
					font-family: Lovelo_Black;
					src: url("web/font/Lovelo_Black.ttf");
			}

			.titulo{
				font-family: Lovelo_Black;
				font-size: 30px;
				text-align: center;
				color: black ;
				line-height: 75px;
			}

			.titulo2{
				font-family: big_river;
				font-size: 30px;
				text-align: center;
				color: white;
				line-height: 75px;
			}
		

			nav .nav-wrapper {
  				position: relative;
 				height: 120%;
			}

			body {
   				display: flex;
   				min-height: 100vh;
    			flex-direction: column;
 			}

 			main {
   				flex: 1 0 auto;
  			}

		
		</style>

		<body>
			<!-- Dropdown Structure -->
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="#!">hola</a></li>
				<li><a href="#!">two</a></li>
				<li class="divider"></li>
				<li><a href="#!">three</a></li>
			</ul>
			<nav>
				<div class="nav-wrapper amber darken-4" >
					<i class="material-icons left " style="font-size: 70px ">local_shipping</i>
					<a href="#!" class="brand-logo center"><span class="titulo"> Flash </span><span class="titulo2"> entregas</span></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="index.php?r=inicio">Inicio</a></li>
						<li><a href="index.php?r=rastrear">Rastrear</a></li>
						<li><a href="index.php?r=ingresarEnvio">Ingresar envio</a></li>
					</ul>
				</div>
			</nav>
        <div class="container">
<?php 	
			include("rutas.php");
		
?>	
		</div>

			<!--JavaScript at end of body for optimized loading-->
			<script type="text/javascript" src="web/js/materialize.js"></script>
			<script> 
						document.addEventListener('DOMContentLoaded', function() {
							M.AutoInit();
							var elems = document.querySelectorAll('.dropdown-trigger');
							var instances = M.Dropdown.init(elems, options);
						});
			</script>
		</body>
		<main></main>
		<footer class="page-footer amber darken-4">
			<div>
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Contacto</h5>
						<p class="white-text">Contactanos por cualquiera de nuestros canales</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Links</h5>
						<ul>
							<li><a class="white-text" href="#!">Link 1</a></li>
							<li><a class="white-text" href="#!">Link 2</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div>
					© 2014 Copyright Text
				<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
	</html>
		