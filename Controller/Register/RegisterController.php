<?php 
    include_once('../../Model/User/users.php');

    if(isset($_POST['btnCrear'])){
        if(validateForm($_POST) == true){
            postUser();
        }else{
            echo('Lo siento no tienes que llenar campos primero');
        }
    }

    function postUser(){
        $objUser = new Usuarios_modelo();

        if($objUser->crearUsuario($_POST['inp_usuario'], $_POST['inp_nombre'], $_POST['inp_apellido'],
                                  $_POST['inp_correo'], $_POST['inp_telefono'], $_POST['inp_contra'],
                                  $_POST['inp_fecha'], $_POST['inp_genero'])
        ){
          header('location: ../../View/Login/LoginPage.php');  
          // buscar la forma de que no deje logearse como admin
        }else{
            echo('No se pudo guardar la informacion');
        }
    }

    function validateForm($arrayForm){

        $errors = 0;
        foreach($arrayForm as $arrayValue){
            if($arrayValue == ''){
                $errors++;
            }
        }

        if($errors !== 0){
            return false;
        }else{
            return true;
        }

    }

?>