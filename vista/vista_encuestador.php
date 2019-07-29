<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Encuestador</title>
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
				<a href="vista_encuestador.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="vista_encuestador_formularios.php">Formularios</a></li>
					<li><a href="vista_buscar.php">Busqueda</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="vista_acerca_encuestador.php">Acerca de</a></li>
								<li><a href="vista_perfil.php">Mi perfil</a></li>
								<li><a href="../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php 

		require_once("../modelo/formularios_modelo.php");
		include_once("../modelo/session.php");
		include_once("../modelo/usuarios_modelo.php");

		$oFormularios = new Formulario_modelo();
		$oSession = new Session();
		$oUsuarios = new Usuarios_modelo();

		$idUser = $oUsuarios->get_id($oSession->getSession());

		$formulariosPropios = $oFormularios->obtenerPropios4($idUser);
		



	 ?>

	<div class="container" style="margin-bottom: 200px;">
		<div class="contenedor-titulo" style="color: white;">
			<h1>Formularios Recientes</h1>
		</div>
		<?php

			if($formulariosPropios == null){
			echo "<div class = 'alert alert-info' style='text-align: center;'> No hay formularios creados aun </div>";
		}else{ 

			foreach ($formulariosPropios as $reg) {
				
			
		 ?>
		 <div class="col-xs-12 col-md-12 col-lg-6" style="margin-bottom: 20px;">
		 	<div class="carta-formulario">
		 		<div class="carta-titulo">
		 			<h2><span class="glyphicon glyphicon-list-alt"> <?php echo $reg["nombre"]; ?></span></h2>
		 		</div>
		 		<div class="carta-contenido">
		 			<div class="carta-descripcion" >
								<p><?php echo $reg["descripcion"]; ?></p>
							</div>
							<div class="carta-preguntas" style="padding-bottom: 20px;">
								<h3>Numero Preguntas: <?php echo $reg['numeroPregunta']; ?></h3>
							</div>
		 		</div>
		 	</div>
		 </div>
		<?php } 

	}
		?>

		
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