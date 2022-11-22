

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
			
			nav {
  				color: #fff;
  				background-color: #ee6e73;
 				width: 100%;
 				height:80px;
  				line-height: 56px;
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
			<nav class="amber darken-4">
				<div class="nav-wrapper amber darken-4 container" >
					<div>
					<i class="material-icons left" style="font-size: 70px">local_shipping</i></div>
					<a href="#!" class="col l4 s3 center brand-logo"><span class="titulo"> Flash </span><span class="titulo2"> entregas</span></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
						<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="index.php?r=inicio">Inicio</a></li>
							<li><a href="index.php?r=rastrear">Rastrear</a></li>
							<li><a href="index.php?r=ingresarEnvio">Ingresar envio</a></li>
						</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
				<li><a class= "amber-text text-darken-4" href="index.php?r=inicio">Inicio</a></li>
				<li><a class= "amber-text text-darken-4" href="index.php?r=rastrear">Rastrear</a></li>
				<li><a class= "amber-text text-darken-4" href="index.php?r=ingresarEnvio">Ingresar envio</a></li>
		 	</ul>
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
		<footer class="page-footer  amber darken-4">
			<div>
				<div class="row">
					<div class="col l4 s4">
						<div class="white-text center-align">
							<h5> Contacto </h5> 
							<a class="white-text"> Telefono: 2604 22 22 <br></a>
							<a class="white-text"> Email: fast@fastentregas.com </a>
						</div>
					</div>
					<div class="col l4 s4">
						<div class="white-text center-align">
							<h5 class="white-text center-align">Horario de atencion </h5> 
								<a class="white-text center-align"> Lunes a Viernes de 07:00hs a 19:00hs</a>
						</div>
					</div>
					<div class="col l4 s4">
						<h5 class="black-text center-align">Seguinos en nuestras redes</h5>
							<h6 class="white-text center-align">FlashEntregasUY
								<br><br>
								<i class="material-icons black-text">facebook</i>
								<img style="width:23px" id="iconos" src="web/img/instagram.ico">
								<img style="width:23px" id="iconos" src="web/img/twitter.ico">
							</h6>
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
		