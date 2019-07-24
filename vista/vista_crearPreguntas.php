<?php 

	//require_once("../modelo/formularios_modelo");
	require_once("../controlador/preguntas_controlador.php");
	include_once("../modelo/formularios_modelo.php");
	include_once("../controlador/opciones_controlador.php");

	if(!isset($_POST['btnCrear'])){
		$idFormulario = $_GET['iden'];
	}else{
		$idFormulario = $_POST['Id'];

	}

	if(isset($_POST['btnCrear'])){


		$oFormularios = new Formulario_modelo();

		$inputDescripcion = $_POST['des'];
		$inputRequerido = $_POST['req'];
		$seleccion = $_POST['tipo'];

		if($seleccion=="seleccion" || $seleccion=="verificar"){
			
			$opciones = $_POST['numPreg'];
			$opciones1 = $_POST['numPreg1'];

			if($seleccion == "seleccion"){
				if($opciones == 0){
					echo "Debes ingresar al menos una opcion para seleccionar";
				}else{
					if($oPreguntas->crearPregunta($inputDescripcion, $inputRequerido, $seleccion, $idFormulario)==true){

						$nPreguntas = $oFormularios->getPreguntas($idFormulario);
						$nPreguntas +=1;

						if($oFormularios->setNumeroPregunta($nPreguntas, $idFormulario) == true){

							$idPregunta = $oPreguntas->getId($inputDescripcion);
							if($opciones == 1){
								$inputOpcion = $_POST['opc1'];
								if($oOpciones->crearOpciones($inputOpcion, $idPregunta) == true){
									echo "Se inserto la opcion correspondiente";
								}else{
									echo "No se inserto la opcion";
								}
							}else{
								for ($i=1; $i <= $opciones; $i++) { 
									$inputOpcion = $_POST['opc' . $i];
									if($oOpciones->crearOpciones($inputOpcion, $idPregunta) == true){
										echo "Se inserto la opcion " . $i;
									}else{
										echo "No se inserto";
									}
								}
							}
							header("location: vista_encuestador_formularios.php");
						}else{
							echo "Si se inserto pero no sumo a la pregunta";
						}

					}else{
						echo "No se inserto la pregunta";
					}
				}
			}else if($opciones1 == 0){
				echo "Debes ingresar al menos una opcion para seleccionar";
			}else{
				if($oPreguntas->crearPregunta($inputDescripcion, $inputRequerido, $seleccion, $idFormulario)==true){

					$nPreguntas = $oFormularios->getPreguntas($idFormulario);
					$nPreguntas +=1;

					if($oFormularios->setNumeroPregunta($nPreguntas, $idFormulario) == true){

						$idPregunta1 = $oPreguntas->getId($inputDescripcion);
						
						if($opciones1 == 1){
							$inputOpcion = $_POST['opc1'];
							if($oOpciones->crearOpciones($inputOpcion, $idPregunta1) == true){
								echo "Se inserto la opcion correspondiente";
							}else{
								echo "No se inserto la opcion";
							}
						}else{
							for ($i=1; $i <= $opciones1; $i++) { 
								$inputOpcion = $_POST['opc' . $i];
								if($oOpciones->crearOpciones($inputOpcion, $idPregunta1) == true){
									echo "Se inserto la opcion " . $i;
								}else{
									echo "No se inserto";
								}
							}
						}
						header("location: vista_encuestador_formularios.php");
					}else{
						echo "Si se inserto pero no sumo a la pregunta";
					}

				}else{
					echo "No se inserto la pregunta";
				}
			}
			
		}else{

			if($oPreguntas->crearPregunta($inputDescripcion, $inputRequerido, $seleccion, $idFormulario)==true){

					$nPreguntas = $oFormularios->getPreguntas($idFormulario);
					$nPreguntas +=1;

					if($oFormularios->setNumeroPregunta($nPreguntas, $idFormulario)==true){

						header("location: vista_encuestador_formularios.php");

					}else{
						echo "Si se inserto pero no sumo a la pregunta";
					}

				}else{
					echo "No se inserto la pregunta";
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

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Crear Preguntas</title>
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
					<li><a href="vista_encuestador_formularios.php">Formularios</a></li>
					<li><a href="#">Busqueda</a></li>
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

	<div class="container">
		<div class="contenedor-titulo" style="color: white;">
			<h1>Crea Una Pregunta</h1>
		</div>
		<div class="contenedor-formulario">
			<form name="formularioUsuario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="form-group">
					<input type="text" name="Id" class="hidden" value="<?php echo $idFormulario; ?>">
				</div>
				<div class="form-group">
					<label>Describe la pregunta</label>
					<input type="text" name="des" class="form-control">
				</div>
				<div class="form-group">
					<label>Requerido</label>
					<br>
					<label>
						<input type="radio" name="req" value="requerido"> SI
						<input type="radio" name="req" value="no requerido"> NO
					</label> 
				</div>
				<div class="form-group">
					<label>tipo</label>
			<!-- aqui va un dropbox-->
				<select name="tipo" onchange="crearOpciones(this.value);" class="form-control">
					<option  selected value="abierta">Abierta</option>
					<option value="seleccion">Seleccion multiple</option>
					<option value="verificar">Verificacion</option>
				</select>
				<div id="unica" align="center" style="display: none;">
					<label>Opciones:</label>
					<br>
						<select id="se" name="numPreg" required onchange="crearPreguntas(this.value);" class="form-control">
							<option selected value="0">Selecciona el numero de opciones</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
							<ul id="opcion" style="display: none;">
								<li id="o1" style="display: none;"></li>
								<li id="o2" style="display: none;"></li>
								<li id="o3" style="display: none;"></li>
								<li id="o4" style="display: none;"></li>
								<li id="o5" style="display: none;"></li>
							</ul>
							<!--Se necesita que cuando se presione la opcion otra vez, se oculten las que
							ya estaban y no afecte a las demas, o sino solo borrar la opcion y ya-->

				</div>
				<div id="multiple" style="display: none;">
					<label>Opciones:</label>
					<br>
						<select id="se1" name="numPreg1" required onchange="crearPreguntas1(this.value);" class="form-control">
							<option selected value="0">Selecciona el numero de opciones</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
							<ul id="opcion1" style="display: none;">
								<li id="l1" style="display: none;"></li>
								<li id="l2" style="display: none;"></li>
								<li id="l3" style="display: none;"></li>
								<li id="l4" style="display: none;"></li>
								<li id="l5" style="display: none;"></li>
							</ul>
				</div>				
			</div>
			<div style="width: 100%; text-align: center;">
				<input type="submit" name="btnCrear" id="btnCrear" value="Crear Pregunta" class="btn boton-ejec btn-lg">
			</div>
			</form>
				</div>
			<script type="text/javascript">
								(function(){
									var formulario = document.getElementsByName("formularioUsuario")[0],
										elementos = formulario.elements,
										boton = document.getElementById("btnCrear");

									var validarCampo = function(e){
										if(formulario.des.value == 0){
											alert("El campo esta vacio");
											e.preventDefault();
										}

									};

									var validarRadio = function(e){
										if(formulario.req[0].checked == true || formulario.req[1].checked == true ){

										}else{
											alert("completa el campo de requerido");
											e.preventDefault();
										}
									};

									var validarSeleccion = function(e){
										if(formulario.se.value == 0 && formulario.se1.value == 0 && formulario.tipo.value != "abierta"){
											alert("escribe al menos una opcion para esta pregunta");
											e.preventDefault();
										}
									};

									var validar = function(e){
										validarCampo(e);
										validarRadio(e);
										validarSeleccion(e);
									};

									formulario.addEventListener("submit", validar);	
								}())
			</script>	
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



 	<script src="../js/main.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="../js/vendor/bootstrap.min.js"></script>	 
 </body>
 </html>