<?php 

	require_once("../../modelo/formularios_modelo.php");

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
				<a href="UserMainPage.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="UserFormPage.php">Formularios</a></li>
					<li><a href="../vista_buscar.php">Busqueda</a></li>
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
	<div class="container">
		<div class="table-responsive">
			<table class="table table-hover tabla-formulario">
				<thead>
					<tr class="tabla-cabeza" style="color: white;">
						<th>Id</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th colspan="2">Opciones</th>
					</tr>
				</thead>

				<?php 

					$insFormulario = new Formulario_modelo();

					if(isset($_GET["pagina"])){
								if($_GET["pagina"] == 1){
									header("location: UserFormPage.php");
								}else{
									$pagina = $_GET["pagina"];
								}
						}else{
							$pagina = 1;
						}

						$tamañoPagina = 5;

		$empezar = ($pagina - 1) * $tamañoPagina;

		$numFilas = $insFormulario->obtenerForms();

		$totalPaginas = ceil($numFilas / $tamañoPagina);

					$listaForm = $insFormulario->get_formularios($empezar, $tamañoPagina);

					foreach ($listaForm as $fila ) {

				 ?>
				 <tr>
				 	<td><?php echo $fila['idFormularios']; ?></td>
				 	<td><?php echo $fila['nombre']; ?></td>
				 	<td><?php echo $fila['descripcion']; ?></td>
				 	<td><a href="AnswerFormPage.php?id=<?php echo $fila['idFormularios'] ?>&num=<?php echo $fila['numeroPregunta']; ?>"><button class="btn btn-warning">Responder</button></a></td>
				 </tr>
				<?php } ?>
			</table>
		</div>

	<div class="contnedor-paginacion">	
	<?php


		echo "<ul class='pagination'>";
		for($i = 1; $i<=$totalPaginas; $i++){

			if($i == $pagina){
				echo "<li class='disabled'><a>". $i . "</a></li>";
			}else{
				echo "<li><a href='?pagina=" . $i . "'>". $i . "</a></li>";
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