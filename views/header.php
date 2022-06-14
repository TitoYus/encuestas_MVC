<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='author' content='Rafael Yuste Barrera'>
<meta name='copyright' content='Propietario del copyright'>
<title>YusteMan</title>
</head>
<body>
    <h1>Palabras MVC</h1>
    <form action="<?php echo DIRBASE."/add"?>" method="POST">
        <input type="text" name="palabra" placeholder="Nueva Palabra">
        <input type="submit" name="add" value="Añadir">
    </form>
    <a href="<?php echo DIRBASE?>/listar">Listar</a>
</body>
</html>