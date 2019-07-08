<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar Usuario</title>
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
					<li><a href="#">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="#">Exportar</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-search"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="vista_acerca.php">Acerca de</a></li>
								<li><a href="vista_perfil.php">Mi perfil</a></li>
								<li><a href="../salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div style="background-color: gray;">
			<div style="text-align: center; padding: 20px; margin: 20px;">
				<h1>Actualizar Usuario:</h1>
			</div>
			<div >
				<form style="padding: 10px;">
				<div class="form-group">
					<label>Usuario</label>
					<input type="text" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Apellido</label>
					<input type="text" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Correo</label>
					<input type="email" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Celular</label>
					<input type="text" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input type="password" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Fecha</label>
					<input type="text" name="" class="form-control">
				</div>
				<input type="submit" class="btn btn-primary" value="Actualizar" name="">
			</form>
			</div>
		</div>
		
	</div>
	

	<div style="margin-right: 25%; background-color: red; margin-left: 25%;">
	
	</div>



	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>
</body>
</html>