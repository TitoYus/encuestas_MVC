<?php
namespace App\Models;

require_once('DBAbstractModel.php');

class Palabra extends DBAbstractModel{
    //CONSTRUCCIÓN DEL MODELO SINGLETON/
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $palabra;
    private $created_at;
    private $updated_at;
    
    //setters y getters
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getPalabra() {
        return $this->palabra;
    }
    public function setPalabra($palabra) {
        $this->palabra = $palabra;
    }
    public function getCreated_at() {
        return $this->created_at;
    }
    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }
    public function getUpdated_at() {
        return $this->updated_at;
    }
    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function set() {
        $this->query = "INSERT INTO palabras (id,palabra) VALUES (NULL, :palabra)";
        $this->parametros['palabra'] = $this->palabra;
        $this->get_results_from_query();
        $this->mensaje = 'Palabra agregada';
    }

    public function get($id = '') {
        if ($id != '') {
            $this->query = "SELECT * FROM palabras WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Palabra encontrada';
        } else {
            $this->mensaje = 'Palabra no encontrada';
        }
        return $this->rows[0]["palabra"];
    }

    public function edit() {
        $this->query = "UPDATE palabras SET palabra = :palabra WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['palabra'] = $this->palabra;
        $this->get_results_from_query();
        $this->mensaje = "Palabra actualizada";
    }

    public function delete($id = '') {
        $this->query = "DELETE FROM palabras WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Palabra eliminada";
    }
    
    public function getAll(){
        $this->query = "SELECT * FROM palabras";
        $this->get_results_from_query();
        return $this->rows;
    }
}