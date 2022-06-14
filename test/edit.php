<?php
require ('../vendor/autoload.php');
require ('../app/Config/parametros.php');

use App\Models\Palabra;
?>
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='author' content='Rafael Yuste Barrera'>
<meta name='copyright' content='Propietario del copyright'>
<title>Edit</title>
</head>
<body>
    <h1>Editar</h1>
<?php
$palabra = Palabra::getInstancia();
echo "Estás editando: ". $palabra->get($_GET["id"]).".";
?>
    <form method="POST">
        <input type="text" name="wordNew" placeholder="Nueva Palabra">
        <input type="submit" name="edit" value="Editar">
    </form>
</body>
</html>


<?php
if ((isset($_POST["edit"])) && !($_POST["wordNew"] == "")) {
    $array=["id"=>$_GET["id"],"palabra"=> $_POST["wordNew"]];
    $palabra->edit($array);
    header('Location: test.php');
}
?>
