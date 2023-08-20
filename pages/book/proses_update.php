<?php
include "../../helper/db.php";
session_start();

$id_book = $_GET['id_book'];
$title = $_POST['title'];
$description = $_POST['description'];


if ($_FILES['image']['size'] > 0) {
    $image = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($file_tmp, "../../image/" . $image);
    $upfile = mysqli_query($conn, "update book set image='" . $image . "' where id_book = '" . $id_book . "' ");
}

$update = mysqli_query($conn, "update book set title='" . $title . "', description='" . $description . "' where id_book='" . $id_book . "'");

if ($update) {
    if ($_SESSION['role'] == "admin") {
        echo "<script>alert('Success edit book');location.href='daftar_book_admin.php';</script>";
    } elseif (($_SESSION['role'] == "member")) {
        echo "<script>alert('Success edit book');location.href='daftar_book_member.php';</script>";
    }
} else {
    printf('Failed edit book : ' . mysqli_error($conn));
}
