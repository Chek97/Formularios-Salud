<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Actualizar Datos</title>
	<?php include_once('../Includes/header.php'); ?>
</head>
<body>

	<?php 


		require_once("../../modelo/formularios_modelo.php");
		include_once("../../controlador/sesion_controlador.php");
		include_once("../../modelo/usuario.php");

		$oFormularios = new Formulario_modelo();

		

		
	 ?>

		<nav class="navbar navbar-personalizado"> 
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					<span class="icon-bar app-bar"></span>
					<span class="icon-bar app-bar"></span>
					<span class="icon-bar app-bar"></span>
				</button>
				<a href="vista_encuestador_formulario.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="PollsterFormPage.php">Formularios</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
							<li><a href="../Includes/about.php">Acerca de</a></li>
								<li><a href="../Includes/profile.php">Mi perfil</a></li>
								<li><a href="../../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php 

 		

		$obtenerSe = $sessionUsuario->getSession();
	

		

		if(!isset($_POST['btnActualizar'])){
			$nombreTitulo = $_GET['titulo'];
			$nombreDescripcion = $_GET['descripcion'];
			$nombreId = $_GET['id'];
		}else{
			$nombreTitulo = $_POST['actUsu'];
			$nombreDescripcion = $_POST['actDes'];
			$nombreId = $_POST['actId'];

		}
		$datosFormulario = $oFormularios->informacionFormulario($nombreTitulo);

		if(isset($_POST['btnActualizar'])){

			$inputTitulo = $_POST['actUsu'];
			$inputDescripcion = $_POST['actDes'];
			$inputId = $_POST['actId'];

			if($oFormularios->actualizarFormulario($inputTitulo, $inputDescripcion, $inputId)==true){
				echo "<div class='alert alert-info container'>Se actualizo el formulario</div>";
			}else{
				echo "<div class='alert alert-danger container'>No se actualizo o no hay cambios que realizar</div>";
			}
		}

		foreach ($datosFormulario as $dato) {

	 ?>


	<div class="container" style="background-color: white; padding: 20px; border-radius: 5px; box-shadow: 10px 10px #503c42; margin-bottom: 40px;">
		<div class="contenedor-titulo">
			<h1>Actualizar Formulario</h1>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-6">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="form-group">
						<input type="text" class="hidden" name="actId" value="<?php echo $nombreId ?>">
						<label>Titulo</label>
						<input type="text" name="actUsu" value="<?php echo $nombreTitulo; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Descripcion</label>
						<textarea name="actDes"class="form-control"><?php echo $nombreDescripcion; ?></textarea>
					</div>
					<br>
					<div class="form-group col-xs-12" style="text-align: center;">
						<input type="submit" class="btn btn-lg" value="Actualizar" name="btnActualizar">
					</div>
				</form>	
			</div>
			<?php 

				//DEBEMOS TRAER LA CANTIDAD DE PREGUNTAS Y UN BOTON PARA PODER VERLAS O ALGO ASI

				if($dato['numeroPregunta']==0){
					echo "<div class='col-xs-12 col-md-12 col-lg-6 alert alert-info' style='text-align: center;'>Este formulario no tiene preguntas</div>";
				}else{

					echo "<div class='col-xs-12 col-md-12 col-lg-6'>
							<div style='text-align: center;'>
								<a href=''><button class='btn btn-success btn-lg'>Ver Preguntas</button></a>
							</div>
							</div>";
				}
			 ?>
		</div>
	</div>

	<?php } ?>

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



	<?php include_once('../Includes/footer.php'); ?>
</body>
</html>