<?php

use PHPUnit\Framework\TestCase;
require('../../Model/Forms/forms.php');

class pollsterTest extends TestCase {
    
    public function additionProvider(){
        return [
            [''], 
            [null]
        ];
    }


    /**
    * @dataProvider additionProvider
    */
    public function testObtenerPropios4($user){

        $objForms = new Formulario_modelo();
        $this->assertIsArray($objForms->obtenerUltimos4($user));

    }
}


?>