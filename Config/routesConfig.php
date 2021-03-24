<?php
    //DEFINE CONSTANTS
    //INIT
    define('INIT_LINK', 'Proyectos/formulariosSalud');

    define('LOGIN_LINK', 'View/Login/LoginPage.php');

    //SUB MENU
    define('MENU_ABOUT', 'Includes/about.php');//arreglar estas rutas 
    define('MENU_PROFILE', 'Includes/profile.php');

    //ADMIN ROUTES
    define('ADMIN_INDEX', 'View/Admin/AdminMainPage.php');
    
    define('ADMIN_FORMS', 'AdminFormPage.php');
    define('ADMIN_UPDATE_FORM', 'AdminFormUpdate.php'); //id, titulo, descripcion
    
    define('ADMIN_USERS', 'AdminUserPage.php');
    define('ADMIN_UPDATE_USERS', 'AdminUserUpdate.php'); //id, usuario, nombre, apellido, correo, celular, contraseña, fecha
    
    define('ADMIN_SEARCH', 'AdminSearchPage.php');

    //POLLSTER ROUTES

    define('POLLSTER_INDEX', 'View/Pollster/PollsterMainPage.php');

    define('POLLSTER_FORMS', INIT_LINK . '/vista/vista_encuestador_formularios.php');
    define('POLLSTER_SEARCH', INIT_LINK . '/vista/vista_buscar.php');
    define('POLLSTER_ADD_QUESTION', INIT_LINK . '/vista/vista_crearPreguntas.php'); //iden
    define('POLLSTER_UPDATE_FORM', INIT_LINK . '/vista/vista_actualizar_formulario.php'); //id, titulo, descripcion
    // FALTA OTRO AQUI

    //USER ROUTES
    define('USER_INDEX', 'View/User/UserMainPage.php');

    define('USER_FORMS', INIT_LINK . '/vista/vista_usuarios_formularios.php');
    define('USER_FORM_ANSWER', INIT_LINK . '/vista/vista_responder_formulario.php'); //id, num
    
    define('USER_SEARCH', INIT_LINK . '/vista/vista_buscar.php');

?>