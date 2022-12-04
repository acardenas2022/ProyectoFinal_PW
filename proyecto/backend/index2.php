

<?php
        @session_start();

        if(!isset($_SESSION['nombreUsuario'])){

            header ('Location: login.php');
        }
?>


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
				color: #424242 ;
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

			@media only screen and (min-width: 601px) {
				nav.nav-extended .nav-wrapper {
					min-height: 80px;
				}
				nav, nav .nav-wrapper i, nav a.sidenav-trigger, nav a.sidenav-trigger i {
					height: 80px;
					line-height: 80px;
				}
				.navbar-fixed {
					height: 80px;
				}
			}
		

			body {
   				display: flex;
   				min-height: 100vh;
    			flex-direction: column;
 			}

 			main {
   				flex: 1 0 auto;
  			}

			.material-icons-footer{
				filter: invert(46%) sepia(58%) saturate(2996%) hue-rotate(1deg) brightness(103%) contrast(106%);
			}

			@media only screen and (min-width: 200px) {
				nav.nav-extended .nav-wrapper {
					min-height: 80px;
				}
				nav, nav .nav-wrapper i, nav a.sidenav-trigger, nav a.sidenav-trigger i {
					height: 80px;
					line-height: 80px;
				}
				.navbar-fixed {
					height: 80px;
				}
			}

			.input-field input[type=text]:focus {
 				border-bottom: 1px solid #ff6f00; /* El #000 es el color de la línea */
  				box-shadow: 0 1px 0 0 #000; /* Y acá, de la pequeña sombra que genera */
			}

		
		</style>

		<body>
			<nav class="amber darken-4">
				<div class="nav-wrapper amber darken-4">
				<div class= "s12 m4 l2"  style="margin-left:40px">
						<i class="material-icons left" style="font-size: 70px">local_shipping</i>
					</div>
					<div class= "s12 m4 l8">
						<a href="#!" class="col l12 m4 s3 center brand-logo"><span class="titulo"> Flash </span><span class="titulo2"> entregas</span></a>
					</div>
					<div class= "s12 m4 l2"  style="margin-right:40px">
						<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
							<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="index2.php?r=inicio2">Inicio <i class="material-icons left">home</i></a></li>
							<li><a href="index2.php?r=rastrear">Rastrear envio <i class="material-icons left">location_on</i></a></li>
							<li><a href="index2.php?r=clientes">Clientes <i class="material-icons left">group</i></a></li>
							<li><a class="modal-trigger" href="#modal3">Salir <i class="material-icons left">forward</i></a></li>
						</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
				<li><a class= "amber-text text-darken-4" href="index2.php?r=inicio">Inicio</a></li>
				<li><a class= "amber-text text-darken-4" href="index2.php?r=rastrear">Rastrear</a></li>
				<li><a class= "amber-text text-darken-4" href="index2.php?r=clientes"> Clientes </a></li>
				<li><a class= "amber-text text-darken-4" href="#modal3">Salir</a></li>
		 	</ul>


			 <div id="modal3" class="modal">
			<div class="modal-content">
				<h4 class="amber-text text-darken-4 left" >¿Seguro deseas salir?</h4>
			</div>
			<div class="modal-footer">
				<a href="logout.php" class="modal-close waves-effect waves-green btn-flat white-text amber darken-4">Aceptar</a>
				<a href="#!" class="modal-close waves-effect waves-green btn-flat white-text amber darken-4">Cancelar</a>
			</div>
			</div>


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
		<footer class="page-footer  grey darken-3">
			<div>
				<div class="row">
					<div class="col l4 s4">
						<div class="white-text center-align">
							<h5 class="amber-text text-darken-4"> Contacto </h5> 
							<a class="white-text"> Telefono: 2604 22 22 <br></a>
							<a class="white-text"> Email: fast@fastentregas.com </a>
						</div>
					</div>
					<div class="col l4 s4">
						<div class="white-text center-align">
							<h5 class="amber-text text-darken-4 center-align">Horario de atencion </h5> 
								<a class="white-text center-align"> Lunes a Viernes de 07:00hs a 19:00hs</a>
						</div>
					</div>
					<div class="col l4 s4">
						<h5 class="amber-text text-darken-4 center-align">Seguinos en nuestras redes</h5>
							<h6 class="white-text center-align">FlashEntregasUY
								<br><br>
								<i class="material-icons amber-text text-darken-4">facebook</i>
								<img class="material-icons-footer" style="width:23px" id="iconos" src="web/img/instagram.ico">
								<img class="material-icons-footer" style="width:23px" id="iconos" src="web/img/twitter.ico">
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
		