<?php 
	require_once("../modelo/usuarios_modelo.php");
	include_once "../modelo/session.php";
	$objUsuario = new usuarios_modelo();
	$sessionUsuario = new Session();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Perfil</title>
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
				<a href="#" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="vista_admin_formulario.php">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="#">Exportar</a></li>
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
	<?php 

		$session = $sessionUsuario->getSession();

		$datosUsuario = $objUsuario->obtener_usuario($session);


	 ?>
	<div class="contenedor-formulario">
		<div class="contenedor-titulo">
			<h1>Perfil</h1>
		</div>
		<div class="contenedor-texto1">
			<?php 

			 foreach ($datosUsuario as $user) {
			 	
			 

			 ?>
			 <div class="form-group">
			 	<label>Id</label>
			 	<p><?php echo $user['idUsuario']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Usuario</label>
			 	<p><?php echo $user['usuario']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Nombre</label>
			 	<p><?php echo $user['nombre']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Apellido</label>
			 	<p><?php echo $user['apellido']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Correo</label>
			 	<p><?php echo $user['correo']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Celular</label>
			 	<p><?php echo $user['celular']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Contraseña</label>
			 	<p><?php echo $user['contraseña']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Fecha</label>
			 	<p><?php echo $user['fecha']; ?></p>
			 </div>
			 <div class="form-group">
			 	<label>Sexo</label>
			 	<p><?php echo $user['sexo']; ?></p>
			 </div>

			 <?php 

			 	}
			  ?>

			  <a href="vista_actualizar_usuarios.php?id=<?php echo $user['idUsuario'] ?>&nombre=<?php echo $user['nombre']; ?>&apellido=<?php echo $user['apellido'] ?>&correo=<?php echo $user['correo'] ?>&celular=<?php echo $user['celular'] ?>&contraseña=<?php echo $user['contraseña'] ?>&fecha=<?php echo $user['fecha'] ?>"><button class="btn btn-primary">Actualizar</button></a>
			
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


		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

</body>
</html>