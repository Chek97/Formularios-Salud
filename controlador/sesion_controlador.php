<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">	

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<?php 

	include_once "../modelo/usuario.php";
	include_once "../modelo/session.php";

	$sessionUsuario = new Session();
	$usuario = new Usuario();


	if(isset($_POST['Ingresar1'])){
		$valorUsuario1 = $_POST['userAdmin'];
		$valorContraseña1 = $_POST['passAdmin'];

		if($usuario->usuarioExiste($valorUsuario1, $valorContraseña1)){
			$sessionUsuario = new Session();
			$sessionUsuario->setSession($valorUsuario1);
			$usuario->setUsuario($valorUsuario1);

			header("location: ../vista/vista_administrador.php");
		}else{
			echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
			header("location: ../index.php?error=true");
		}

	}else if (isset($_POST['Ingresar2'])) {
		$valorUsuario2 = $_POST['userEncu'];
		$valorContraseña2 = $_POST['passEncu'];

		if($usuario->existe($valorUsuario2, $valorContraseña2)){
			
			$sessionUsuario->setSession($valorUsuario2);
			$usuario->setUsuario($valorUsuario2);

			header("location: ../vista/vista_encuestador.php");
		}else{
			echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
			header("location: ../index.php?error=true");
		}
	}else if (isset($_POST['Ingresar3'])) {
		$valorUsuario3 = $_POST['userUsu'];
		$valorContraseña3 = $_POST['passUsu'];

		if($usuario->existe($valorUsuario3, $valorContraseña3)){
			
			$sessionUsuario->setSession($valorUsuario3);
			$usuario->setUsuario($valorUsuario3);

			header("location: ../vista/vista_usuarios.php");
		}else{
			header("location: ../index.php?error=true");
		}
	}

	//$ses = $sessionUsuario->getSession();

	//if(isset($ses)){
	//	echo "Hay sesion";
	//}else{
	//	echo "No hay sesion";
	//}

	
 ?>


