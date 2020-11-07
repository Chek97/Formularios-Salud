<?php 

	//Requires Files
	include_once('../../Config/routesConfig.php');
	require_once('../../Model/User/user.php');
	require_once('../../Model/Session/session.php');

	//Create Objects
	$sessionUsuario = new Session();
	$usuario = new Usuario();

	/**
		Validate Login as Type of User	
	**/
	if(isset($_POST['Ingresar1'])){

		$valorUsuario1 = $_POST['userAdmin'];
		$valorContraseña1 = $_POST['passAdmin'];

		if($usuario->usuarioExiste($valorUsuario1, $valorContraseña1)){
			
			$sessionUsuario = new Session();
			$sessionUsuario->setSession($valorUsuario1);
			$usuario->setUsuario($valorUsuario1);

			header('location: ../../' . ADMIN_INDEX);

		}else{
			
			echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
			header("location: ../../index.php?error=true");
		
		}
	}else if (isset($_POST['Ingresar2'])) {
		
		$valorUsuario2 = $_POST['userEncu'];
		$valorContraseña2 = $_POST['passEncu'];

		if($usuario->existe($valorUsuario2, $valorContraseña2)){
	
			$sessionUsuario->setSession($valorUsuario2);
			$usuario->setUsuario($valorUsuario2);

			header('location: ../../' . POLLSTER_INDEX);
		
		}else{
			
			echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
			header("location: ../../index.php?error=true");
		
		}
	}else if (isset($_POST['Ingresar3'])) {
		
		$valorUsuario3 = $_POST['userUsu'];
		$valorContraseña3 = $_POST['passUsu'];

		if($usuario->existe($valorUsuario3, $valorContraseña3)){
			
			$sessionUsuario->setSession($valorUsuario3);
			$usuario->setUsuario($valorUsuario3);

			header('location: ../../' . USER_INDEX);
		
		}else{
			
			header("location: ../../index.php?error=true");
		}
	}	
 ?>