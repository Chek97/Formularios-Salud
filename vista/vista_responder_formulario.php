<?php 

	require_once("../modelo/formularios_modelo.php");
	include_once("../controlador/preguntas_controlador.php");
	include_once("../controlador/opciones_controlador.php");
	$contador = 1;
	$contadorPreg = 1;



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Responder Formulario</title>
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
					<li><a href="vista_usuarios_formularios.php">Formularios</a></li>
					<li><a href="#">Busqueda</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-search"></span>
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
	<div class="container">
		<h1>Formulario</h1>

		<form action="../controlador/respuestas_controlador.php" method="post">
			
			<?php

			if(!isset($_POST['btnGuardar'])){
				$idForm = $_GET['id'];
				$numPreguntas = $_GET['num'];
			}

			$preguntas = $oPreguntas->obtenerId($idForm);

			$objOpciones = new opciones();

			echo "<input type='hidden' name='np' value=".$numPreguntas.">";


			foreach ($preguntas as $valor) {


				echo "<input type='hidden' name='idp$contadorPreg' value=".$valor['idPreguntas'].">";
				echo "<input type='hidden' name='tp$contadorPreg' value=".$valor['tipo'].">";
				if($valor['tipo'] == "abierta"){
					$contadorPreg++;
					if($valor['requerido'] == "requerido"){

					?>	
						<div class="form-group">
							<label><?php echo $valor['textoPregunta']; ?> <span>(requerido)</span></label>
							<input type="text" class="form-control" required name="<?php echo $contador ?>">
						</div>
					<?php
					$contador++; 	
					}else{

					?>	
						<div class="form-group">
							<label><?php echo $valor['textoPregunta']; ?></label>
							<input type="text" class="form-control" name="<?php echo $contador; ?>">
						</div>
					<?php  	
					$contador++;
					}


				}else if($valor['tipo'] == "seleccion"){

					$opciones = $oOpciones->obtenerOpciones($valor['idPreguntas']);
					$contadorPreg++;

					if ($valor['requerido'] == "requerido") {
						

						?>
						<div class="form-group">
							<label><?php echo $valor['textoPregunta']; ?> <span>(requerido)</span></label>
							<br>
							<?php foreach ($opciones as $op) { 

							?>
							<input type="radio" value="<?php echo $op['texto']; ?>" name="<?php echo $contador; ?>"> <?php echo $op['texto']; ?>

							<?php 
							}
							?>
						</div>	
						<?php  
						$contador++;
					}else{
						?>
						<div class="form-group">
							<label><?php echo $valor['textoPregunta']; ?></label>
							<br>
							<?php foreach ($opciones as $op) { 

							?>
							<input type="radio" value="<?php echo $op['texto']; ?>" name="<?php echo $contador; ?>"> <?php echo $op['texto']; ?>

							<?php 
							}
							?>
						</div>	
						<?php  
						$contador++;					
						}		 
				}else{
					$opciones1 = $objOpciones->obtenerOpciones($valor['idPreguntas']);
					$contadorPreg++;

					if($valor['requerido']=="requerido"){

	
					?>
				 <div class="form-group">
					<label><?php echo $valor['textoPregunta']; ?> <span>(requerido)</span></label>
					<br>
					<?php 
						foreach ($opciones1 as $up) {
							
					?>

						<input type="checkbox" value="<?php echo $up['texto']; ?>" name="<?php echo $contador; ?>"> <?php echo $up['texto']; ?> 

					<?php
					$contador++;  
						}
					 ?>
				 </div>
		<?php  		 	
					
					}else{

						?>
				<div class="form-group">
					<label><?php echo $valor['textoPregunta']; ?></label>
					<br>
					<?php 
						foreach ($opciones1 as $up) {
							
					?>

						<input type="checkbox" value="<?php echo $up['texto']; ?>" name="<?php echo $contador; ?>"> <?php echo $up['texto']; ?> 

					<?php
					$contador++; 
						}
					 ?>
				 </div>		
		<?php  		 
					}
				}




			}
			



		 ?>
		 <input type="submit" class="btn btn-primary" name="btnGuardar" value="Enviar Respuesta">

		</form>

	</div> 

  	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>
 </body>
 </html>