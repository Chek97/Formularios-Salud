<?php 

	require_once("../modelo/preguntas_modelo.php");
	include_once("../modelo/opciones_modelo.php");
	include_once("../modelo/respuestas_modelo.php");
	include_once("../modelo/formularios_modelo.php");


	$oPreguntas = new Preguntas();
	$oOpciones = new Opciones();
	$obFormularios = new Formulario_modelo();
	$oRespuestas = new Respuestas();

	$idFormulario = $_GET['id'];
	$numeroPreguntas = $_GET['preguntas'];

	if($numeroPreguntas == 0){
		if($obFormularios->borrarFormulario($idFormulario) == true){
			echo "El formulario fue borrado";
			include_once("../vista/vista_encuestador_formularios.php");
		}else{
			echo "No fue borrado";
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

				if ($oRespuestas->obtenerRespuestas($preg['idPreguntas']) != null) {
					echo "--Hay respuestas--";
				}else{
					
				}

				if($oPreguntas->borrarPregunta($preg['idPreguntas']) == true){
					echo "Se borro la pregunta";
					echo "<br>";
				}else{
					echo "No se borro la pregunta";
					echo "<br>";
				}
				
			}else{
				echo $preg['textoPregunta'];
				echo "<br>";
			
			}
		}
	}




 ?>