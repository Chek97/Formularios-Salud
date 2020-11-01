<!DOCTYPE html>
<html>

<head>
	<title>Inicio</title>
	<?php include_once('../Includes/header.php'); ?>
</head>

<body>
	<div class="contenedor-titulo">
		<h1><span><img src="../../Public/img/SAS_Proyectamos.png" class="imagen-logo"></span>FORMULARIOS SALUTOGENESIS</h1>
	</div>
	<div class="perfil-registro">
		<div class="row">
			<div class="col-xs-12">
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'Admin')">Administrador</button>
					<button class="tablinks" onclick="openCity(event, 'Usuario')">Encuestador</button>
					<button class="tablinks" onclick="openCity(event, 'Encuestado')">Usuario</button>
				</div>
			</div>
		</div>
		<div id="Admin" class="tabcontent">
			<form action="../../controlador/sesion_controlador.php" method="post" class="formulario">
				<?php
				if (isset($_GET['error'])) {
					echo "<button class='close' aria-hidden='true' data-dismiss='modal'>&times;</button>";
					echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
				}
				?>
				<h2 align="center">Administrador</h2>
				<div class="form-group">
					<label>Usuario:</label>
					<input type="text" name="userAdmin" class="form-control" placeholder="ingrese su usuario" required>
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" name="passAdmin" class="form-control" placeholder="ingrese su contraseña" required>
				</div>
				<input type="submit" name="Ingresar1" class="btn">
			</form>
		</div>
		<div id="Usuario" class="tabcontent">
			<form action="../../controlador/sesion_controlador.php" method="post" class="formulario">
				<?php
				if (isset($_GET['error'])) {
					echo "<button class='close' aria-hidden='true' data-dismiss='modal'>&times;</button>";
					echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
				}
				?>
				<h2 align="center">Encuestador</h2>
				<div class="form-group">
					<label>Usuario:</label>
					<input type="text" name="userEncu" class="form-control" placeholder="ingrese su usuario">
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" name="passEncu" class="form-control" placeholder="ingrese su contraseña">
				</div>
				<input type="submit" name="Ingresar2" class="btn">
			</form>
			<hr>
			<div class="form-registro">
				<p>No tienes una cuenta? <a href="#">Registrate</a></p>
			</div>

		</div>
		<div id="Encuestado" class="tabcontent">
			<form action="../../controlador/sesion_controlador.php" method="post" class="formulario">
				<?php
				if (isset($_GET['error'])) {
					echo "<button class='close' aria-hidden='true' data-dismiss='modal'>&times;</button>";
					echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
				}
				?>
				<h2 align="center">Usuario</h2>
				<div class="form-group">
					<label>Usuario:</label>
					<span class="form-group-addon"></span>
					<input type="text" name="userUsu" class="form-control" placeholder="ingrese su usuario">
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" name="passUsu" class="form-control" placeholder="ingrese su contraseña">
				</div>
				<input type="submit" name="Ingresar3" class="btn">
			</form>
			<hr>
			<div class="form-registro">
				<p>No tienes una cuenta? <a href="#">Registrate</a></p>
			</div>
		</div>
	</div>


	<!-- ARREGLAR ESTA PARTE, ESTAN DAÑANDO ESTE FOOTER O HACER UNO NUEVO-->

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