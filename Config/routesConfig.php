<?php
    //DEFINE CONSTANTS
    //INIT
    define('INIT_LINK', 'localhost/Proyectos/formulariosSalud');

    define('LOGIN_LINK', INIT_LINK . '/vista/vista_login.php');

    //SUB MENU
    define('MENU_ABOUT', INIT_LINK . '/vista/vista_acerca.php');
    define('MENU_PROFILE', INIT_LINK . '/vista/vista_perfil.php');

    //ADMIN ROUTES
    define('ADMIN_INDEX', INIT_LINK . '/vista/vista_administrador.php');
    
    define('ADMIN_FORMS', INIT_LINK . '/vista/vista_admin_formulario.php');
    define('ADMIN_UPDATE_FORM', INIT_LINK . '/vista/vista_admin_actualizar_formulario.php'); //id, titulo, descripcion
    
    define('ADMIN_USERS', INIT_LINK . '/vista/vista_admin_usuario.php');
    define('ADMIN_UPDATE_USERS', INIT_LINK . '/vista/vista_actualizar_usuarios.php'); //id, usuario, nombre, apellido, correo, celular, contraseña, fecha
    
    define('ADMIN_SEARCH', INIT_LINK . '/vista/vista_admin_buscar.php');

    //POLLSTER ROUTES

    define('POLLSTER_INDEX', INIT_LINK . '/vista/vista_encuestador.php');

    define('POLLSTER_FORMS', INIT_LINK . '/vista/vista_encuestador_formularios.php');
    define('POLLSTER_SEARCH', INIT_LINK . '/vista/vista_buscar.php');
    define('POLLSTER_ADD_QUESTION', INIT_LINK . '/vista/vista_crearPreguntas.php'); //iden
    define('POLLSTER_UPDATE_FORM', INIT_LINK . '/vista/vista_actualizar_formulario.php'); //id, titulo, descripcion
    // FALTA OTRO AQUI

    //USER ROUTES
    define('USER_INDEX', INIT_LINK . '/vista/vista_usuarios.php');

    define('USER_FORMS', INIT_LINK . '/vista/vista_usuarios_formularios.php');
    define('USER_FORM_ANSWER', INIT_LINK . '/vista/vista_responder_formulario.php'); //id, num
    
    define('USER_SEARCH', INIT_LINK . '/vista/vista_buscar.php');

?>