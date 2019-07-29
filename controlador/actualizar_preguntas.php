<?php 

	include("../modelo/preguntas_modelo.php");
	include("../modelo/formularios_modelo.php");
	include("../modelo/opciones_modelo.php");

	$oPregunta = new Preguntas();
	$oOpciones = new Opciones();
	$oFormulario = new Formulario_modelo();	

	$idForm = $_GET['id'];


	$totalPreguntas = $oPregunta->obtenerId($idForm);
	$contar = 0;
	$contar1 = 0;

	foreach ($totalPreguntas as $tp) {
			if($tp['tipo'] == "seleccion" || $tp['tipo'] == "seleccion"){
				$totalOpciones = $oOpciones->obtenerOpciones($tp['idPreguntas']);
				foreach ($totalOpciones as $to) {
					if($oOpciones->ActualizarOpcion($_POST[$contar1], $to['idOpcion']) == true){
						echo "Se actalizo la opcion";
					}
					$contar1++;
					
				}
				if ($oPregunta->actualizarPregunta($_POST[$contar], $tp['idPreguntas']) == true) {
					echo "Se actualizo la pregunta";

				}
				$contar++;
			}else{
				if ($oPregunta->actualizarPregunta($_POST[$contar], $tp['idPreguntas']) == true) {
					echo "Se actualizo la pregunta";

				}

			}
			$contar++;
		
	}









 ?>