<?php 
	//Creamos la clase conexion
	class Conectar{

		//Definimos el codigo de conexion siguiendo la libreria PDO
		public static function BD(){

		 try{
			//Variable conexion que tiene todos los datos, la usaremos en todo el proyecto adminform admin1
			$conexion = new PDO('mysql:host=localhost; dbname=formulario', 'root', '');

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