<?php
namespace Controllers;

use Model\Plan;
use MVC\Router;

class PlanController{

    public static function mostrarPlanes(Router $router){
        // Obtener todos los planes
        $planes = Plan::all();
        
        // Renderizar la vista para mostrar los planes
        $router->render('plan/mostrar-planes', [
            'planes' => $planes
        ]);
    }

    public static function mostrarPlanesU(Router $router){
        // Obtener todos los planes
        $planes = Plan::all();
        
        $router->render('plan/mostrar-planes-u', [
            'planes' => $planes
        ]);
    }
    
    public static function crearPlan(Router $router){

            $alertas=[];
            $plan=new Plan ($_POST);
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $plan->sincronizar($_POST);
                $resultado= $plan->guardar();
                Plan::setAlerta('exito', 'Plan creado exitosamente.');

            } 
            $alertas= Plan::getAlertas();
            $router->render('plan/crear-plan',[
                'plan' => $plan,
                'alertas' => $alertas
            ]);
    }

    public static function modificarPlan(Router $router){

        $alertas=[];
        $plan=new Plan ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if (empty($alertas)){
                $planE=Plan::where('id', $plan->id);
                if ($planE){
                    if (!$plan->nombre){
                        $plan->nombre=$planE->nombre;
                    }
                    if (!$plan->cantidad){
                        $plan->cantidad=$planE->cantidad;
                    }
                    if (!$plan->precio){
                        $plan->precio=$planE->precio;
                    }
                    $resultado= $plan->guardar();
                    Plan::setAlerta('exito', 'Plan modificado exitosamente.');
                }
                else{
                    Plan::setAlerta('error', 'Este plan no existe.');
                }
            }
            
        } 
        $alertas= Plan::getAlertas();
        $router->render('plan/modificar-plan',[
            'plan' => $plan,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarPlan(Router $router){

        $alertas=[];
        $plan=new Plan ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $planE=Plan::where('id', $plan->id);
            if ($planE){
                $plan->sanitizarAtributos($_POST);
                $plan->eliminar($_POST);
                $resultado= $plan->guardar();
                Plan::setAlerta('exito', 'Plan eliminado exitosamente.');
            }
            else{
                Plan::setAlerta('error', 'Este plan no existe.');
            }

        } 
        $alertas= Plan::getAlertas();
        $router->render('plan/eliminar-plan',[
            'plan' => $plan,
            'alertas' => $alertas
        ]);
    }

}