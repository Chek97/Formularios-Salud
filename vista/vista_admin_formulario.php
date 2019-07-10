<?php 

	require_once("../modelo/formularios_modelo.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Admin Formularios</title>
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
					<li><a href="vista_admin_formulario.php">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="#">Exportar</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-search"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="">Acerca de</a></li>
								<li><a href="">Mi perfil</a></li>
								<li><a href="../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th>Numero Preguntas</th>
						<th>Votos</th>
						<th colspan="2">Opciones</th>
					</tr>
				</thead>

				<?php 

					$insFormulario = new Formulario_modelo();

					$listaForm = $insFormulario->get_formularios();

					foreach ($listaForm as $fila ) {

				 ?>
				 <tr>
				 	<td><?php echo $fila['idFormularios']; ?></td>
				 	<td><?php echo $fila['nombre']; ?></td>
				 	<td><?php echo $fila['descripcion']; ?></td>
				 	<td><?php echo $fila['numeroPregunta']; ?></td>
				 	<td><?php echo $fila['voto']; ?></td>
				 	<td><a href="vista_actualizar_formulario.php?id=<?php echo $fila['idFormularios'] ?>&titulo=<?php echo $fila['nombre'] ?>&descripcion=<?php echo $fila['descripcion'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
				 	<td><a href="#"><button class="btn btn-danger">Borrar</button></a></td>
				 </tr>
				<?php } ?>
			</table>
		</div>
	</div>
 
 	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>
 </body>
 </html>