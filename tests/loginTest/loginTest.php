<?php

use PHPUnit\Framework\TestCase;
use SebastianBergmann\Environment\Console;

require_once('../../Model/User/user.php');

class loginTest extends TestCase{

    
    public function testAdminLogin(){
        
        $objUser = new Usuario();
        var_dump($objUser->usuarioExiste('Cris12', 'admin12'));//para ver info usar --debug
        $this->assertIsBool($objUser->usuarioExiste('Cris12', 'admin12'));
    }

    public function testNormalLogin(){
        $objUser = new Usuario();
        var_dump($objUser->existe(null, null));
        $this->assertIsBool($objUser->existe(null, null));
        $this->assertEquals(false, $objUser->existe(null, null));
    }
} 

?>