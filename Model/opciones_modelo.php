<?php 

	class Opciones{

		private $db;
		private $listaOpciones;

		public function __construct(){
			//llamamos la conexion
			require_once('../../Model/conexion.php');

			$this->db=Conectar::BD();

			$this->listaOpciones=array();

		}

		public function crearOpciones($texto, $idPregunta){

			$instruccion1 = $this->db->query("INSERT INTO opciones VALUES(NULL, '$texto', '$idPregunta')");

			if($instruccion1->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function obtenerOpciones($id){
			$instruccion2 = $this->db->query("SELECT * from opciones WHERE pregunta='$id'");

			$listOpciones = array();

			if($instruccion2->rowCount()){
				while ($fila = $instruccion2->fetch(PDO::FETCH_ASSOC)) {
				
				$listOpciones[] = $fila;
				}

			}else{
				return false;
			}
			return $listOpciones;

		}

		public function borrarOpcion($id){

			$instruccion3 = $this->db->query("DELETE FROM opciones WHERE idOpcion='$id'");

			if($instruccion3->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function ActualizarOpcion($text, $id){

			$instruccion4 = $this->db->query("UPDATE opciones SET texto='$text' WHERE idOpcion='$id'");

			if($instruccion4->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		

	}






 ?>