<?php

	require_once("modelo/generico.php");

	class envios extends generico{

        protected $codigoEnvio;

		protected $fechaRecepcion;

		protected $nombreDestinatario;

		protected $calle; 

        protected $numeroPuerta; 

        protected $apartamento; 

		protected $fechaEnvio; 
        
        protected $horaEntrega; 

        protected $estado; 
 

		public function traerCodigoEnvio(){
			return $this-> codigoEnvio;
		}

		public function traerFechaRecepcion(){
			return $this-> fechaRecepcion;
		}

		public function traerNombreDestinatario(){
			return $this-> nombreDestinatario;
		}

		public function traerCalle(){
			return $this-> calle;
		}

        public function traerNumeroPuerta(){
			return $this-> numeroPuerta;
		}

		public function traerApartamento(){
			return $this-> apartamento;
		}

		public function traerFechaEnvio(){
			return $this-> fechaEnvio;
		}

		public function traerHoraEntrega(){
			return $this-> horaEntrega;
		}

        public function traerEstado(){
			return $this-> estado;
		}

	   
		public function constructor($arrayDatos = array()){

			$this->id 			        = $this->extraerDatos($arrayDatos,'id');
            $this->codigoEnvio 			= $this->extraerDatos($arrayDatos,'codigoEnvio');
			$this->fechaRecepcion 	    = $this->extraerDatos($arrayDatos,'fechaRecepcion');
			$this->nombreDestinatario	= $this->extraerDatos($arrayDatos,'nombreDestinatario');
			$this->calle 	            = $this->extraerDatos($arrayDatos,'calle');
			$this->numeroPuerta 	    = $this->extraerDatos($arrayDatos,'numeroPuerta');
            $this->apartamento		    = $this->extraerDatos($arrayDatos,'apartamento');
			$this->fechaEnvio 	        = $this->extraerDatos($arrayDatos,'fechaEnvio');
			$this->horaEntrega 	        = $this->extraerDatos($arrayDatos,'horaEntrega');
            $this->estado 	            = $this->extraerDatos($arrayDatos,'estado');
	
		}

		
		public function ingresar(){

            if($this->codigoEnvio == ""){
                $this->codigoEnvio = NULL;
            }

            if($this->fechaEnvio == ""){
                $this->fechaEnvio = NULL;
            }

            if($this->horaEntrega == ""){
                $this->horaEntrega = NULL;
            }
			
			$sqLInsert = "INSERT envio SET
						 fechaRecepcion		        = :NOW(),
						 nombreDestinatario	        = :nombreDestinatario, 
						 calle 		                = :calle,
                         numeroPuerta			    = :numeroPuerta,
						 apartamento		        = :apartamento,
						 estado				        = Pendiente";
	
			$arraySql = array(
						"NOW()"		            => $this->fechaRecepcion, 
						"nombreDestinatario"	=> $this->nombreDestinatario,
						"calle"		            => $this->calle,
						"numeroPuerta"		    => $this->numeroPuerta,
                        "apartamento"		    => $this->apartamento,
						"Pendiente"		        => $this->estado,
						
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

        public function listarSelect(){
	
            $sql = "SELECT 
                        id,
                        CONCAT(ciudad, ' - ' , departamento) AS ciudad
                        FROM ciudades
                        WHERE estado = 1
                        ORDER BY departamento ASC";

        $arrayDatos = array();
        $retorno = $this->cargarDatos($sql, $arrayDatos);
        return $retorno;

        }

        //CONCAT(ciudad, '-' , departamento) AS ciudades
			
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