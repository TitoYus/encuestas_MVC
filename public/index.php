<?php
// require el autoload 
require '../vendor/autoload.php';
require '../app/Config/parametros.php';
   
use App\Controllers\DefaultController;
use App\Controllers\PalabraController;
use App\Core\Router;

$router = new Router();
$router->add(array(
    'name'=>'index', 
    'path'=>'/^\/$/', 
    'action'=>[PalabraController::class, 'mostrarIndexAction']));
$router->add(array(
    'name'=>'listar',
    'path'=>'/^\/listar$/',
    'action'=>[PalabraController::class, 'listarPalabrasAction']));
$router->add(array(
    'name'=>'borrar',
    'path'=>'/^\/borrar\/[0-9]+$/',
    'action'=>[PalabraController::class, 'borrarPalabraAction']));
$router->add(array(
    'name'=>'editar',
    'path'=>'/^\/editar\/[0-9]+$/',
    'action'=>[PalabraController::class, 'editPalabraAction']));
$router->add(array(
    'name'=>'add',
    'path'=>'/^\/add$/',
    'action'=>[PalabraController::class, 'addPalabraAction']));

$request=str_replace(DIRBASE,'',$_SERVER['REQUEST_URI']);

$route = $router->matcher($request);
        
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo '<br>' . 'No se encuentra la ruta';
}
?>