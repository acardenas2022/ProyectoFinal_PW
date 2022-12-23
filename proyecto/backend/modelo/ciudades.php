<?php

	require_once("modelo/generico.php");

	class ciudades extends generico{

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


		public function listar($arrayFiltros  = array()){
            

			$sql = "SELECT * FROM ciudades
						WHERE estado = 1";
	

            if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
                $sql .= " AND (departamento LIKE ('%".$arrayFiltros['busqueda']."%')) ";
            }

            $sql .= " ORDER BY departamento asc ";

            $arrayDatos = array(); 
            
            if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

                $origen = ($arrayFiltros ['pagina'] -1) * $arrayFiltros['totalRegistro'];
                      
                $sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
                 
             }
          
			
		    $retorno = $this->cargarDatos($sql, $arrayDatos);
		    return $retorno;
	
		}

        public function totalRegistros($arrayFiltros = array()){
    
            $sql = "SELECT count(id) as total FROM ciudades 
                        WHERE estado = 1";

            if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
                $sql .= " AND (departamento LIKE ('%".$arrayFiltros['busqueda']."%')) ";
            }

            $arrayDatos = array();
            $retorno = 0;

            $respuesta = $this->cargarDatos($sql, $arrayDatos);
            foreach($respuesta as $total){
                $retorno = $total['total'];
            }

            return $retorno;

            }
	
	
	}