<?php
namespace Controllers;

use Model\Clase;
use Model\Usuario;
use Model\Inscrita;
use Model\Plan;
use Model\Suscripcion;
use MVC\Router;

class ClaseController{

    public static function inscribirClase (Router $router){

        $alertas=[];
        $clase=new Clase ($_POST);
        $cInscrita=new Inscrita;
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $loggedInEmail = $_SESSION['email'] ?? null;
            $userId=Usuario::where('email', $loggedInEmail);
            $susId=$userId->suscripcionId;
            $planId= Suscripcion::where('id', $susId);
            $planId=$planId->planId;
            $limite=Plan::where('id', $planId);
            $limite=$limite->cantidad;
            $i=0;
            $parametros=0;

            $userId=$userId->id;
            $existe=Clase::where('id', $clase->id);
            
            if ($existe){
                $cInscrita->userId=$userId;
                $cInscrita->claseId=$clase->id;
                $parametros++;
            }
            else{
                Clase::setAlerta('error', 'Esta clase no existe.');
            }

            if (!$repetido){
                $parametros++;
            }
            else{
                Clase::setAlerta('error', 'Ya ha inscrito esta clase.'); 
            }
            if ($i<$limite){
                $parametros++;
                if ($parametros==3){
                    $i++;
                    $resultado= $cInscrita->guardar();
                    Clase::setAlerta('exito', 'Clase inscrita exitosamente.');
                }
            }
            else{
                Clase::setAlerta('error', 'Ha llegado a su límite de clases.');
            }




        } 
        $alertas= Inscrita::getAlertas();
        $alertas= Clase::getAlertas();
        $router->render('clase/inscribir-clase',[
            'clase' => $clase,
            'alertas' => $alertas
        ]);
    }

    public static function cancelarClase(Router $router){

        $alertas=[];
        $cInscrita=new Inscrita ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cInscritaE=Inscrita::where('claseId', $cInscrita->claseId);
            if ($cInscritaE){
                $cInscrita=$cInscritaE;
                $cInscrita->eliminar();
                $resultado= $cInscrita->guardar();
                Inscrita::setAlerta('exito', 'Ha eliminado su inscripción a la clase.');
            }
            else{
                Inscrita::setAlerta('error', 'No ha inscrito esta clase.');
            }

        } 
        $alertas= Inscrita::getAlertas();
        $router->render('clase/cancelar-clase',[
            'inscrita' => $cInscrita,
            'alertas' => $alertas
        ]);
    }

    public static function mostrarClases(Router $router){
        // Obtener todos los planes
        $clases = Clase::all();
        
        // Renderizar la vista para mostrar los planes
        $router->render('clase/mostrar-clases', [
            'clases' => $clases
        ]);
    }

    public static function mostrarClasesU(Router $router){
        // Obtener todos los planes
        $clases = Clase::all();
        
        // Renderizar la vista para mostrar los planes
        $router->render('clase/mostrar-clases-u', [
            'clases' => $clases
        ]);
    }

    public static function crearClase (Router $router){

        $alertas=[];
        $clase=new Clase ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $clase->sincronizar($_POST);
            $alertas=$clase->validarCrearClase();
            $resultado= $clase->guardar();
        } 
        $alertas= Clase::getAlertas();
        $router->render('clase/crear-clase',[
            'clase' => $clase,
            'alertas' => $alertas
        ]);
    }
    public static function modificarClase (Router $router){

        $alertas=[];
        $clase=new Clase ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if (empty($alertas)){
                $claseE=Clase::where('id', $clase->id);

                $clase->nombre=$claseE->nombre;
                $clase->instructor=$claseE->instructor;
                
                if ($claseE){
                    $resultado= $clase->guardar();
                }

            }
            else{
                
            }
            
        } 
        $router->render('clase/modificar-clase',[
            'clase' => $clase,
            'alertas' => $alertas]);
    }

    public static function eliminarClase(Router $router){

        $alertas=[];
        $clase=new Clase ($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $claseE=Clase::where('id', $clase->id);
            if ($claseE){
                $clase->eliminar($_POST);
                $resultado= $clase->guardar();
                Clase::setAlerta('exito', 'Clase eliminads exitosamente.');
            }
            else{
                Clase::setAlerta('error', 'Esta clase no existe.');
            }

        } 
        $alertas= Clase::getAlertas();
        $router->render('clase/eliminar-clase',[
            'clase' => $clase,
            'alertas' => $alertas
        ]);
    }

    
}