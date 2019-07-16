<?php 

	include_once("../controlador/formularios_controlador.php");
	include_once("../modelo/usuarios_modelo.php");
	include_once("../controlador/sesion_controlador.php");
	include_once("../modelo/formularios_modelo.php");

	$Um = new Usuarios_modelo();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Formularios</title>
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
				<?php

				if(isset($_POST['crear-form'])){

				$tituloForm = $_POST['titulo'];
				$descripcionForm = $_POST['descripcion'];

				$obtenerSe = $sessionUsuario->getSession();
				$idUsuario = $Um->get_id($obtenerSe);

				if ($oFormularios->crearFormulario($tituloForm, $descripcionForm, $idUsuario)) {
					echo "Se agrego un nuevo formulario";
				}else{
					echo "algo no salio bien";
					}
				} 
			?>

			<!--Arreglar la forma de que aparezca un mensaje cuando no tenga formularios-->
			<?php 
				/*

				if($oFormularios->obtenerFormulariospropios($Um->get_id($sessionUsuario->getSession()))==false){
				echo "<div style='border: 1px solid; height: 100px; text-align: center;'>No hay datos que mostrar Ingresa unos nuevos</div><br>";
			}else{
				?>
				
				<?php } ?>
				*/
			 ?>

			<div class="table-responsive">
				<?php 

					$idUsuario1 = $Um->get_id($sessionUsuario->getSession());	
							$listaForms = $oFormularios->obtenerFormulariospropios($idUsuario1);

							if($listaForms == null){
								echo "No hay formularios Creados";
							}else{

				 ?>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Id</th>
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Numero Preguntas</th>
										<th>Votos</th>
										<th colspan="3">Opciones</th>
									</tr>
								</thead>
								<?php 

							//$listaUsuarios = $musuario->get_usuarios();

							


							foreach ($listaForms as $registro ) {
								
							
						 ?>
					<tr>
					<td><?php echo $registro['idFormularios']; ?></td>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['descripcion']; ?></td>
					<td><?php echo $registro['numeroPregunta']; ?></td>
					<td><?php echo $registro['voto']; ?></td>
					<td><a href="vista_actualizar_formulario.php?id=<?php echo $registro['idFormularios'] ?>&titulo=<?php echo $registro['nombre'] ?>&descripcion=<?php echo $registro['descripcion'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
					<td><a href="../controlador/borrar_formulario.php?id=<?php echo $registro['idFormularios'] ?>&preguntas=<?php echo $registro['numeroPregunta'] ?>"><button class="btn btn-danger">Borrar</button></a></td>
					<td><a href="vista_crearPreguntas.php?iden=<?php echo $registro['idFormularios']; ?>"><button class="btn btn-info">Crear Preguntas</button></a></td>
							
					</tr>

						 <?php 
						 	}
						 	
						  ?>
							</table>
						<?php } ?>		
						</div>			
		 
		
		<div style="text-align: center;">
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#crearPregunta">Crear Formulario</button>
		</div>
	</div>

	<div class="modal fade" id="crearPregunta">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
								<h3>Crear Nuevo Formulario</h3>
							</div>
							<div class="modal-body">
								<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
									<div class="form-group">
										<label>Titulo</label>
										<input type="text" name="titulo" class="form-control">
									</div>
									<div class="form-group">
										<label>Descripcion</label>
										<textarea name="descripcion" class="form-control"></textarea>
									</div>
									<input class="btn btn-success" type="submit" name="crear-form" value="Aceptar">
									</form>
							</div>
								
							<div class="modal-footer">	
									<button class="btn btn-default" data-dismiss="modal">Cancelar</button>

							</div>
						</div>
					</div>
				</div>




	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>
</body>
</html>