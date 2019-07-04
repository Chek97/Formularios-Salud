<?php 
	//Creamos la clase conexion
	class Conectar{

		//Definimos el codigo de conexion siguiendo la libreria PDO
		public static function BD(){

		 try{
			//Variable conexion
			$conexion = new PDO('mysql:host=localhost; dbname=formulario', 'adminform', 'admin1');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET UTF8");

			}catch(Exception $e){
			die('error' . $e->getMessage());
			echo "Linea del error" . $e->getLine();
			}
		//Regresamos la variable con todas las conexiones
		return $conexion;	
		}
		
	}

 ?>