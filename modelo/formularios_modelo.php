<?php 

	class Formulario_modelo{

		private $db;
		private $formularios;

		public function __construct(){
			//llamamos la conexion
			require_once('../modelo/conexion.php');

			$this->db=Conectar::BD();

			$this->formularios=array();

		}

		//Metodo get
		public function get_formularios(){

			$consulta = $this->db->query("SELECT * FROM formularios");

			if($consulta->rowCount()){
				while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
				
				$this->formularios[] = $fila;
				}

			}else{
				return false;
			}
			return $this->formularios;
			
		}


	}



 ?>