

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

			<link type="text/css" rel="stylesheet" href="web/css/flashEntregasCSS.css"  media="screen,projection"/>

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

		
		</style>

		<body>
			<nav class="amber darken-4">
				<div class="nav-wrapper amber darken-4">
				<div class= "s12 m4 l2"  style="margin-left:40px">
						<i class="material-icons left" style="font-size: 70px">local_shipping</i>
					</div>
					<div class= "s12 m4 l8">
						<a href="#!" class="col l12 m4 s3 brand-logo" style="margin-left:110px"><span class="titulo"> Flash </span><span class="titulo2"> entregas</span></a>
					</div>
					<div class= "s12 m4 l2"  style="margin-right:40px">
						<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
							<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="index2.php?r=inicio2">Inicio <i class="material-icons left">home</i></a></li>
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Recepcionista" OR $_SESSION['perfil'] == "Encargado" ){
?>
							<li><a href="index2.php?r=clientes">Ingresar envio <i class="material-icons left">add</i></a></li>
<?php
			  }
?>
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Repartidor" ){
?>
							<li><a href="index2.php?r=reparto">Reparto <i class="material-icons left">transfer_within_a_station</i></a></li>	
<?php
			  }
?>
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Recepcionista" OR $_SESSION['perfil'] == "Encargado" ){
?>
							<li><a href="index2.php?r=estado">Estado <i class="material-icons left">timeline</i></a></li>	
<?php
			  }
?>	
							<li><a class="modal-trigger" href="#modal3">Salir <i class="material-icons left">forward</i></a></li>
						</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
				<li><a class= "amber darken-4 white-text" href="index2.php?r=inicio">Inicio</a></li>
				<li><a class= "amber-text text-darken-4" href="index2.php?r=rastrear">Rastrear</a></li>
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Recepcionista" OR $_SESSION['perfil'] == "Encargado" ){
?>		
				<li><a class= "amber-text text-darken-4" href="index2.php?r=clientes"> Ingresar envio </a></li>
<?php
			  }
?>
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Repartidor" ){
?>
				<li><a class= "amber-text text-darken-4" href="index2.php?r=reparto"> Reparto </a></li>
<?php
			  }
?>
<?php
			  if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Recepcionista" OR $_SESSION['perfil'] == "Encargado" ){
?>
				<li><a class= "amber-text text-darken-4" href="index2.php?r=estado">Estado</a></li>
<?php
			  }
?>
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
		