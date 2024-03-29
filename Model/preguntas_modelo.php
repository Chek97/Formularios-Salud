<?php 

	class Preguntas{

		private $db;
		private $listaPregunta;

		public function __construct(){
			//llamamos la conexion
			require_once('../../Model/conexion.php');

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

			$lis = array();

			if($instruccion3->rowCount()){
				while ($fila = $instruccion3->fetch(PDO::FETCH_ASSOC)) {
				
				$lis[] = $fila;
				}

			}else{
				return false;
			}
			return $lis;
		}

		public function borrarPregunta($id){

			$instruccion4 = $this->db->query("DELETE FROM preguntas WHERE idPreguntas='$id'");

			if($instruccion4->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function actualizarPregunta($nom, $id){

			$instruccion5 = $this->db->query("UPDATE preguntas set textoPregunta='nom' WHERE idPreguntas='$id'");

			if($instruccion5->rowCount()){
				return true;
			}else{
				return false;
			}

		}

	}
















 ?>