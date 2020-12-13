<?php require_once("../../Model/Forms/forms.php"); ?>
<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Formularios</title>
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
				<a href="AdminMainPage.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="AdminFormPage.php">Formularios</a></li>
					<li><a href="AdminUserPage.php">Usuarios</a></li>
					<li><a href="AdminSearchPage.php">busqueda</a></li>
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
	<div class="container">
		<div style="text-align: center; font-size: 40px; font-family: 'Squada One', cursive; color: white;">
			<h1>Formularios</h1>
		</div>
		<div class="table-responsive" style="border-radius: 4px;">
			<table class="table tabla-formulario table-hover">
				<thead class="tabla-cabeza">
					<tr class="cabeza-titulo">
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
					if(isset($_GET["pagina1"])){
								if($_GET["pagina1"] == 1){
									header("location: AdminFormPage.php");
								}else{
									$pagina1 = $_GET["pagina1"];
								}
						}else{
							$pagina1 = 1;
						}
					$tamañoPagina = 5;
					$empezar = ($pagina1 - 1) * $tamañoPagina;
					$numFilas = $insFormulario->obtenerForms();
					$totalPaginas = ceil($numFilas / $tamañoPagina);
					$listaForm = $insFormulario->get_formularios($empezar, $tamañoPagina);
					
					foreach ($listaForm as $fila ) {
				?>
				<tr class="tabla-elementos">
				 	<td style="font-size: 20px; font-family: 'Squada One', cursive;"><?php echo $fila['idFormularios']; ?></td>
				 	<td><?php echo $fila['nombre']; ?></td>
				 	<td><?php echo $fila['descripcion']; ?></td>
				 	<td><?php echo $fila['numeroPregunta']; ?></td>
				 	<td><?php echo $fila['voto']; ?></td>
				 	<td><a href="AdminFormUpdate?id=<?php echo $fila['idFormularios'] ?>&titulo=<?php echo $fila['nombre'] ?>&descripcion=<?php echo $fila['descripcion'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
				 	<td><a href="../controlador/administrador_borrar_formulario.php?id=<?php echo $fila['idFormularios'] ?>&preguntas=<?php echo $fila['numeroPregunta'] ?>"><button class="btn btn-danger">Borrar</button></a></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="contnedor-paginacion">
			<?php 
				//PAGINACION
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
	<?php include_once('../Includes/footer.php'); ?>
</body>
</html>