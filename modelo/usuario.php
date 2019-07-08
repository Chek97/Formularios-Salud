<?php

    require_once('../modelo/conexion.php');
	//Creamos la clase usuario

	class Usuario extends Conectar{

		private $nombre;
		private $usuario;
		private $db;

		public function __construct(){
			//llamamos la conexion

			$this->db=Conectar::BD();

		}		


		public function usuarioExiste($user, $pass){

			$consulta = $this->db->query("SELECT * FROM usuario WHERE usuario='$user' AND contraAdmin='$pass'");

			if($consulta->rowCount()){
				return true;

			}else{
				return false;
			}
		}

		public function existe($user, $pass){

			$consulta = $this->db->query("SELECT * FROM usuario WHERE usuario='$user' AND contraseña='$pass'");

			if($consulta->rowCount()){
				return true;

			}else{
				return false;
			}
		}

		public function setUsuario($user){
			$query = $this->db->query("SELECT * FROM usuario WHERE usuario='$user'");

			foreach ($query as $reg) {
				
				$this->$nombre = $reg['nombre'];
				$this->$usuario = $reg['usuario'];
			}
		}

		public function getNombre(){
			return $this->nombre;
		}
	}

 ?>