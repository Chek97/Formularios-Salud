<?php 

	class Formulario_modelo{

		private $db;
		private $formularios;
		private $preguntas;

		public function __construct(){
			//llamamos la conexion
			require_once('../../Model/conexion.php');

			$this->db=Conectar::BD();

			$this->formularios=array();

		}

		//Metodo get
		public function get_formularios($empezar, $tamaño){

			$consulta = $this->db->query("SELECT * FROM formularios LIMIT $empezar, $tamaño");

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

		public function getPreguntas($id){

			$instruccion5 = $this->db->query("SELECT * from formularios WHERE idFormularios='$id'");

			$resultado = $instruccion5->fetch(PDO::FETCH_ASSOC);

			return $this->preguntas = $resultado['numeroPregunta'];
		}

		public function setNumeroPregunta($valor, $id){

			$this->preguntas = $valor;

			$instruccion6 = $this->db->query("UPDATE formularios SET numeroPregunta='$this->preguntas' WHERE idFormularios='$id'");

			if($instruccion6->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function obtenerUltimos4(){
			$instruccion7 = $this->db->query("SELECT * FROM formularios GROUP BY idFormularios DESC LIMIT 4");

			$usuarios4 = array();

			if($instruccion7->rowCount()){
				while ($reg = $instruccion7->fetch(PDO::FETCH_ASSOC)) {
				
				$usuarios4[] = $reg;
				}

			}else{
				return false;
			}
			return $usuarios4;
		}

		public function borrarFormulario($id){

			$instruccion8 = $this->db->query("DELETE FROM formularios WHERE idFormularios='$id'");

			if($instruccion8->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function obtenerForms(){

			$consulta9 = $this->db->query("SELECT * FROM formularios");

			if($consulta9->rowCount()){
				return $consulta9->rowCount();
				

			}else{
				return false;
			}

		}

		public function obtenerPropios4($user){
			$instruccion9 = $this->db->query("SELECT * FROM formularios WHERE usuario='$user' GROUP BY idFormularios DESC LIMIT 4 ");

			$usuarios5 = array();

			if($instruccion9->rowCount()){
				while ($reg = $instruccion9->fetch(PDO::FETCH_ASSOC)) {
				
				$usuarios5[] = $reg;
				}

			}else{
				return false;
			}
			return $usuarios5;
		}

		public function obtenerForms1($user){

			$consulta10 = $this->db->query("SELECT * FROM formularios WHERE usuario='$user'");

			if($consulta10->rowCount()){
				return $consulta10->rowCount();
				

			}else{
				return false;
			}

		}

	}



 ?>