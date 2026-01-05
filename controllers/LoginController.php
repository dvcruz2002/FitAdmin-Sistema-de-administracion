<?php
namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $u = Usuario::where('email', $auth->email); // Use first() for single record

                if ($u) {
                    if ($u->verificarPassword($auth->password)) {
                        session_start();

                        $_SESSION['id'] = $u->id;
                        $_SESSION['nombre'] = $u->nombre . " " . $u->apellido; // Corrected concatenation
                        $_SESSION['email'] = $u->email;
                        $_SESSION['login'] = true;

                        if ($u->admin === "1") {
                            $_SESSION['admin'] = $u->admin ?? null;
                            header('Location: inicio-admin');
                        } else {
                            header('Location: inicio-user');
                        }
                    } else {
                        Usuario::setAlerta('error', 'Password errada.');
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado.');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/login', [
            'alertas' => $alertas,
        ]);
    }

    public static function modificarUsuario(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Usuario($_POST);

            $loggedInEmail = $_SESSION['email'] ?? null;

            if (empty($alertas)){
                $userE=Usuario::where('email', $loggedInEmail);
                if ($userE){
                    $user->id=$userE->id;
                    $user->nombre=$userE->nombre;
                    $user->apellido=$userE->apellido;
                    $user->admin=$userE->admin;
                    $user->token=$userE->token;
                    $user->password=$userE->password;
                    $resultado= $user->actualizar();
                    Usuario::setAlerta('exito', 'Usuario modificado exitosamente.');
                }
            }
            
        } 
        $alertas= Usuario::getAlertas();
        $router->render('auth/modificar-usuario',[
            'usuario' => $user,
            'alertas' => $alertas
        ]);

        $alertas = Usuario::getAlertas();
        $router->render('auth/modificar-usuario', [
            'alertas' => $alertas,
            // Optionally pre-fill form fields with logged-in user's data
            'usuario' => Usuario::where('email', $loggedInEmail), // Fetch by session email
        ]);
    }

    public static function logout(){
        
    }

    public static function olvide(Router $router){
        $router->render('auth/olvide-password',[

        ]);
    }

    public static function recuperar(){

    }

    public static function crearCuenta(Router $router){
        $usuario = new Usuario;

        $alertas=[];  
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario->sincronizar($_POST);
            $alertas= $usuario->validarNuevaCuenta();
        }

        if(empty($alertas)){

            $resultado = $usuario->existeUsuario();

            
            if ($resultado->num_rows){
                $alertas = Usuario::getAlertas();
            }
            else{
                //hashear clave
                $usuario->hashPassword();

                //generar token
                $usuario->crearToken();

                //aqui falta

                //crear el usuario 
                if ($usuario->nombre != "")
                {
                    $resultado = $usuario->guardar();
                    Usuario::setAlerta('exito', 'Usuario creado exitosamente.');
                }
            }
        }

        $router->render('auth/crear-cuenta',[
             'usuario' => $usuario,
             'alertas' => $alertas
        ]);
    }

}
