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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Squada+One&display=swap" rel="stylesheet"> 

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
				 	<div class="contenedor-titulo">
						<h1><span><a href="#">logo</a></span>FORMULARIOS SALUTOGENESIS</h1>
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
				<form action="controlador/sesion_controlador.php" method="post"  class="formulario">
					<?php 
						if(isset($_GET['error'])){
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
				<form action="controlador/sesion_controlador.php" method="post"  class="formulario">
					<?php 
						if(isset($_GET['error'])){
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
				<form action="controlador/sesion_controlador.php" method="post"  class="formulario">
					<?php 
						if(isset($_GET['error'])){
							echo "<button class='close' aria-hidden='true' data-dismiss='modal'>&times;</button>";
							echo "<div class='alert alert-danger'>Fallo en el inicio de session</div>";
						}
					 ?>
					<h2 align="center">Usuario</h2>
					<div class="form-group">
						<label>Usuario:</label>
						<span class="form-group-addon">@</span>
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
<!--
      	<div class="footer-redes">
      		<div class="container">
      			<div class="row">
      				<div class="col-xs-12">
      					<div class="footer-redesSociales">
        					Siguenos en:
        					<ul class="redes-iconos">
        						<li><a href="#"><span class="icon-instagram"> Instagram</a></li>
        						<li><a href="#"><span class="icon-facebook"> Facebook</a></li>
        						<li><a href="#"><span class="icon-whatsapp"> WhatsApp</a></li>
        						<li><a href="#"><span class="icon-twitter"> Twitter</a></li>
        					</ul>
        				</div>
      				</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<footer class="panel-footer panel-custom">
          <p style="text-align: center;"><h4 style="text-align: center;">&copy; Proyectamos S.A.S 2019</h4></p>
      	</footer>
      -->



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
</body>
</html>