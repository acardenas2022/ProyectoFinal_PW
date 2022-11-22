<?php

	class clientes {

		protected $id;

		protected $documento;

		protected $nombre;

		protected $apellido; 

		protected $telefono; 


		public function traerId(){
			return $this-> id;
		}

		public function traerDocumento(){
			return $this-> documento;
		}

		public function traerNombre(){
			return $this-> nombre;
		}

		public function traerApellido(){
			return $this-> apellido;
		}

		public function traerTelefono(){
			return $this-> telefono;
		}

	   
		public function constructor($arrayDatos = array()){

			$this->id 			= $this->extraerDatos($arrayDatos,'id');
			$this->documento 	= $this->extraerDatos($arrayDatos,'documento');
			$this->nombre		= $this->extraerDatos($arrayDatos,'nombre');
			$this->apellido 	= $this->extraerDatos($arrayDatos,'apellido');
			$this->telefono 	= $this->extraerDatos($arrayDatos,'telefono');
	
		}

		public function extraerDatos($array, $clave){

			if(isset($array[$clave])){
				return $array[$clave];
			}
			return "";
		}

		
		public function ingresar(){
			$conexion = new PDO("mysql:host=localhost;dbname=trabajoFinal", 'root', '');
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			$sqLInsert = "INSERT clientes SET
						 documento			= :documento,
						 nombre		        = :nombre,
						 apellido	        = :apellido, 
						 telefono 		    = :telefono";
	
			$mysqlPrepare = $conexion->prepare($sqLInsert); 
			$arraySql = array(
						"documento"		=> $this->documento, 
						"nombre"		=> $this->nombre,
						"apellido"		=> $this->apellido,
						"telefono"		=> $this->telefono,
						
			);
	
	
			$respuesta = $mysqlPrepare->execute($arraySql);
			$retorno = array();
			if($respuesta){
				$retorno['codigo'] = "Ok";
			}else{
				$retorno['codigo'] = "Error";
			}
			return $retorno;
	
		}

		public function listar($arrayDatos  = array()){

			$conexion = new PDO("mysql:host=localhost;dbname=trabajoFinal", 'root', '');
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			$sql = "SELECT * FROM clientes";
	
			$mysqlPrepare = $conexion->prepare($sql); 
		  	$mysqlPrepare->execute(array());
			$respuesta = $mysqlPrepare->fetchALL(PDO::FETCH_ASSOC);
			return $respuesta;
	
		}
	
	
	}