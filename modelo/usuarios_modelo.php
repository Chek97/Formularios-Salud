<?php 

	class Usuarios_modelo{

		//Variables 

		private $db;
		private $usuarios;

		//Constructor
		public function __construct(){
			//llamamos la conexion
			require_once('../modelo/conexion.php');

			$this->db=Conectar::BD();

			$this->usuarios=array();

		}

		//Metodo get
		public function get_usuarios($empezar, $tamaño){

			$consulta = $this->db->query("SELECT * FROM usuario LIMIT $empezar,$tamaño");

			while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
				
				$this->usuarios[] = $fila;
			}

			return $this->usuarios;
		}

		public function get_id($usuario){

			$consulta1 = $this->db->query("SELECT * from usuario WHERE usuario='$usuario'");

			$resultado = $consulta1->fetch(PDO::FETCH_ASSOC);

			return $resultado['idUsuario']; 
		}

		public function obtener_usuario($nombre){
			$consulta2 = $this->db->query("SELECT * FROM usuario WHERE usuario='$nombre'");

			while ($filas = $consulta2->fetch(PDO::FETCH_ASSOC)) {
				
				$this->usuarios[] = $filas;
			}

			return $this->usuarios;
		}

		public function actualizarUsuarios($id, $nom, $ape, $corr, $cel, $cont, $fec){

			$consulta3 = $this->db->query("UPDATE usuario SET nombre='$nom', apellido='$ape', correo='$corr', celular='$cel', contraseña='$cont', fecha='$fec' WHERE idUsuario='$id'");

			if($consulta3->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function crearUsuario($usu, $nom, $ape, $corr, $cel, $cont, $fec, $sex){

			$consulta4 = $this->db->query("INSERT INTO usuario VALUES(NULL,'$usu','$nom','$ape','$corr','$cel','$cont','$fec','$sex','')");

			if($consulta4->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function obtenerUltimos4(){
			$instruccion5 = $this->db->query("SELECT * FROM usuario GROUP BY idUsuario DESC LIMIT 4");

			$usuarios5 = array();

			if($instruccion5->rowCount()){
				while ($reg = $instruccion5->fetch(PDO::FETCH_ASSOC)) {
				
				$usuarios5[] = $reg;
				}

			}else{
				return false;
			}
			return $usuarios5;
		}

		public function obtenerUsu(){

			$consulta9 = $this->db->query("SELECT * FROM usuario");

			if($consulta9->rowCount()){
				return $consulta9->rowCount();
				

			}else{
				return false;
			}

		}

		public function borrarUsuario($id){

			$instruccion6 = $this->db->query("DELETE FROM usuario WHERE idUsuario='$id'");

			if($instruccion6->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function validarUsuario($usu){

			$instruccion7 = $this->db->query("SELECT * FROM usuario WHERE usuario='$usu'");

			if($instruccion7->rowCount()){
				return true;
			}else{
				return false;
			}

		}

	}








 ?>