<?php 
	include_once("../../Controller/formularios_controlador.php");
	include_once("../../Model/User/users.php");
	include_once("../../Controller/Session/session.php");
	include_once("../../Model/Forms/forms.php");
	$Um = new Usuarios_modelo();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Formularios</title>
	<?php include_once('../Includes/header.php'); ?>
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
				<a href="PollsterMainPage.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
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
							<li><a href="../../Model/Session/exit.php">Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-bottom: 150px;">
		<div class="contenedor-titulo" style="color: white;">
			<h1>Formularios Creados</h1>
		</div>
			<?php
				if(isset($_POST['crear-form'])){
				$tituloForm = $_POST['titulo'];
				$descripcionForm = $_POST['descripcion'];

				$obtenerSe = $sessionUsuario->getSession();
				$idUsuario = $Um->get_id($obtenerSe);

				if ($oFormularios->crearFormulario($tituloForm, $descripcionForm, $idUsuario)) {
					echo "<div class='alert alert-info'>Se agrego un nuevo formulario </div>";
				}else{
					echo "<div class='alert alert-danger'>algo no salio bien</div>";
					}
				} 
			?>
			<!--Arreglar la forma de que aparezca un mensaje cuando no tenga formularios-->
			<div class="table-responsive">
				<?php 

					$idUsuario1 = $Um->get_id($sessionUsuario->getSession());	
					$listaForms = $oFormularios->obtenerFormulariospropios($idUsuario1);
						
					if($listaForms == null){
						echo "<div class='alert alert-info' style='text-align: center;'>No hay formularios Creados</div>";
					}else{
				?>
				<table class="table table-hover tabla-formulario">
					<thead class="tabla-cabeza">
						<tr style="color: white;">
							<th>Id</th>
							<th>Titulo</th>
							<th>Descripcion</th>
							<th>Numero Preguntas</th>
							<th>Votos</th>
							<th colspan="3">Opciones</th>
						</tr>
					</thead>
					<?php 
						if(isset($_GET["pagina1"])){
							if($_GET["pagina1"] == 1){
								header("location: PollsterMainPage.php");
							}else{
								$pagina1 = $_GET["pagina1"];
							}
						}else{
							$pagina1 = 1;
						}

						$tamañoPagina = 5;
						$empezar = ($pagina1 - 1) * $tamañoPagina;
						$numFilas = $oFormularios->obtenerForms1($idUsuario1);
						$totalPaginas = ceil($numFilas / $tamañoPagina);

						foreach ($listaForms as $registro ) {	
					?>
					<tr>
						<td><?php echo $registro['idFormularios']; ?></td>
						<td><?php echo $registro['nombre']; ?></td>
						<td><?php echo $registro['descripcion']; ?></td>
						<td><?php echo $registro['numeroPregunta']; ?></td>
						<td><?php echo $registro['voto']; ?></td>
						<td><a href="PollsterFormUpdate.php?id=<?php echo $registro['idFormularios'] ?>&titulo=<?php echo $registro['nombre'] ?>&descripcion=<?php echo $registro['descripcion'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
						<td><a href="../../Controller/Pollster/encuestador_borrar_formulario.php?id=<?php echo $registro['idFormularios'] ?>&preguntas=<?php echo $registro['numeroPregunta'] ?>"><button class="btn btn-danger">Borrar</button></a></td>
						<td><a href="PollsterAddQuestion.php?iden=<?php echo $registro['idFormularios']; ?>"><button class="btn boton-primario">Crear Preguntas</button></a></td>		
					</tr>
					<?php 
						}	 	
					?>
				</table>
				<div class="contnedor-paginacion">
					<?php 
						echo "<ul class='pagination'>";
						for($i = 1; $i<=$totalPaginas; $i++){
							if($i == $pagina1){
								echo "<li class='disabled'><a>". $i . "</a></li>";
							}else{
								echo "<li><a href='?pagina1=" . $i . "'>". $i . "</a></li>";
							}
						}
						echo "</ul>";
				 	?>	
		 		</div>
				<?php } ?>	
			</div>

		<div style="text-align: center; ">
			<button class="btn btn-lg" style="background-color: white;" data-toggle="modal" data-target="#crearPregunta">Crear Formulario</button>
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
									<input class="btn btn-default" type="submit" name="crear-form" value="Aceptar">
									</form>
							</div>
							<div class="modal-footer">	
									<button class="btn btn-default" data-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
				</div>
	<div class="footer-principal" style="margin-top: 40px;">
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