<?php
require ('../vendor/autoload.php');
require ('../app/Config/parametros.php');

use App\Models\Palabra;
$palabra = Palabra::getInstancia();
$palabra->delete($_GET["id"]);
echo "BORRADO CON EXITO";
header('Location: test.php');
?>