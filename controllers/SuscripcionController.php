<?php
namespace Controllers;

use Model\Usuario;
use Model\Suscripcion;
use Model\Plan;
use MVC\Router;

class SuscripcionController{

    public static function realizarSuscripcion(Router $router){

        $planes = Plan::all();

        $alertas=[];
        $suscripcion=new Suscripcion ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $suscripcion->sincronizar($_POST);

            $tiempo= $suscripcion->meses;
            $plan=Plan::where('id', $suscripcion->planId);
            $costo= $tiempo*$plan->precio;

            $loggedInEmail = $_SESSION['email'] ?? null;
            $suscripcionE=Usuario::where('email', $loggedInEmail);
            
            if ($suscripcionE->suscripcionId == 0){

                $resultado= $suscripcion->crear();

                $suscripcionE->suscripcionId=$resultado['id'];
                $resultado= $suscripcionE->guardar();

                Plan::setAlerta('exito', 'Debe realizar un pago de $' . $costo . ' en la caja del gimnasio.');
            }
            else{
                Plan::setAlerta('error', 'Ya posee una suscripción');
            }
            
        } 
        $alertas= Suscripcion::getAlertas();
        $router->render('suscripcion/realizar-suscripcion',[
            'suscripcion' => $suscripcion,
            'planes' => $planes,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarSuscripcion(Router $router){

        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $loggedInEmail = $_SESSION['email'] ?? null;
            $suscripcionE=Usuario::where('email', $loggedInEmail);
            if ($suscripcionE){
                $suscripcionE->eliminar($_POST);
                $resultado= $suscripcionE->guardar();
                $router->render('auth/principal');
            }

        } 
        $alertas= Suscripcion::getAlertas();
        $router->render('suscripcion/eliminar-suscripcion',[
            'suscripcion' => $suscripcionE,
            'alertas' => $alertas
        ]);
    }
}