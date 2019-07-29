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


	$idUsuario = $_GET['id1'];
	//$se = $objSesion->getSession();
	
	//Preguntamos si el usuario tiene formularios

	if($listaFormularios1 = $objFormulario->obtenerFormulariospropios($idUsuario)){
		
		foreach ($listaFormularios1 as $rf1) {//recorremos los formularios en busca de preguntas

			if($rf1['numeroPregunta'] == 0){//si no tiene preguntas borrar el formulario
				if($objFormulario->borrarFormulario($rf1['idFormularios']) == true){
					echo "el formulario sin preguntas fue borrado";
					echo "<br>";
				}else{
					echo "<div class='alert alert-warning'>El formulario no fue borrado</div>";
					include_once("../vista/vista_admin_usuario.php");
					
				}
			}else{// si tiene preguntas recorrer cada una para saber de que tipo son
				$listaPregunta1 = $objPregunta->obtenerId($rf1['idFormularios']);
				foreach ($listaPregunta1 as $rp1) {

					if($rp1['tipo'] == "seleccion" || $rp1['tipo'] == "verificar"){ // si tiene opciones borrar cada opcion primero
						$opc = $objOpciones->obtenerOpciones($rp1['idPreguntas']);
						foreach ($opc as $o) {
							if($objOpciones->borrarOpcion($o['idOpcion']) == true){
								echo "Se borro la opcion";
								echo "<br>";
							
							}else{
								echo "No se borro la opcion";
								echo "<br>";
							}
						}

						if($objRespuestas->obtenerRespuestas($rp1['idPreguntas']) != null){
							$oR1 = $objRespuestas->obtenerRespuestas($rp1['idPreguntas']);
							foreach ($oR1 as $lr1) {
								if($objRespuestas->borrarRespuesta($lr1['idRespuesta']) == true){
									echo "Se borro la respuesta";
									echo "<br>";
								}else{
									echo "No se borro la respuesta";
									echo "<br>";
								}
							}

							if($objPregunta->borrarPregunta($rp1['idPreguntas']) == true){
								echo "La pregunta fue borrada";
								echo "<br>";
							}else{
								echo "La pregunta no se borro";
								echo "<br>";
							}

							//borrar pregunta
						}else{
							if($objPregunta->borrarPregunta($rp1['idPreguntas']) == true){
								echo "La pregunta fue borrada";
								echo "<br>";
							}else{
								echo "La pregunta no se borro";
								echo "<br>";
							}
						}



					}else{// si son abiertas se proceden a borrar
						if($objPregunta->borrarPregunta($rp1['idPreguntas']) == true){
							echo "La pregunta fue borrada";
							echo "<br>";
						}else{
							echo "La pregunta no se borro";
							echo "<br>";
						}
					}
				}//fin del ciclo pregunta

			if($objFormulario->borrarFormulario($rf1['idFormularios']) == true){
					echo "el formulario sin preguntas fue borrado";
					echo "<br>";
				}else{
					echo "<div class='alert alert-warning'>El formulario no fue borrado</div>";
					include_once("../vista/vista_admin_usuario.php");
					
				}

		}
	}	

		if($objUsuario->borrarUsuario($idUsuario) == true){
				header("location: ../vista/vista_admin_usuario.php");
		}else{
				echo "No se ha borrado el usuario";
		}	

	}else{ // si no tiene formularios pregunte si tiene respuestas
		if($objRespuestas->obtenerRespuestasUsuario($idUsuario) != null){//Si tiene respuestas se borran
			$oR2 = $objRespuestas->obtenerRespuestasUsuario($idUsuario);
			foreach ($oR2 as $lr2) {
				if($objRespuestas->borrarRespuesta($lr2['idRespuesta']) == true){
					echo "Se borro la respuesta";
					echo "<br>";
				}else{
					echo "No se borro la respuesta";
					echo "<br>";
				}
			}

			//borra los usuarios una vez haya borrado las respuestas
			if($objUsuario->borrarUsuario($idUsuario) == true){
				header("location: ../vista/vista_admin_usuario.php");
			}else{
				echo "No se ha borrado el usuario";
			}
		}else{ // si no tiene respuestas se borra el usuario
			if($objUsuario->borrarUsuario($idUsuario) == true){
				header("location: ../vista/vista_admin_usuario.php");
			}else{
				echo "No se ha borrado el usuario";
			}
			
		}
	}






















 ?>