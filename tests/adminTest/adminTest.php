<?php

use PHPUnit\Framework\TestCase;
require('../../Model/Forms/forms.php');
require('../../Model/User/users.php');

class AdminTest extends TestCase{

    public function testGet_formularios(){

        $objForm = new Formulario_modelo();
        //probar si retorna un array 
        $this->assertIsArray($objForm->get_formularios(5, 5));
        //probar con parametros nulos
        $this->assertIsArray($objForm->get_formularios(null, null));
        //probar que es un arreglo vacio si se envian nulos

    }

    /* ******************************************************************* 
                                FORMULARIOS
      ********************************************************************/

    public function testInformacionFormulario(){
        
        $objForm = new Formulario_modelo();
        $this->assertIsArray($objForm->informacionFormulario('Ambiental'));//si devuelve un arreglo 
        $this->assertIsArray($objForm->informacionFormulario(''));//si devuelve un arreglo
        $this->assertEquals([], $objForm->informacionFormulario(null)); 
    }

    public function testActualizarFormulario(){
        $objForm = new Formulario_modelo();

        //si hay datos vacios
        $this->assertIsBool($objForm->actualizarFormulario('', '', '2'));
        $this->assertNotTrue($objForm->actualizarFormulario('', '', '2'));
        //si hay valores nulos
        $this->assertIsBool($objForm->actualizarFormulario(null, null, null));
        $this->assertNotTrue($objForm->actualizarFormulario(null, null, null));
        //probar que la informacion que devuelve es un booleano
        $this->assertIsBool($objForm->actualizarFormulario('formulario registro4', 'formulario de pruebas12', '2'));
        $this->assertTrue($objForm->actualizarFormulario('formulario registro4', 'formulario de pruebas1', '2'));

    }

    /* ******************************************************************* 
                                Usuarios
      ********************************************************************/

    public function testValidarUsuario(){
        $objUser = new Usuarios_modelo();

        $this->assertIsBool($objUser->validarUsuario('dani24'));
        $this->assertTrue($objUser->validarUsuario('dani24'));
        
        $this->assertNotTrue($objUser->validarUsuario(''));
        $this->assertNotTrue($objUser->validarUsuario(null));
    }

    public function testCrearUsuario(){
        $objUser = new Usuarios_modelo();

        /* $this->assertEquals(true, $objUser->crearUsuario('', '', '', '', 0, '', '', ''));
        $this->assertEquals(true, $objUser->crearUsuario(null, null, null, null, null, null, null, null));

        $this->assertEquals(true, $objUser->crearUsuario('dan2', 'daniel', 'larusso', 'larusso23@hotmail.com', 31245555, 'colador', '12-03-1999', 'Masculino')); */
    }

    public function testGetUsuarios(){
        $objUser = new Usuarios_modelo();

        $this->assertIsArray($objUser->get_usuarios(5, 5));
        //probar con parametros nulos
        $this->assertIsArray($objUser->get_usuarios(null, null));
        //probar que es un arreglo vacio si se envian nulos
    }
}



?>