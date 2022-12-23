
<?php

    require_once("modelo/usuarios.php");

    $nombreUsuario= isset($_POST['nombreUsuario'])?$_POST['nombreUsuario']:"";
    $clave= isset($_POST['clave'])?$_POST['clave']:"";
    

   
    if($nombreUsuario != "" && $clave != "" && isset($_POST['action']) && $_POST['action'] == "login"){

        $objUsuarios = new usuarios ();
        $respuesta = $objUsuarios->login($nombreUsuario, $clave);

        if($respuesta == "OK"){
            header('Location: index2.php?r=inicio2');
        }

            
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
				<div class="nav-wrapper amber darken-4 container" >
					<div>
					<i class="material-icons left" style="font-size: 70px">local_shipping</i></div>
					<a href="#!" class="col l4 s3 center brand-logo"><span class="titulo"> Flash </span><span class="titulo2"> entregas</span></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="index.php?r=inicio">Salir</a></li>
					</ul>
				</div>
			</nav>

            <div class="container">
                <div class="row" style="margin:100px 0 100px">
                    <div class="col s10 m6 offset-s1 offset-m3">
                        <form action="login.php"  method="POST" class="col s12">
                            <div class="row  center-align">
								<h4> Ingresar </h2>
							</div>

<?php
        if(isset($respuesta) && $respuesta == "Error"){
?>
                    <div class="row">
                        <div class="input-field col s12 red">
                            <h3>Error en el usuario y la clave</h3>
                        </div>
                    </div>
<?php
        }
?>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nombreUsuario" autocomplete="off" type="text" class="validate" name="nombreUsuario">
                                    <label for="nombreUsuario"> Usuario </label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="clave" autocomplete="off" type="password" class="validate" name="clave">
                                    <label for="clave"> Clave </label>
                                </div>
                            </div>
                            <button class="btn waves-effect amber darken-4 right" type="submit" name="action" value="login">Ingresar
                                <i class="material-icons left">save</i>
                            </button>
                        </form>
                    </div>
				</div>
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
	</html>
		