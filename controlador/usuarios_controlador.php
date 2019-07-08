<?php 

	require_once('../modelo/usuarios_modelo.php');

	$oUsuarios = new usuarios_modelo();

	$listaUsuarios = $oUsuarios->get_usuarios();

	require_once('../vista/vista_admin_usuario.php');


 ?>