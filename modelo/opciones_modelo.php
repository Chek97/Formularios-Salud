<?php 

	class opciones{

		private $db;
		private $listaOpciones;

		public function __construct(){
			//llamamos la conexion
			require_once('../modelo/conexion.php');

			$this->db=Conectar::BD();

			$this->listaOpciones=array();

		}

		

	}






 ?>