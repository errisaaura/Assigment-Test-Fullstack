<?php 
    session_start();
    unset($_SESSION["id_user"]);
    unset($_SESSION["email"]);
    unset($_SESSION["firstname"]);
    unset($_SESSION["role"]);
    unset($_SESSION['login']);
    session_destroy();

    header("Location: ../login/login.php")
?>