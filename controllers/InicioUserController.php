<?php
namespace Controllers;

use MVC\Router;
use Model\Usuario;

class InicioUserController{

    public static function inicioUser(Router $router){
        $router->render('auth/inicio-user');
    }

}