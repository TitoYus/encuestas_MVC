<?php
namespace App\Models;

abstract class DBAbstractModel{
    private static $db_host = DB_HOST;
    private static $db_user = DB_USER;
    private static $db_pass = DB_PASS;
    private static $db_name = DB_NAME;
    private static $db_port = DBPORT;

    protected $mensaje ='';
    protected $conn; // Manejador de la BD

    //Manejo  básico para consultas consultas.
    protected $query;  //consulta
    protected $parametros=array();  //parámetros de entrada
    protected $rows = array(); //array con los datos de salida

    //Metodos abstractos para implementar los diferentes modulos.
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    // Crear conexión a la BD
    protected function open_connection() {
        $dsn = 'mysql:host=' . self::$db_host . ';'
              . 'dbname=' . self::$db_name . ';' 
              . 'port='  . self::$db_port;
        try {
          $this->conn = new \PDO($dsn, self::$db_user, self::$db_pass,
                               array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          return $this->conn;
        } 
        catch (\PDOException $e) {
          printf("Conexión fallida: %s\n", $e->getMessage());
          exit();
      }
    }

    // Metodo que devuelve el ultimo id insertado
    public function lastInsert() {
        return $this->conn->lastInsertId();
    }

    // Desconectar la BD
    protected function close_connection() {
        $this->conn = null;
    }

    // Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
    // Consulta que no devuelve tuplas de la tabla
    protected function execute_single_query() {
        if($_POST) {
            $this->open_connection();
            $this->conn->query($this->query);
            self:$this->close_connection();
        } 
        else {
            $this->mensaje = 'Metodo no permitido';
        }
    }


    // Ejecutar un query que devuelve tuplas de la tabla
    // Consulta que devuelve tuplas de la tabla
    protected function get_results_from_query() 
    {
      $this->open_connection();
      if (($_stmt = $this->conn->prepare($this->query))) {
         #PREG_PATTERN_ORDER flag para especificar como se cargan los resultados en $named.
         if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
            $_named = array_pop($_named);
            foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $this->parametros[substr($_param, 1)]);
            }
         }

      try {
         if (! $_stmt->execute()) {
            printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
         }

         $this->rows = $_stmt->fetchAll(\PDO::FETCH_ASSOC);
         $_stmt->closeCursor();
      } 
      catch(\PDOException $e){
            printf("Error en consulta: %s\n" , $e->getMessage());
      }
      }    
}  

}
?>