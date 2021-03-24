<?php 
	include_once('../../Config/routesConfig.php');
	require_once("../../Model/Forms/forms.php");
	require_once("../../Model/User/users.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<?php include_once('../Includes/header.php'); ?>
</head>
<body>
	<!--CREAR MODULO RECURSIVO PARA EL NAVBAR -->
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
					<li><a href="<?php echo(ADMIN_FORMS); ?>">Formularios</a></li>
					<li><a href="<?php echo(ADMIN_USERS); ?>">Usuarios</a></li>
					<li><a href="<?php echo(ADMIN_SEARCH); ?>">busqueda</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="../<?php echo(MENU_ABOUT); ?>">Acerca de</a></li>
								<li><a href="../<?php echo(MENU_PROFILE); ?>">Mi perfil</a></li>
								<li><a href="../../Model/Session/exit.php">Salir</a></li>
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
				if($totalForms == false){
					echo("<div class='alert alert-warning'>No hay formularios creados todavia</div>");
				}else{				  
					foreach ($totalForms as $fila) {
	 			?>
				<div class="col-xs-12 col-md-12 col-lg-6">
					<div class="carta-formulario">
						<div class="carta-titulo">
								<a href="<?php echo(ADMIN_UPDATE_FORM); ?>?id=<?php echo $fila['idFormularios'] ?>&titulo=<?php echo $fila['nombre'] ?>&descripcion=<?php echo $fila['descripcion'] ?>" class="carta-enlace"><h2><span class="glyphicon glyphicon-list-alt"> <?php echo $fila["nombre"]; ?></span></h2></a>
						</div>
						<div class="carta-contenido">
							<div class="carta-descripcion">
								<p><?php echo $fila["descripcion"]; ?></p>
							</div>
							<div class="carta-preguntas" style="padding-bottom: 20px;">
								<h3>Numero Preguntas: <?php echo $fila['numeroPregunta']; ?></h3>
							</div>
						</div>
					</div>
					<!-- COLOCAR UNA GRID PARA QUE SE MUESTRE LO IMPORTANE CUANDO SEA EN MOVIL-->
				</div>
				
		 <?php  }
			}
		 ?>
		</div>	
	</div>
	<div style="text-align: center; color: white;">
		<h2>Ultimos Usuarios Creados</h2>
	</div>
	<div class="container">
		<div class="row">
			<?php 
				$objUsuarios = new Usuarios_modelo();
         		$totalUsers = $objUsuarios->obtenerUltimos4();

          		foreach ($totalUsers as $fila1) {
			?>
			<div class="col-xs-12 col-md-12 col-lg-6">
				<div class="carta-usuario">
					<div class="carta-usuario-titulo">
						<a href="<?php echo(ADMIN_UPDATE_USERS); ?>?id=<?php echo $fila1['idUsuario'] ?>&usuario=<?php echo $fila1['usuario']; ?>&nombre=<?php echo $fila1['nombre']; ?>&apellido=<?php echo $fila1['apellido'] ?>&correo=<?php echo $fila1['correo'] ?>&celular=<?php echo $fila1['celular'] ?>&contraseña=<?php echo $fila1['contraseña'] ?>&fecha=<?php echo $fila1['fecha'] ?>" class="carta-enlace1"><h2><span class="glyphicon glyphicon-user"> <?php echo $fila1["usuario"]; ?></span></h2></a>
					</div>
					<div class="carta-usuario-contenido">
						<div class="form-group">
							<label>Nombre: <?php echo $fila1['nombre']; ?></label>
							<br>
							<label>Apellido: <?php echo $fila1['apellido']; ?></label>
							<br>
							<label>Contraseña: <?php echo $fila1['contraseña']; ?></label>
							<br>
						</div>
					</div>
				</div>	
			</div>
		<?php } ?>
		</div>
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