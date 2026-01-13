<?php
//error_reporting(0);

require_once 'controlador/TripulanteController.php'; // incluimos la declaración de la Clase AlumnoController
require_once 'controlador/AuthController.php';  // el controlador de autentificación y
require_once 'modelo/User.php';                 // el modelo de usuarios son cargados al empezar
																								// ambos son declaraciones de clases -> orientación a objetos pura
// Iniciar sesión
session_start();

$controller = new AuthController();  // se crea una instancia de controlador de usuario (que incluye conexión, tabla, y operatoria con usuarios)
$controllerCrud = new TripulanteController();
																							 // Simple enrutamiento basado en la URL. Se concentra aquí todo el redireccionamiento
$action = isset($_GET['action']) ? $_GET['action'] : 'login';


switch ($action) {             // más adelante, podemos venir desde el interior con una action particular en la url
    case 'login':
        $controller->login();              // si la action fuera login
        break;
    case 'authenticate':
        $controller->authenticate();      // si hay que autenticar
        break;
    case 'index':
        $controllerCrud->index();         // si vamos a la página interna de inicio de la aplicación
        break;
    case 'logout':
        $controller->logout();            // si cerramos la sesión
        break;
    case 'create':
    case 'edit':
    case 'delete':       // se invoca al método delete() de AlumnoController
        switch ($action) {
            case 'create':
                $controllerCrud->create();         // se invoca al método create() de AlumnoController
                break;
            case 'edit':
                $controllerCrud->edit();           // se invoca al método edit() de AlumnoController
                break;
            case 'delete':
                $controllerCrud->delete();         // se invoca al método delete() de AlumnoController
                break;
            default:
                $controllerCrud->index();          // por defecto, se invoca a index()
                break;
        }
        break;
    default:
        $controller->login();
        break;
    }
