<?php
    session_start();
    session_destroy();
    echo"Vous allez être déconnecté et rediréger à la page d'accueil";
    header("refresh:2;url=pages/index.php");
?>