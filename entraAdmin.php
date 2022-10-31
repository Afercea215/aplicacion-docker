<?php
    session_start();
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol']=='admin') {
            echo "Hola ".$_SESSION['user'].", eres administrador";    
            echo date("d/m/y \a \l\a\s H:i", $_SESSION['fechaLog']);
        } else {
            header('Location: ./principal.php');
        }
    } else {
        header('Location: ./principal.php');
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
        <button type="logOut" name="logOut">log out</button>
    </form>
    
</body>
</html>