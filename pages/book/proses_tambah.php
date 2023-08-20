<?php

include "../../helper/db.php";
session_start();

$title = $_POST['title'];
$description = $_POST['description'];

$image = $_FILES['image']['name'];
$size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($file_tmp, "../../image/" . $image);

if ($_SESSION['role'] == "admin") {

    $id_user = $_POST['id_user'];
    $sql = "insert into book (image, title, description, id_user) values ('" . $image . "', '" . $title . "', '" . $description . "', '" . $id_user . "' ) ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Success add book');location.href='daftar_book_admin.php'</script>";
    } else {
        echo "<script>alert('Failed add book');location.href='daftar_book_member'</script>";
        exit();
    }
}

$sql = "insert into book (image, title, description, id_user) values ('" . $image . "', '" . $title . "', '" . $description . "', '" . $_SESSION['id_user'] . "' ) ";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('Success add book');location.href='daftar_book_member.php'</script>";
} else {
    echo "<script>alert('Failed add book');location.href='daftar_book_member'</script>";
    exit();
}
