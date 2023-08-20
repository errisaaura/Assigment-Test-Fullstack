<?php
session_start();

function isLogin()
{
    if (!isset($_SESSION['id_user'])) {
        header('location: ../login/login.php');
    }
}
