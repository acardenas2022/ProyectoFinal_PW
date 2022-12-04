<?php

	require_once("modelo/generico.php");

	class agencias extends generico{

		protected $ciudad;

		protected $departamento;


		public function traerCiudad(){
			return $this-> ciudad;
		}

		public function traerDepartamento(){
			return $this-> departamento;
		}


	   
		public function constructor($arrayDatos = array()){

			$this->ciudad 			= $this->extraerDatos($arrayDatos,'ciudad');
			$this->departamento 	= $this->extraerDatos($arrayDatos,'departamento');
			
	
		}

		

		public function listar($arrayDatos  = array()){
	
			$sql = "SELECT * FROM ciudades
						WHERE estado = 1
                        ORDER BY departamento asc";
	
			$arraySql= array();
			
		$retorno = $this->cargarDatos($sql, $arraySql);
		return $retorno;
	
		}
	
	
	}