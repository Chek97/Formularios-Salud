<?php 

	require_once("../Model/preguntas_modelo.php");
	include_once("../Model/opciones_modelo.php");
	include_once("../Model/respuestas_modelo.php");
	include_once("../Model/Forms/forms.php");


	$oPreguntas = new Preguntas();
	$oOpciones = new Opciones();
	$obFormularios = new Formulario_modelo();
	$oRespuestas = new Respuestas();

	$idFormulario = $_GET['id'];
	$numeroPreguntas = $_GET['preguntas'];

	if($numeroPreguntas == 0){
		if($obFormularios->borrarFormulario($idFormulario) == true){
			echo "<div class='alert alert-info' style='margin-bottom: none;'>El formulario fue borrado</div>";
			include_once("../View/PollsterFormPage");
		}else{
			echo "<script>alert('los datos no se cambiaron correctamente, seguro recargaste la pagina por error, porfa intentalo otra vez')</script>";
		}
	}else{

		$preguntasTotal = $oPreguntas->obtenerId($idFormulario);

		foreach ($preguntasTotal as $preg ) {
			if($preg['tipo'] == "seleccion" || $preg['tipo'] == "verificar"){
				$opc = $oOpciones->obtenerOpciones($preg['idPreguntas']);
				echo $preg['textoPregunta'];
				echo "<br>";
				foreach ($opc as $o ) {
					if($oOpciones->borrarOpcion($o['idOpcion']) == true){
						echo "Se borro la opcion";
						echo "<br>";
							
					}else{
						echo "No se borro la opcion";
						echo "<br>";
					}
				}

				if($oRespuestas->obtenerRespuestas($preg['idPreguntas']) != null){
					$oR1 = $oRespuestas->obtenerRespuestas($preg['idPreguntas']);
					foreach ($oR1 as $lr1) {
						if($oRespuestas->borrarRespuesta($lr1['idRespuesta']) == true){
							echo "Se borro la respuesta";
							echo "<br>";
						}else{
							echo "No se borro la respuesta";
							echo "<br>";
						}
					}
				}else{
					echo "No hay respuestas";
					echo "<br>";
				}

				//if($oPreguntas->borrarPregunta($preg['idPreguntas']) == true){
				//	echo "Se borro la pregunta";
				//	echo "<br>";
				//}else{
				//	echo "No se borro la pregunta";
				//	echo "<br>";
				//}
				
			}else{

				if($oRespuestas->obtenerRespuestas($preg['idPreguntas']) != null){
					$oR = $oRespuestas->obtenerRespuestas($preg['idPreguntas']);
					foreach ($oR as $lr) {
						if($oRespuestas->borrarRespuesta($lr['idRespuesta']) == true){
							echo "Se borro la respuesta";
							echo "<br>";
						}else{
							echo "No se borro la respuesta";
							echo "<br>";
						}
					}
				}else{
					echo "No hay respuestas";
					echo "<br>";
				}

				//DEBE IR AFUERA PARA QUE SOLO BORRE PREGUNTAS CUANDO YA HAYA SIDO BORRADAS LAS RESPUESTAS

				


			
			}
		if($oPreguntas->borrarPregunta($preg['idPreguntas']) == true){
					echo "La pregunta fue borrada";
					echo "<br>";
				}else{
					echo "La pregunta no se borro";
					echo "<br>";
				}	

		}


		if($obFormularios->borrarFormulario($idFormulario) == true){
					echo "el formulario sin preguntas fue borrado";
					header("location: ../View/PollsterFormPage");
					echo "<br>";
				}else{
					echo "<div class='alert alert-warning'>El formulario no fue borrado</div>";
					include_once("../View/PollsterFormPage");
					
		}
	}

 ?>