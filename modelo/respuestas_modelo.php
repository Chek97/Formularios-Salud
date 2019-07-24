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

		public function borrarRespuesta($id){

			$instruccion3 = $this->db->query("DELETE FROM respuestas WHERE idRespuesta='$id'");

			if($instruccion3->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function obtenerRespuestasUsuario($id){
			$instruccion4 = $this->db->query("SELECT * from respuestas WHERE usuarioi='$id'");

			$listRespuestas1 = array();

			if($instruccion4->rowCount()){
				while ($fila = $instruccion4->fetch(PDO::FETCH_ASSOC)) {
				
				$listRespuestas1[] = $fila;
				}

			}else{
				return false;
			}
			return $listRespuestas1;

		}

				

	}

 ?>