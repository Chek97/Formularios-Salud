<?php 

	class Usuarios_modelo{

		//Variables 

		private $db;
		private $usuarios;

		//Constructor
		public function __construct(){
			//llamamos la conexion
			require_once('modelo/conexion.php');

			$this->db=Conectar::BD();

			$this->usuarios=array();

		}

		//Metodo get
		public function get_usuarios(){

			$consulta = $this->db->query("SELECT * FROM usuario");

			while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
				
				$this->usuarios[] = $fila;
			}

			return $this->usuarios;
		}

	}








 ?>