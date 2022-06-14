<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='author' content='Rafael Yuste Barrera'>
<meta name='copyright' content='Propietario del copyright'>
<title>Listar Palabras</title>
</head>
<body>
<h1>Listado de Palabras</h1>
<?php 
echo "<table border='1'>";
echo "<tr>";
echo "<th>Palabra</th>";
echo "<th>Acciones</th>";
echo "</tr>";
foreach ($data as $palabra) {
    echo "<tr>";
    echo "<td>".$palabra['palabra']."</td>";
    echo "<td><a href='".DIRBASE."/editar/".$palabra['id']."'>Editar</a> <a href='".DIRBASE."/borrar/".$palabra['id']."'>Eliminar</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>