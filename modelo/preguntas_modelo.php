<?php 

	class Preguntas{

		private $db;
		private $listaPregunta;

		public function __construct(){
			//llamamos la conexion
			require_once('../modelo/conexion.php');

			$this->db=Conectar::BD();

			$this->listaPregunta=array();

		}

		public function crearPregunta($des, $req, $tip, $id){

			$instruccion1 = $this->db->query("INSERT INTO preguntas VALUES(NULL, '$des', '$tip', '$req', '$id')");

			if($instruccion1->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function getId($nom){

			$consulta1 = $this->db->query("SELECT * from preguntas WHERE textoPregunta='$nom'");

			$resultado = $consulta1->fetch(PDO::FETCH_ASSOC);

			return $resultado['idPreguntas']; 
		}

		public function obtenerId($id){
			$instruccion3 = $this->db->query("SELECT * from preguntas WHERE formulario='$id'");

			if($instruccion3->rowCount()){
				while ($fila = $instruccion3->fetch(PDO::FETCH_ASSOC)) {
				
				$this->listaPregunta[] = $fila;
				}

			}else{
				return false;
			}
			return $this->listaPregunta;
		}

		public function borrarPregunta($id){

			$instruccion4 = $this->db->query("DELETE FROM preguntas WHERE idPreguntas='$id'");

			if($instruccion4->rowCount()){
				return true;
			}else{
				return false;
			}

		}

	}
















 ?>