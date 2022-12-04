<?php

	require_once("modelo/generico.php");

	class clientes extends generico{

		protected $documento;

		protected $nombre;

		protected $apellido; 

		protected $telefono; 
 

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

		
		public function ingresar(){
			
			$sqLInsert = "INSERT clientes SET
						 documento			= :documento,
						 nombre		        = :nombre,
						 apellido	        = :apellido, 
						 telefono 		    = :telefono,
						 estado				= 1";
	
			$arraySql = array(
						"documento"		=> $this->documento, 
						"nombre"		=> $this->nombre,
						"apellido"		=> $this->apellido,
						"telefono"		=> $this->telefono,
						
			);
	
			$retorno = $this->imputarCambio($sqLInsert, $arraySql);
			return $retorno;
				
	
		}


		public function listar($arrayDatos  = array()){
	
			$sql = "SELECT * FROM clientes
						WHERE estado = 1";
	
			$arraySql= array();
			
		$retorno = $this->cargarDatos($sql, $arraySql);
		return $retorno;
	
		}

			
		public function cargar($idCliente){

		$sql = "SELECT * FROM clientes 	WHERE id = :id";


		$arrayDatos = array();
		$arrayDatos ['id'] = $idCliente;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		
		foreach($respuesta as $cliente){
			$this->id 				=$cliente['id'];		 
			$this->documento 		=$cliente['documento'];
			$this->nombre 			=$cliente['nombre'];
			$this->apellido 		=$cliente['apellido'];
			$this->telefono 		=$cliente['telefono'];
		}
	

	}

		public function editar(){

			
			$sqlInsert = "UPDATE clientes SET
							documento 		= :documento,
							nombre			= :nombre,
							apellido 		= :apellido,
							telefono 		= :telefono
							WHERE id = :id";
	
			$arraySql = array(
							"documento" 	=> $this->documento,
							"nombre" 		=> $this->nombre,
							"apellido"		=> $this->apellido,
							"telefono" 		=> $this->telefono,
							"id" 			=> $this->id,
						);
	
			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;
	
		}
	
	
		public function borrar(){
	
	
			$sqlInsert = "UPDATE clientes SET estado = 0 WHERE id = :id";	
			$arraySql = array(
							"id" => $this->id,
						);
			
			
			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;
		}
	
	
	
	
	}