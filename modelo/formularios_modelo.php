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

		public function crearFormulario($titulo, $descricpion, $session){

			$instruccion1 = $this->db->query("INSERT INTO formularios VALUES(NULL, '$titulo', '$descricpion', '0', '0', '$session')");

			if($instruccion1->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function obtenerFormulariospropios($session){
			$instruccion2 = $this->db->query("SELECT * FROM formularios WHERE usuario='$session'");

			if($instruccion2->rowCount()){
				while ($fila = $instruccion2->fetch(PDO::FETCH_ASSOC)) {
				
				$this->formularios[] = $fila;
				}

			}else{
				return false;
			}
			return $this->formularios;

		}

		public function informacionFormulario($titulo){
			$instruccion3 = $this->db->query("SELECT * FROM formularios WHERE nombre='$titulo'");

			if($instruccion3->rowCount()){
				while ($fila = $instruccion3->fetch(PDO::FETCH_ASSOC)) {
				
				$this->formularios[] = $fila;
				}

			}else{
				return false;
			}
			return $this->formularios;

		}

		public function actualizarFormulario($titulo, $descripcion, $form){
			$instruccion4 = $this->db->query("UPDATE formularios SET nombre='$titulo', descripcion='$descripcion' WHERE idFormularios='$form'");

			if($instruccion4->rowCount()){
				return true;
			}else{
				return false;
			}
		}

	}



 ?>