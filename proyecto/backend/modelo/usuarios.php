<?php

    require_once("modelo/generico.php");

	class usuarios extends generico {


		protected $nombreUsuario;

		protected $clave;
        
        protected $perfil;



		public function traerNombreUsuario(){
			return $this-> nombreUsuario;
		}

		public function traerClave(){
			return $this-> clave;
		}

        public function traerPerfil(){
			return $this-> perfil;
		}

	   
		public function constructor($arrayDatos = array()){

			$this->id 			    = $this->extraerDatos($arrayDatos,'id');
			$this->nombreUsuario 	= $this->extraerDatos($arrayDatos,'nombreUsuario');
			$this->clave		    = $this->extraerDatos($arrayDatos,'clave');
            $this->perfil		    = $this->extraerDatos($arrayDatos,'perfil');
	
		}

	
		
		public function login($usuario, $clave){


			$sql = "SELECT * FROM usuarios 
					WHERE nombreUsuario = :nombreUsuario AND clave = :clave";
			
		
            $arrayDatos = array();
            $arrayDatos['nombreUsuario'] 	= $usuario;
            $arrayDatos['clave'] 	        = md5($clave);
            $respuesta = $this->cargarDatos($sql, $arrayDatos);


            foreach($respuesta as $usuario){

                @session_start();
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                $_SESSION['perfil'] = $usuario['perfil'];
                return "OK";

            }

            return "Error";
        
        }

	
	
	}