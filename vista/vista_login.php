<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
		<span>logo</span><h1 align="center">FORMULARIOS SALUTOGENESIS</h1>
		<br>
		<div class="perfil-registro">
			<div class="tab">
				<button class="tablinks" onclick="openCity(event, 'Admin')">Administrador</button>
  				<button class="tablinks" onclick="openCity(event, 'Usuario')">Usuario</button>
  				<button class="tablinks" onclick="openCity(event, 'Encuestado')">Encuestado</button>
			</div>

			<div id="Admin" class="tabcontent">
				<form action="" method="post"  class="formulario">
					<h2 align="center">Administrador</h2>
					<div class="form-group">
						<label>Usuario:</label>
						<input type="text" name="userAdmin" class="form-control" placeholder="ingrese su usuario">
					</div>
					<div class="form-group">
						<label>Contraseña:</label>
						<input type="password" name="passAdmin" class="form-control" placeholder="ingrese su contraseña">
					</div>
					<input type="submit" name="Ingresar" class="btn btn-primary">
				</form>
			</div>
			<div id="Usuario" class="tabcontent">
				<form action="" method="post"  class="formulario">
					<h2 align="center">Encuestador</h2>
					<div class="form-group">
						<label>Usuario:</label>
						<input type="text" name="userEncu" class="form-control" placeholder="ingrese su usuario">
					</div>
					<div class="form-group">
						<label>Contraseña:</label>
						<input type="password" name="passEncu" class="form-control" placeholder="ingrese su contraseña">
					</div>
					<input type="submit" name="Ingresar" class="btn btn-primary">
				</form>
				<hr>
				<p>No tienes una cuenta? <a href="#">Registrate</a></p>
					
			</div>
			<div id="Encuestado" class="tabcontent">
				<form action="" method="post"  class="formulario">
					<h2 align="center">Usuario</h2>
					<div class="form-group">
						<label>Usuario:</label>
						<input type="text" name="userUsu" class="form-control" placeholder="ingrese su usuario">
					</div>
					<div class="form-group">
						<label>Contraseña:</label>
						<input type="password" name="passUsu" class="form-control" placeholder="ingrese su contraseña">
					</div>
					<input type="submit" name="Ingresar" class="btn btn-primary">
				</form>	
				<hr>
				<p>No tienes una cuenta? <a href="#">Registrate</a></p>							
			</div>
		</div>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
</body>
</html>