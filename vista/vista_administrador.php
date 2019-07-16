<?php 

	require_once("../modelo/formularios_modelo.php");
	require_once("../modelo/usuarios_modelo.php");


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Administrador</title>
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
				<a href="#" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="vista_admin_formulario.php">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="#">Exportar</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="vista_acerca.php">Acerca de</a></li>
								<li><a href="vista_perfil.php">Mi perfil</a></li>
								<li><a href="../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php 

		$objFormularios = new Formulario_modelo();

		$totalForms = $objFormularios->obtenerUltimos4();

	?>	

	<section class="seccion-formularios">
		<div class="titulo-inicio">
			<h1>Ultimos Formularios Creados</h1>
		</div>
		<div class="container">
			<div class="row">
				<?php  
				foreach ($totalForms as $fila) {
			
		


	 			?>
				<div class="col-xs-12 col-md-12 col-lg-6">
					<div class="carta-formulario">
						<div class="carta-titulo">
							<div class="container">
								<h2><?php echo $fila["nombre"]; ?> <span class="glyphicon glyphicon-search carta-icono"></span></h2>
							</div>	
						</div>
						<div class="carta-contenido">
							<div class="carta-descripcion">
								<p><?php echo $fila["descripcion"]; ?></p>
							</div>
							<div class="carta-preguntas">
								<h3>Numero Preguntas: <?php echo $fila['numeroPregunta']; ?></h3>
							</div>
							<div class="carta-votos">
								<h4>Votos totales: <?php echo $fila["voto"]; ?></h4>
							</div>	
						</div>
					</div>
					<!-- COLOCAR UNA GRID PARA QUE SE MUESTRE LO IMPORTANE CUANDO SEA EN MOVIL-->
					<hr class="hidden-md hidden-lg">
				</div>
		 <?php  } ?>		
				<div class="col-xs-12 col-md-12 col-lg-6">
					<div>
					<h2>Usuarios Recientes</h2>	
					</div>
					<?php 

		 			$objUsuarios = new Usuarios_modelo();

		 			$totalUsers = $objUsuarios->obtenerUltimos4();

		 			foreach ($totalUsers as $fila1) {
		 				
		 			

		 		 ?>
					<div style="background-color: gray">
						<h2><span class="glyphicon glyphicon-user"></span> <?php echo $fila1['usuario']; ?></h2>
					</div>
					<?php } ?>
				</div>		
			</div>			
		</div>

	</section>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>
</body>
</html>