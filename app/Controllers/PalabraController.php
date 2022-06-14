<?php
namespace App\Controllers;

use App\Models\Palabra;

class PalabraController extends BaseController 
{
    public function addPalabraAction($request){
        if (isset($_POST['palabra'])) {
            $palabra = new Palabra();
            $palabra->setPalabra($_POST['palabra']);
            $palabra->set();
        }
        header('Location: ' . DIRBASE . '/listar');
    }
    public function editPalabraAction($request) {
        $ruta = explode('/', $request);
        $id = end($ruta);
        if (isset($_POST['palabra'])) {
            $palabra = new Palabra();
            $palabra->setPalabra($_POST['palabra']);
            $palabra->setId($id);
            $palabra->edit();
            header('Location: ' . DIRBASE . '/listar');
        }
        $this->renderHTML('..\views\edit.php');
    }
    public function borrarPalabraAction($request) {
        $ruta = explode('/', $request);
        $id = end($ruta);
        Palabra::getInstancia()->delete($id);
        header('Location: ' . DIRBASE . '/listar');
    }
    
    public function mostrarIndexAction(){
        $this->renderHTML('..\views\header.php');
    }

    public function listarPalabrasAction(){
        $data = [];
        $data = Palabra::getInstancia()->getAll();
        $this->renderHTML('..\views\header.php');
        $this->renderHTML('..\views\list.php', $data);
    }
}