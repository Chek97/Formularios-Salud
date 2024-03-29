<?php 
	include_once "../../Model/User/user.php";
	include_once "../../Model/Session/session.php";
	include_once "../../Controller/usuarios_controlador.php";

	$sessionUsuario = new Session();
	$usuario = new Usuarios_modelo();

	if(isset($_POST['b'])){
		$inputId = $_GET['id'];
		header("location: ../controlador/administrador_borrar_usuario.php?id1=$inputId");
	}

	if(isset($_POST['btnRegistrar'])){
		$inputUsuario = $_POST['regUsu'];

		if($usuario->validarUsuario($inputUsuario) == true){
			echo "<script>alert('Ya existe un usuario: $inputUsuario'); </script>";
		}else{
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
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Usuarios</title>
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
							<li><a href="../../controlador/salir_controlador.php">Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>	
	<div class="container">
		<div style="text-align: center; font-size: 40px; font-family: 'Squada One', cursive; color: white;">
			<h1>Usuarios</h1>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="table table-hover tabla-formulario">
						<thead class="tabla-cabeza">
						<tr class="cabeza-titulo">
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

							if(isset($_GET["pagina"])){
								if($_GET["pagina"] == 1){
									header("location: AdminUserPage.php");
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

								if($registro['idUsuario'] != 1){
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
							<td><a href="AdminUserUpdate.php?id=<?php echo $registro['idUsuario'] ?>&usuario=<?php echo $registro['usuario']; ?>&nombre=<?php echo $registro['nombre']; ?>&apellido=<?php echo $registro['apellido'] ?>&correo=<?php echo $registro['correo'] ?>&celular=<?php echo $registro['celular'] ?>&contraseña=<?php echo $registro['contraseña'] ?>&fecha=<?php echo $registro['fecha'] ?>"><button class="btn btn-success">Actualizar</button></a></td>
							<td><a href="#" onclick="confirmar(<?php echo $registro['idUsuario']; ?>)"><button class="btn btn-danger">Borrar</button></a></td>
							
						</tr>
						<?php
						 		} 
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
				<button class="btn btn-lg" data-toggle="modal" data-target="#crear" style="margin: 20px; border-radius: 4px; background-color: white;">Agregar</button>
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
										<input type="submit" class="btn" name="btnRegistrar" value="Aceptar">
									</div>
								</form>
							</div>
							<div class="modal-footer">
									<button class="btn" data-dismiss="modal">Cancelar</button>
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