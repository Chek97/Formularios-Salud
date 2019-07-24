<?php 
	require_once("../modelo/usuarios_modelo.php");
	include_once("../modelo/formularios_modelo.php");
	include_once("../modelo/preguntas_modelo.php");
	include_once("../modelo/opciones_modelo.php");
	include_once("../modelo/respuestas_modelo.php");
	include_once("../modelo/session.php");


	$objUsuario = new Usuarios_modelo();
	$objFormulario = new Formulario_modelo();
	$objPregunta = new Preguntas();
	$objOpciones = new Opciones();
	$objRespuestas = new Respuestas();
	$objSesion = new Session();


	$idUsuario = $_GET['id'];
	//$se = $objSesion->getSession();
	
	//Preguntamos si el usuario tiene formularios

	if($objFormulario->obtenerFormulariospropios($idUsuario) != null){
		



	}else{
		if($objRespuestas->obtenerRespuestasUsuario($idUsuario) != null){
			echo "Hay Respuestas";
		}else{
			echo "No hay repsuestas";
		}
	}






















 ?>