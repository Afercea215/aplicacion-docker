<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ./login.php');
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
    <a href="./entraAdmin.php">Entra admin</a>
    <a href="./entraNormal.php">Entra normal</a>
</body>
</html>