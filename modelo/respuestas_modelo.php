<?php 

	class Respuestas{

		private $db;

		public function __construct(){
			//llamamos la conexion
			require_once('../modelo/conexion.php');

			$this->db=Conectar::BD();


		}

		public function insertarRespuestas($respuesta, $pregunta, $usuario){

			$instruccion1 = $this->db->query("INSERT INTO respuestas VALUES(NULL, '$respuesta', '$usuario','$pregunta')");

			if($instruccion1->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function obtenerRespuestas($id){
			$instruccion2 = $this->db->query("SELECT * from respuestas WHERE preguntai='$id'");

			$listRespuestas = array();

			if($instruccion2->rowCount()){
				while ($fila = $instruccion2->fetch(PDO::FETCH_ASSOC)) {
				
				$listRespuestas[] = $fila;
				}

			}else{
				return false;
			}
			return $listRespuestas;

		}

				

	}

 ?>