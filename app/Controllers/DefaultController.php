<?php
//crear clase DefaultController
namespace App\Controllers;

class DefaultController 
{
    public function indexAction() {
        include '../views/index.php';
    }
    // funcion para duplicar el numero 
    public function duplicarAction($request){
        $numero = $request['numero'];
        $numeroDuplicado = $numero * 2;
        include '../views/mostrar_duplicar_view.php'; // primera opcion de mostrar la vista
    }
}