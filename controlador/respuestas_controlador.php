<?php 

	require_once("../modelo/respuestas_modelo.php");
	include_once("../modelo/opciones_modelo.php");
	require_once("../controlador/preguntas_controlador.php");

	$objRespuestas = new Respuestas();
	$objOpciones = new Opciones();
 


	$totalPreguntas = $_POST['np']; //NUMERO DE PREGUNTAS
	$contador = 1;


	for ($i=1; $i <= $totalPreguntas ; $i++) { //CICLO RECORRERA LA CANTIDAD DE PREGUNTAS QUE HAY EN EL FORM
		
		if($_POST['tp'.$i] == "verificar"){
			echo "hay una pregunta de verificar". $_POST['idp'.$contador];
			echo "<br>";
			$obtener = $objOpciones->obtenerOpciones($_POST['idp'.$contador]);
			foreach ($obtener as $k ) {
				if(isset($_POST[$contador])){
					if($objRespuestas->insertarRespuestas($_POST[$contador], $_POST['idp'.$i])==true){
						echo "La respuesta fue insertada";
					}else{
						echo "La respuesta no se inserto";
					}
					//echo "Existe la opcion ". $_POST['idp'.$i];
					//echo "<br>";
				}else{
					echo "La opcion no existe";
					echo "<br>";
				}
			$contador++;
			}
			echo "<br>";

		}else if(isset($_POST[$contador])){
			if($objRespuestas->insertarRespuestas($_POST[$contador], $_POST['idp'.$i])==true){
				echo "La respuesta fue insertada";
			}else{
				echo "La respuesta no se inserto";
			}
			//echo "Esta pregunta existe". $_POST['idp'.$i];
			//echo "<br>";
			$contador++;
		}else{
			echo "No existe la pregunta";
			echo "<br>";
			$contador++;
		}

	}






 ?>