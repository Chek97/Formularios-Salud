<?php 

    require_once("../modelo/formularios_modelo.php");

    include_once("../modelo/session.php");


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Usuarios</title>
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
                    <li><a href="vista_usuarios_formularios.php">Formularios</a></li>
                    <li><a href="#">Busqueda</a></li>
                    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="contenedo-usuario">
                                <img src=""><span class="glyphicon glyphicon-search"></span>
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>
</body>
</html>