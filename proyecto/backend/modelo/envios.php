<?php

	require_once("modelo/generico.php");

	class envios extends generico{

		protected $id_usuario;

		protected $id_cliente;

		protected $codigoEnvio;

		protected $fechaRecepcion;

		protected $nombreDestinatario;

		protected $telefonoDestinatario;

		protected $id_ciudad;

		protected $calle; 

		protected $numeroPuerta; 

		protected $apartamento; 

		protected $fechaAsignacion; 

		protected $fechaHoraEntrega;

		protected $estado; 
 

		public function traerIdUsuario(){
			return $this-> id_usuario;
		}
	   
		public function traerIdCliente(){
			return $this-> id_cliente;
		}
		
		public function traerCodigoEnvio(){
			return $this-> codigoEnvio;
		}

		public function traerFechaRecepcion(){
			return $this-> fechaRecepcion;
		}

		public function traerNombreDestinatario(){
			return $this-> nombreDestinatario;
		}

		public function traerTelefonoDestinatario(){
			return $this-> telefonoDestinatario;
		}

		public function traerIdCiudad(){
			return $this-> id_ciudad;
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

		public function traerfechaAsignacion(){
			return $this-> fechaAsignacion;
		}

		public function traerfechaHoraEntrega(){
			return $this-> fechaHoraEntrega;
		}

		public function traerEstado(){
			return $this-> estado;
		}

	   
		public function constructor($arrayDatos = array()){

			$this->id 			        = $this->extraerDatos($arrayDatos,'id');
			$this->id_usuario		    = $this->extraerDatos($arrayDatos,'id_usuario');
			$this->id_cliente		    = $this->extraerDatos($arrayDatos,'id_cliente');
			$this->codigoEnvio 			= $this->extraerDatos($arrayDatos,'codigoEnvio');
			$this->fechaRecepcion 	    = $this->extraerDatos($arrayDatos,'fechaRecepcion');
			$this->nombreDestinatario	= $this->extraerDatos($arrayDatos,'nombreDestinatario');
			$this->telefonoDestinatario	= $this->extraerDatos($arrayDatos,'telefonoDestinatario');
			$this->id_ciudad	        = $this->extraerDatos($arrayDatos,'id_ciudad');
			$this->calle 	            = $this->extraerDatos($arrayDatos,'calle');
			$this->numeroPuerta 	    = $this->extraerDatos($arrayDatos,'numeroPuerta');
			$this->apartamento		    = $this->extraerDatos($arrayDatos,'apartamento');
			$this->fechaAsignacion 	    = $this->extraerDatos($arrayDatos,'fechaAsignacion');
			$this->fechaHoraEntrega	    = $this->extraerDatos($arrayDatos,'fechaHoraEntrega');
			$this->estado 	            = $this->extraerDatos($arrayDatos,'estado');
	
		}

		
		public function ingresar(){


			if($this->fechaAsignacion == ""){
				$this->fechaAsignacion = NULL;
			}

			if($this->fechaHoraEntrega == ""){
				$this->fechaHoraEntrega = NULL;
			}

			
			$sqLInsert = "INSERT envio SET
							id_cliente					= :id_cliente,
							id_usuario					= :id_usuario,
							codigoEnvio					= :codigoEnvio,
							fechaRecepcion		        = :fechaRecepcion,
							nombreDestinatario	        = :nombreDestinatario,
							telefonoDestinatario	    = :telefonoDestinatario,
							id_ciudad					= :id_ciudad,
							calle 		                = :calle,
							numeroPuerta			    = :numeroPuerta,
							apartamento		        	= :apartamento,
							estado				        = 'Pendiente'";
	
			$arraySql = array(
						"id_cliente"			=> $this->id_cliente,
						"id_usuario"			=> $this->id_usuario,
						"codigoEnvio"			=> $this->codigoEnvio,
						"fechaRecepcion"		=> $this->fechaRecepcion, 
						"nombreDestinatario"	=> $this->nombreDestinatario,
						"telefonoDestinatario"	=> $this->telefonoDestinatario,
						"calle"		            => $this->calle,
						"numeroPuerta"		    => $this->numeroPuerta,
						"id_ciudad"				=> $this->id_ciudad,
						"apartamento"		    => $this->apartamento,
						
			);
	
			$retorno = $this->imputarCambio($sqLInsert, $arraySql);
			return $retorno;
				
	
		}

		public function listarEnvios($arrayFiltros  = array()){
	
			$sql = "SELECT
						e.id AS id,
						e.codigoEnvio AS codigoEnvio,
						u.nombreUsuario AS usuario,
						CONCAT(c.nombre, c.apellido) AS nombreCliente,
						e.fechaRecepcion AS fechaRecepcion,
						ci.ciudad AS ciudadDestinatario,
						e.fechaHoraEntrega AS fechaHoraEntrega,
						e.estado AS estado
					FROM envio e
    				INNER JOIN clientes c ON c.id = e.id_cliente
    				INNER JOIN usuarios u ON u.id = e.id_usuario
					INNER JOIN ciudades ci ON ci.id = e.id_ciudad
					WHERE e.estado != ''";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (e.codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}
	
			$sql .= " ORDER BY estado asc ";

			$arraySql= array();

			if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

                $origen = ($arrayFiltros ['pagina'] -1) * $arrayFiltros['totalRegistro'];
                      
                $sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
                 
             }
			
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

	   
			
		public function cargar($idEnvio){

			$sql = "SELECT * FROM envio 
					WHERE id = :id";
	
	
			$arrayDatos = array();
			$arrayDatos ['id'] = $idEnvio;
	
			$respuesta = $this->cargarDatos($sql, $arrayDatos);
			
			foreach($respuesta as $envio){
				$this->id 						=$envio['id'];		 
				$this->codigoEnvio 				=$envio['codigoEnvio'];
				$this->nombreDestinatario 		=$envio['nombreDestinatario'];
				$this->telefonoDestinatario 	=$envio['telefonoDestinatario'];
				$this->calle 					=$envio['calle'];
				$this->numeroPuerta 			=$envio['numeroPuerta'];
				$this->apartamento 				=$envio['apartamento'];
				$this->estado 					=$envio['estado'];
			}
		
	

		}

		public function editar(){

			
			$sqlInsert = "UPDATE envio SET
							nombreDestinatario 		= :nombreDestinatario,
							telefonoDestinatario 	= :telefonoDestinatario,
							id_ciudad				= :id_ciudad,
							calle					= :calle,
							numeroPuerta 			= :numeroPuerta,
							apartamento 			= :apartamento
							WHERE id = :id";
	
			$arraySql = array(
							"nombreDestinatario" 	=> $this->nombreDestinatario,
							"telefonoDestinatario" 	=> $this->telefonoDestinatario,
							"id_ciudad"				=> $this->id_ciudad,
							"calle" 				=> $this->calle,
							"numeroPuerta"			=> $this->numeroPuerta,
							"apartamento" 			=> $this->apartamento,
							"id" 					=> $this->id,
						);
	
			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;
	
		}
	
	
		public function borrar(){
	
	
			$sqlInsert = "UPDATE envio SET estado = 'Borrado'
							WHERE id = :id";	

			$arraySql = array(
							"id" => $this->id,
						);
			
			
			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;
		}


		public function rastrear($arrayFiltros  = array()){
            
			$sql = "SELECT
						e.id AS id,
						e.codigoEnvio AS codigoEnvio,
						CONCAT(c.nombre, '', c.apellido) AS nombreCliente,
						e.nombreDestinatario AS nombreDestinatario,
						e.fechaRecepcion AS fechaRecepcion,
						CONCAT(ci.ciudad, '-', ci.departamento) AS direccionDestinatario,
						e.estado AS estado
					FROM envio e
					INNER JOIN clientes c ON c.id = e.id_cliente
					INNER JOIN ciudades ci ON ci.id = e.id_ciudad
					WHERE e.codigoEnvio = :codigoBusqueda";
            
            $arrayDatos = array(
							"codigoBusqueda"	=>$arrayFiltros['busqueda'],
			); 
			
		    $retorno = $this->cargarDatos($sql, $arrayDatos);
		    return $retorno;
	
		}
	
		
		public function listarpendientes($arrayFiltros  = array()){
	
			$sql = "SELECT
						e.id AS id,
						e.codigoEnvio AS codigoEnvio,
						u.nombreUsuario AS usuario,
						CONCAT(c.nombre, c.apellido) AS nombreCliente,
						e.fechaRecepcion AS fechaRecepcion,
						ci.ciudad AS ciudadDestinatario,
						ci.departamento AS departamentoDestinatario
					FROM envio e
    				INNER JOIN clientes c ON c.id = e.id_cliente
    				INNER JOIN usuarios u ON u.id = e.id_usuario
					INNER JOIN ciudades ci ON ci.id = e.id_ciudad
					WHERE e.estado = 'Pendiente'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (e.codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}
	
			$arraySql= array();

			if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

                $origen = ($arrayFiltros ['pagina'] -1) * $arrayFiltros['totalRegistro'];
                      
                $sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
                 
             }
			
			$retorno = $this->cargarDatos($sql, $arraySql);
			return $retorno;
	
		}

		public function listarReparto($arrayDatos  = array()){
	
			$sql = "SELECT
						e.id AS id,
						e.codigoEnvio AS codigoEnvio,
						u.nombreUsuario AS usuario,
						CONCAT(c.nombre, c.apellido) AS nombreCliente,
						e.nombreDestinatario AS nombreDestinatario,
						e.calle AS calle,
						e.numeroPuerta AS numeroPuerta, 
						e.apartamento AS apartamento,
						ci.ciudad AS ciudadDestinatario,
						ci.departamento AS departamentoDestinatario
					FROM envio e
    				INNER JOIN clientes c ON c.id = e.id_cliente
    				INNER JOIN usuarios u ON u.id = e.id_usuario
					INNER JOIN ciudades ci ON ci.id = e.id_ciudad
					WHERE e.estado = 'Reparto'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
				$sql .= " AND (e.codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}
	
			$arraySql= array();

			if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

				$origen = ($arrayFiltros ['pagina'] -1) * $arrayFiltros['totalRegistro'];
					
				$sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
				
			}
				
			$retorno = $this->cargarDatos($sql, $arraySql);
			return $retorno;
		
		}

		public function listarentregados($arrayFiltros  = array()){
	
			$sql = "SELECT
						e.id AS id,
						e.codigoEnvio AS codigoEnvio,
						u.nombreUsuario AS usuario,
						CONCAT(c.nombre, c.apellido) AS nombreCliente,
						e.fechaRecepcion AS fechaRecepcion,
						e.fechaHoraEntrega AS fechaHoraEntrega,
						ci.ciudad AS ciudadDestinatario,
						ci.departamento AS departamentoDestinatario
					FROM envio e
    				INNER JOIN clientes c ON c.id = e.id_cliente
    				INNER JOIN usuarios u ON u.id = e.id_usuario
					INNER JOIN ciudades ci ON ci.id = e.id_ciudad
					WHERE e.estado = 'Entregado'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}
	
			$arraySql= array();

			if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

                $origen = ($arrayFiltros ['pagina'] -1) * $arrayFiltros['totalRegistro'];
                      
                $sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
                 
             }
			
			$retorno = $this->cargarDatos($sql, $arraySql);
			return $retorno;
	
		}

		public function totalRegistros($arrayFiltros = array()){
    
            $sql = "SELECT count(id) as total FROM envio
                        WHERE estado != 'Borrado'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
				$sql .= " AND (codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}

            $arrayDatos = array(
			);
           
			$retorno = 0;

            $respuesta = $this->cargarDatos($sql, $arrayDatos);
            foreach($respuesta as $total){
                $retorno = $total['total'];
            }

            return $retorno;

        }


		public function totalRegistrosPendientes($arrayFiltros = array()){
    
            $sql = "SELECT count(id) as total FROM envio
                        WHERE estado = 'Pendiente'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
				$sql .= " AND (codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}

            $arrayDatos = array(
			);
           
			$retorno = 0;

            $respuesta = $this->cargarDatos($sql, $arrayDatos);
            foreach($respuesta as $total){
                $retorno = $total['total'];
            }

            return $retorno;

        }

		public function totalRegistrosReparto($arrayFiltros = array()){
    
            $sql = "SELECT count(id) as total FROM envio
                        WHERE estado = 'Reparto'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
				$sql .= " AND (codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}

            $arrayDatos = array(
			);
           
			$retorno = 0;

            $respuesta = $this->cargarDatos($sql, $arrayDatos);
            foreach($respuesta as $total){
                $retorno = $total['total'];
            }

            return $retorno;

        }

		public function totalRegistrosEntregados($arrayFiltros = array()){
    
            $sql = "SELECT count(id) as total FROM envio
                        WHERE estado = 'Entregado'";

			if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
				$sql .= " AND (codigoEnvio LIKE ('%".$arrayFiltros['busqueda']."%')) ";
			}

            $arrayDatos = array(
			);
           
			$retorno = 0;

            $respuesta = $this->cargarDatos($sql, $arrayDatos);
            foreach($respuesta as $total){
                $retorno = $total['total'];
            }

            return $retorno;

        }

	

		public function estadoReparto(){

			
			$sqlInsert = "UPDATE envio SET
							fechaAsignacion	= :fechaAsignacion,
							estado			='Reparto'
							WHERE id = :id";

			
			$arraySql = array(
						"fechaAsignacion" 		=> $this->fechaAsignacion,
						"id" 					=> $this->id,
					);

			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;

		}

		public function estadoEntregado(){
			
			$sqlInsert = "UPDATE envio SET
							fechaHoraEntrega 	= :fechaHoraEntrega,
							estado				='Entregado'
							WHERE id = :id";

			$fechaEntrega = date('Y-m-d'." ".$this->fechaHoraEntrega);
			$nuevaFecha = strtotime ($fechaEntrega);
			$nuevaFecha = date ( 'Y-m-d H:i:s' , $nuevaFecha);

			$arraySql = array(
						"fechaHoraEntrega" 		=> $nuevaFecha,
						"id" 					=> $this->id,
					);

			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;

		}

		public function estadoPendiente(){

			
			$sqlInsert = "UPDATE envio SET
							fechaAsignacion = :fechaAsignacion,
							estado			='Pendiente'
							WHERE id = :id";

			$arraySql = array(
						"fechaAsignacion" 		=> NULL,
						"id" 					=> $this->id,
					);

			$retorno = $this->imputarCambio($sqlInsert, $arraySql);
			return $retorno;

		}
	}