<?php 

	require_once("../modelo/preguntas_modelo.php");
	require_once("../modelo/opciones_modelo.php");

	$objPreguntas = new Preguntas();
	$objOpciones = new Opciones();
	$idFormulario = $_GET['id1'];

	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar Preguntas</title>
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





	 ?>

	 <div class="container"> 
	 	<div class="contenedor-formulario">
	 		<div class="contenedor-titulo">
	 			<h1>PREGUNTAS</h1>
	 		</div>
	 		<div>
	 			<form method="post" action="../controlador/actualizar_preguntas.php?id=<?php echo $idFormulario; ?>">
	 				<input type="hidden" name="inputFormulario" value="<?php echo $idFormulario; ?>">
	 		<?php 

			

			$listaPreguntas = $objPreguntas->obtenerId($idFormulario);

			$numeroPreguntas  = $_GET['nump'];

			$contador = 0;
			$contaPregunta = 0;
			

			foreach ($listaPreguntas as $lp ) {

	 		?>
	 		
	 				<div class="form-group">
	 					<h4>Pregunta <?php echo $lp['tipo']; ?></h4>
	 					<input type="text" class="form-control" value="<?php echo $lp['textoPregunta']; ?>" name="<?php echo $contador; ?>">
	 				</div>
	 				<div class="form-group">
	 					
	 					<ul>
	 						<?php 

	 							if($lopciones = $objOpciones->obtenerOpciones($lp['idPreguntas'])){
	 								foreach ($lopciones as $oo ) {
	 					
	 						?>
	 							<li><input class="form-control" type="text" value="<?php echo $oo['texto']; ?>" name="<?php echo $contaPregunta ?>"></li>
	 				

	 						<?php 
	 								$contaPregunta++;
	 								}
	 							}

	 						 ?>	
	 					</ul>

	 				</div>
	 		
	 		
	 	<?php $contador++; } ?>
	 		<div style="text-align: center;">
	 			<input type="submit" value="Actualizar" name="btnAct" class="btn boton-ejec">
	 		</div>
	 		
	 		</form>
	 	</div>	
	 	</div>
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