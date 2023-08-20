<?php

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)) {
        echo "<script>alert('Email tidak boleh kosong');location.href='login.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        include "../../helper/db.php";
        $query_login = mysqli_query($conn, "select * from user where email = '" . $email . "' and password = '" . md5($password) . "' ");
        if (mysqli_num_rows($query_login) > 0) {
            $dt_login = mysqli_fetch_array($query_login);
            if ($dt_login['role'] == "admin") {
                session_start();
                $_SESSION['id_user'] = $dt_login['id_user'];
                $_SESSION['email'] = $dt_login['email'];
                $_SESSION['firstname'] = $dt_login['firstname'];
                $_SESSION['role'] = "admin";
                $_SESSION['login'] = true;
                echo "<script>alert('Sukses login ke dashboard'); location.href='../dashboard/dashboard.php';</script>";
            } elseif ($dt_login['role'] == "member") {
                session_start();
                $_SESSION['id_user'] = $dt_login['id_user'];
                $_SESSION['email'] = $dt_login['email'];
                $_SESSION['firstname'] = $dt_login['firstname'];
                $_SESSION['role'] = "member";
                $_SESSION['login'] = true;
                echo "<script>alert('Sukses login ke dashboard'); location.href='../dashboard/dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Email dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}
