<?php 

	require_once("../modelo/formularios_modelo.php");

	$oFormularios = new Formulario_modelo();

	if($oFormularios->get_formularios()==false){
		echo "No hay datos que mostrar";
	}else{
		echo "Si hay formularios"; 
	}

	require_once("../vista/vista_encuestador_formularios.php");


 ?>