<?php
require ('../vendor/autoload.php');
require ('../app/Config/parametros.php');

use App\Models\Palabra;
$palabra = Palabra::getInstancia();

if (isset($_POST["add"]))
    $palabra->set(['palabra', $_POST["word"]]);
?>
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='author' content='Rafael Yuste Barrera'>
<meta name='copyright' content='Propietario del copyright'>
<title>Palabra</title>
</head>
<body> 
    <h1>Palabras MVC</h1>
    <form action="" method="POST">
        <input placeholder="Nueva Palabra" type="text" name="word">
        <input type="submit" name="add" value="Añadir">
    </form>
<?php
foreach ($palabra->getAll() as $palabra) {
    echo $palabra['palabra'] . ' <a href="edit.php?id=' . $palabra['id'] . '">Edit</a> <a href="delete.php?id=' . $palabra['id'] . '">Delete</a><br>';   
}
?>
<a href=""></a>
</body>
</html>