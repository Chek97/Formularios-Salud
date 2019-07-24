<?php 

	include_once "../modelo/usuario.php";
	include_once "../modelo/session.php";
	include_once "../controlador/usuarios_controlador.php";

	$sessionUsuario = new Session();
	$usuario = new Usuarios_modelo();
	//$musuario = new Usuarios_modelo();

	if(isset($_POST['btnRegistrar'])){
		$inputUsuario = $_POST['regUsu'];
		$inputNombre = $_POST['regNom'];
		$inputApellido = $_POST['regApe'];
		$inputCorreo = $_POST['regCorr'];
		$inputCelular = $_POST['regCel'];
		$inputContraseña = $_POST['regContra'];
		$inputFecha = $_POST['regFecha'];
		$inputSexo = $_POST['regSexo'];

		if($oUsuarios->crearUsuario($inputUsuario, $inputNombre, $inputApellido, $inputCorreo, $inputCelular, $inputContraseña, $inputFecha, $inputSexo)==true){
			echo "El usuario fue agregado exitosamente";
			header("location: vista_admin_usuario.php");
		}else{
			echo "Algo no salio bien";
		}
	}

	//$sesion = $sessionUsuario->getSession();


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Admin Usuarios</title>
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
				<a href="vista_administrador.php" class="navbar-brand link-personalizado"><span class="glyphicon glyphicon-search"></span> Formularios Salutogenesis</a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right nav-personalizado">
					<li><a href="vista_admin_formulario.php">Formularios</a></li>
					<li><a href="vista_admin_usuario.php">Usuarios</a></li>
					<li><a href="vista_admin_buscar.php">Busqueda</a></li>
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
							<div class="contenedo-usuario">
								<img src=""><span class="glyphicon glyphicon-user"></span>
							</div>
							<ul class="dropdown-menu">
								<li><a href="vista_acerca.php">Acerca de</a></li>
								<li><a href="vista_perfil.php?usuario=<?php echo $sesion; ?>">Mi perfil</a></li>
								<li><a href="../controlador/salir_controlador.php">Salir</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!--TABLA DE USUARIOS-->	
	<div class="container">
		<div style="text-align: center; font-size: 40px; font-family: 'Squada One', cursive; color: white;">
			<h1>Usuarios</h1>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="table table-hover tabla-formulario">
						<thead class="tabla-cabeza">
						<tr style="background-color: green; color: white;">
							<th>ID</th>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Correo</th>
							<th>Celular</th>
							<th>Contraseña</th>
							<th>Fecha Nacimiento</th>
							<th>Sexo</th>
							<th colspan="2" style="text-align: center;">Opciones</th>
						</tr>
						</thead>
						<?php 

							
							$sesion = $sessionUsuario->getSession();

							//$listaUsuarios = $musuario->get_usuarios();
							if(isset($_GET["pagina"])){
								if($_GET["pagina"] == 1){
									header("location: ../vista/vista_admin_usuario.php");
								}else{
									$pagina = $_GET["pagina"];
								}
							}else{
								$pagina = 1;
							}
							

							$tamañoPagina = 5;

							$empezar = ($pagina - 1) * $tamañoPagina;

							$numFilas = $usuario->obtenerUsu();

							$totalPaginas = ceil($numFilas / $tamañoPagina);

							$listaUsuarios = $oUsuarios->get_usuarios($empezar, $tamañoPagina);

							foreach ($listaUsuarios as $registro ) {
								
							
						 ?>
					<tr class="tabla-elementos">
					<td style="font-size: 20px; font-family: 'Squada One', cursive;"><?php echo $registro['idUsuario']; ?></td>
					<td id="nombreUsu"><?php echo $registro['usuario']; ?></td>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['apellido']; ?></td>
					<td><?php echo $registro['correo']; ?></td>
					<td><?php echo $registro['celular']; ?></td>
					<td><?php echo $registro['contraseña']; ?></td>
					<td><?php echo $registro['fecha']; ?></td>
					<td><?php echo $registro['sexo']; ?></td>
					<td><a href="vista_actualizar_usuarios.php?id=<?php echo $registro['idUsuario'] ?>&usuario=<?php echo $registro['usuario']; ?>&nombre=<?php echo $registro['nombre']; ?>&apellido=<?php echo $registro['apellido'] ?>&correo=<?php echo $registro['correo'] ?>&celular=<?php echo $registro['celular'] ?>&contraseña=<?php echo $registro['contraseña'] ?>&fecha=<?php echo $registro['fecha'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
					<td><a href="../controlador/administrador_borrar_usuario.php?id=<?php echo $registro['idUsuario']; ?>"><button class="btn btn-danger">Borrar</button></a></td>
							
					</tr>

						 <?php 
						 	}

						  ?>
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
				<div style="text-align: center; border-radius: 4px;">
						<button class="boton-primario btn-lg" data-toggle="modal" data-target="#crear" style="margin: 20px; border-radius: 4px;">Agregar</button>
				</div>

				<div class="modal fade" id="crear">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
								<h3>Crear Nuevo Usuario</h3>
							</div>
							<div class="modal-body">
								<form method="post" name="formularioUsuario" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<div class="form-group">
										<label>Usuario</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-user"></span></div>
											<input type="text" name="regUsu" class="form-control" placeholder="Cris12">
										</div>
									</div>
									<div class="form-group">
										<label>Nombre</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-pencil"></span></div>
											<input type="text" name="regNom" required class="form-control" placeholder="Cristian">
										</div>
									</div>
									<div class="form-group">
										<label>Apellido</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-pencil"></div>
											<input type="text" name="regApe" class="form-control" placeholder="Checa">
										</div>
									</div>
									<div class="form-group">
										<label>Correo</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-envelope"></span></div>
											<input type="email" name="regCorr" required class="form-control" placeholder="555@hotmail.com">
										</div>
									</div>
									<div class="form-group">
										<label>Celular</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-pencil"></div>
											<input type="text" name="regCel" required class="form-control" placeholder="82216">
										</div>
									</div>
									<div class="form-group">
										<label>Contraseña</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-pencil"></div>
											<input type="password" name="regContra" required class="form-control" placeholder="user15">
										</div>
									</div>
									<div class="form-group">
										<label>Fecha</label>
										<div class="input-group">
											<div class="input-group-addon caja"><span class="glyphicon glyphicon-calendar"></span></div>
											<input type="date" name="regFecha" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label>Sexo</label>
										<br>
										<label>
											<input type="radio" name="regSexo" value="Masculino"> Masculino
											<input type="radio" name="regSexo" value="Femenino"> Femenino
										</label>
										</div>
									<div class="form-group">
										<input type="submit" class="btn boton-ejec" name="btnRegistrar" value="Aceptar">
									</div>
								</form>
							</div>
							<div class="modal-footer">
									<button class="btn " data-dismiss="modal">Cancelar</button>
							<script type="text/javascript">
								(function(){
									var formulario = document.getElementsByName("formularioUsuario")[0],
										elementos = formulario.elements,
										boton = document.getElementById("btnRegistrar");

									var validarCampo = function(e){
										if(formulario.regUsu.value == 0){
											alert("Inserta un valor para continuar");
											e.preventDefault();
										}

									};

									var validar = function(e){
										validarNombre(e);
									};

									formulario.addEventListener("submit", validar);	
								}())
							</script>		
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>



	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>

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

</body>
</html>