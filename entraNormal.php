<?php
    session_start();
    if (isset($_SESSION['rol']) && $_SESSION['rol']=='user') {
        echo "Hola ".$_SESSION['user'].", eres un usuario normal";
    } else {
        header('Location: ./principal.php');
    }
?>