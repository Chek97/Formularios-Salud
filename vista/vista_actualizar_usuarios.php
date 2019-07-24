<?php 

	require_once("../modelo/usuarios_modelo.php");

	$insUsuario = new Usuarios_modelo();

	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Squada+One&display=swap" rel="stylesheet"> 

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-personalizado"> 
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					<span class="icon-bar app-bar"></span>
					<span class="icon-bar app-bar"></span>
					<span class="icon-bar app-bar"></span>
				</button>
				<a href="vista_administrador.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="vista_admin_formulario.php">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="vista_admin_buscar.php">Busqueda</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="vista_acerca.php">Acerca de</a></li>
								<li><a href="vista_perfil.php">Mi perfil</a></li>
								<li><a href="../salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php 
	
		if(!isset($_POST['btnActualizar'])){

			$nombreId = $_GET['id'];

			$nombreUsuario = $_GET['usuario'];
			$nombreNombre = $_GET['nombre'];
			$nombreApellido = $_GET['apellido'];
			$nombreCorreo = $_GET['correo'];
			$nombreCelular = $_GET['celular'];
			$nombreContraseña = $_GET['contraseña'];
			$nombreFecha = $_GET['fecha'];

		}else{

			$nombreId = $_POST['actId'];

			$nombreUsuario = $_POST['actUsu'];
			$nombreNombre = $_POST['actNom'];
			$nombreApellido = $_POST['actApe'];
			$nombreCorreo = $_POST['actCorr'];
			$nombreCelular = $_POST['actCel'];
			$nombreContraseña = $_POST['actCon'];
			$nombreFecha = $_POST['actFecha'];

		}

			

		
		//$listaDatos = $insUsuario->obtener_usuario($nombreUsuario);

		//foreach ($listaDatos as $fil) {


			
		
	 ?>
	<div class="container">
		<?php 

			if(isset($_POST['btnActualizar'])){
		$inputId = $_POST['actId'];
		$inputUsuario = $_POST['actUsu'];
		$inputNombre = $_POST['actNom'];
		$inputApellido = $_POST['actApe'];
		$inputCorreo = $_POST['actCorr'];
		$inputCelular = $_POST['actCel'];
		$inputContraseña = $_POST['actCon'];
		$inputFecha = $_POST['actFecha'];

		if($insUsuario->actualizarUsuarios($inputId, $inputUsuario, $inputNombre, $inputApellido, $inputCorreo, $inputCelular, $inputContraseña, $inputFecha)==true){
			echo "<div class='alert alert-info'>Se actualizaron los datos</div>";
			header("location: vista_admin_usuario.php");
		}else{
			echo "<div class='alert alert-danger'>Algo no se actualizo o no hubo cambios que realizar</div>";
		}


	}

		 ?>
		<div class="contenedor-formulario">
			<div class="contenedor-titulo">
				<h1>Actualizar Usuario</h1>
			</div>
			<div>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="padding: 10px;">
				<div class="form-group">
					<input type="text" name="actId" class="hidden" value="<?php echo $nombreId; ?>">
				</div>	
				<div class="form-group">
					<input type="text" name="actUsu" class="form-control" value="<?php echo $nombreUsuario; ?>">
				</div>
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" name="actNom" class="form-control" value="<?php echo $nombreNombre; ?>">
				</div>
				<div class="form-group">
					<label>Apellido</label>
					<input type="text" name="actApe" class="form-control" value="<?php echo $nombreApellido; ?>">
				</div>
				<div class="form-group">
					<label>Correo</label>
					<input type="email" name="actCorr" class="form-control" value="<?php echo $nombreCorreo; ?>">
				</div>
				<div class="form-group">
					<label>Celular</label>
					<input type="text" name="actCel" class="form-control" value="<?php echo $nombreCelular; ?>">
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input type="password" name="actCon" class="form-control" value="<?php echo $nombreContraseña; ?>">
				</div>
				<div class="form-group">
					<label>Fecha</label>
					<input type="date" name="actFecha" class="form-control" value="<?php echo $nombreFecha; ?>">
				</div>
			<?php //} ?>	
				<input type="submit" class="btn boton-ejec" value="Actualizar" name="btnActualizar">
			</form>
			</div>
		</div>
		
	</div>
	

	<div style="margin-right: 25%; background-color: red; margin-left: 25%;">
	
	</div>

	<div class="footer-principal">
         <div class="footer-iconos">
           <p>Siguenos en: </p>
           <div class="menu-footer">
             <ul style="border-bottom: none;" class="nav nav-tabs menu-redes">
               <li><a href="#"><span class="icon-instagram"> Instagram</a></li>
        		<li><a href="#"><span class="icon-facebook"> Facebook</a></li>
        		<li><a href="#"><span class="icon-whatsapp"> WhatsApp</a></li>
        		<li><a href="#"><span class="icon-twitter"> Twitter</a></li>
              </ul>
            </div>
         </div>
         <div class="panel-footer">
           <h3>Proyectamos S.A.S 2019</h3>
         </div>
       </div>



	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>
</body>
</html>