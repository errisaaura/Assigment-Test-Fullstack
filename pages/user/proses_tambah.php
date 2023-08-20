<?php
if ($_POST) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $birthday_date = $_POST['birthday_date'];
    $phone = $_POST['phone'];

    if (empty($role)) {
        echo "<script>alert('Role tidak boleh kosong');location.href='form_tambah.php';</script>";
    } else {
        include "../../helper/db.php";

        $insert = mysqli_query($conn, "insert into user (firstname, lastname, email, password, role, birthday_date, phone) value ('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $password . "', '" . $role . "', '" . $birthday_date . "','" . $phone . "')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan Data User');location.href='daftar_user.php'</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Data User');location.href='form_tambah.php';</script>";
        }
    }
}
