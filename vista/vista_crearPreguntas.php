<?php 

	//require_once("../modelo/formularios_modelo");
	require_once("../modelo/preguntas_modelo.php");

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Crear Preguntas</title>
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">

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
					<li><a href="vista_encuestador_formularios.php">Formularios</a></li>
					<li><a href="#">Busqueda</a></li>
					<li><a href="#">Exportar</a></li>
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
		<div>
			<h1>Crea Una Pregunta</h1>
		</div>
		<div>
			<form action="" method="post">
				<div class="form-group">
					<label>Describe la pregunta</label>
					<input type="text" name="des" class="form-control">
				</div>
				<div class="form-group">
					<label>Requerido</label>
					<br>
					<label>
						<input type="radio" name="req" value="requerido"> SI
						<input type="radio" name="req" value="no requerido"> NO
					</label> 
				</div>
				<div class="form-group">
					<label>tipo</label>
			<!-- aqui va un dropbox-->
				<select name="tipo" onchange="crearOpciones(this.value);" class="form-control">
					<option  selected value="abierta">Abierta</option>
					<option value="seleccion">Seleccion multiple</option>
					<option value="verificar">Verificacion</option>
				</select>
				<div id="unica" align="center" style="display: none;">
					<label>Opciones:</label>
					<br>
						<select id="se" name="numPreg" onchange="crearPreguntas(this.value);" class="form-control">
							<option selected value="0">Selecciona el numero de opciones</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
							<ul id="opcion" style="display: none;">
								<li id="o1" style="display: none;"></li>
								<li id="o2" style="display: none;"></li>
								<li id="o3" style="display: none;"></li>
								<li id="o4" style="display: none;"></li>
								<li id="o5" style="display: none;"></li>
							</ul>
							<!--Se necesita que cuando se presione la opcion otra vez, se oculten las que
							ya estaban y no afecte a las demas, o sino solo borrar la opcion y ya-->

				</div>
				<div id="multiple" style="display: none;">
					<p>Hola 2</p>
				</div>				
			</div>
			<div style="width: 100%; text-align: center;">
				<input type="submit" value="Crear" class="btn btn-primary btn-lg">
			</div>
				</div>
			</form>
		</div>
	</div>



 	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>	 
 </body>
 </html>