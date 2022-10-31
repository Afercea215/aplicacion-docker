<?php
    include "./bd.php";
    session_start();
    if (isset($_POST['submit'])) {
        $usuario=userExists($_POST['nombre'],$_POST['password']); 
        var_dump($usuario);
        if ($usuario != null) {
            session_start();
            $_SESSION['user']=$usuario[0]['nombre'];
            $_SESSION['rol']=$usuario[0]['rol'];
            date_default_timezone_set("Europe/Madrid");
            $_SESSION['fechaLog']=Time();
            echo "<br>";
            var_dump($_SESSION);
            header('Location: ./principal.php');
        }
    }

    if (isset($_POST['logOut'])) {
        var_dump(date("d/m/y \a \l\a\s H:i",($_SESSION['fechaLog']-Time()))); 
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./login.php" method="post">
        Nombre
        <input type="text" name="nombre">
        <br>
        Password
        <input type="text" name="password">
        <button type="submit" name="submit" value="enviar"></button>
    </form>
</body>
</html>