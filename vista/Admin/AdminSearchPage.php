<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Busqueda Admin</title>
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
				<a href="vista_administrador.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
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
								<li><a href="vista_acerca.php">Acerca de</a></li>
								<li><a href="vista_perfil.php">Mi perfil</a></li>
								<li><a href="../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<section class="container" style="margin-bottom: 200px;">
	<div class="contenedor-formulario">
		
	

	<div class="contenedor-titulo">
		<h1>Opcion de Busqueda</h1>
	</div>
	

	<div>
		<div class="form-group" style="width: 50%">
			<label for="caja_busqueda">Buscar</label>
		
		
		<input type="text" class="form-control" name="caja_busqueda" id="caja_busqueda"></input>
	</div>
		
	</div>

	<div class="contenedor-titulo">
		<h2>Resultados</h2>
	</div>

	<div id="datos" class="table-responsive"></div>

</div>	
	
	
</section>

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